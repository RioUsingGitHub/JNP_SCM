<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Shipment;
use App\Models\ShipmentItem;
use App\Models\Inventory;
use Illuminate\Support\Facades\Log;

class ShipmentController extends Controller
{
    public function index()
    {
        $shipments = Shipment::with('items')->get();
        return view('shipments.index', compact('shipments'));
    }

    public function create()
    {
        return view('shipments.create');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            
            $request->validate([
                'sender_name' => 'required|string',
                'sender_city' => 'required|string',
                'sender_address' => 'required|string',
                'sender_phone' => 'required|string',
                'sender_postal_code' => 'required|string',
                'recipient_name' => 'required|string',
                'recipient_city' => 'required|string',
                'recipient_address' => 'required|string',
                'recipient_phone' => 'required|string',
                'recipient_postal_code' => 'required|string',
                'status' => 'required|in:Pending,Pickup,Dropped,Delivered,Blank',
                'schedule_date' => 'nullable|date',
                'items.*.name' => 'required|string',
                'items.*.quantity' => 'required|integer',
                'items.*.weight' => 'required|numeric',
                'items.*.length' => 'required|numeric',
                'items.*.width' => 'required|numeric',
                'items.*.height' => 'required|numeric',
                'items.*.description' => 'nullable|string',
            ]);
    
            // Create the shipment
            $shipment = Shipment::create($request->only([
                'sender_name',
                'sender_city',
                'sender_address',
                'sender_phone',
                'sender_postal_code',
                'recipient_name',
                'recipient_city',
                'recipient_address',
                'recipient_phone',
                'recipient_postal_code',
                'status',
                'schedule_date',
            ]));
    
            // Add items
            if ($request->has('items')) {
                foreach ($request->input('items') as $itemData) {
                    $shipment->items()->create($itemData);
                }
            }
    
            // Log before adding sender location
            Log::info('Adding sender location');
            
            // Add sender location
            $senderLocation = $this->addLocationFromAddress($shipment, [
                'address' => $request->sender_address,
                'city' => $request->sender_city,
                'postal_code' => $request->sender_postal_code
            ], 'Origin', 'Shipment created');
    
            // Log before adding recipient location
            Log::info('Adding recipient location');
            
            // Add recipient location
            $recipientLocation = $this->addLocationFromAddress($shipment, [
                'address' => $request->recipient_address,
                'city' => $request->recipient_city,
                'postal_code' => $request->recipient_postal_code
            ], 'Destination', 'Pending delivery');
    
            DB::commit();
    
            return redirect()->route('shipments.index')->with('success', 'Shipment created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating shipment: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            return redirect()->back()->with('error', 'Error creating shipment. Please try again.');
        }
    }
    
    private function addLocationFromAddress($shipment, $addressData, $locationType, $status)
    {
        try {
            Log::info('Geocoding address: ', $addressData);
            
            $client = new \GuzzleHttp\Client([
                'verify' => false  // This disables SSL verification - only use in development!
            ]);
            
            $queryString = implode(', ', array_filter([
                $addressData['address'],
                $addressData['city'],
                $addressData['postal_code']
            ]));
    
            Log::info('Query string: ' . $queryString);
    
            $response = $client->get('https://api.opencagedata.com/geocode/v1/json', [
                'query' => [
                    'q' => $queryString,
                    'key' => env('OPENCAGE_API_KEY'),
                    'limit' => 1,
                ]
            ]);
    
            $data = json_decode($response->getBody(), true);
            
            Log::info('Geocoding response: ', ['data' => $data]);
    
            if (!empty($data['results'])) {
                $location = $data['results'][0];
                
                $locationData = [
                    'location_name' => "{$locationType}: {$addressData['city']}",
                    'status' => $status,
                    'latitude' => $location['geometry']['lat'],
                    'longitude' => $location['geometry']['lng'],
                    'notes' => "Address: {$addressData['address']}, {$addressData['city']}, {$addressData['postal_code']}"
                ];
    
                Log::info('Creating location with data: ', $locationData);
                
                return $shipment->locations()->create($locationData);
            }
    
            Log::warning('No results found for address');
            return null;
        } catch (\Exception $e) {
            Log::error('Error in addLocationFromAddress: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            throw $e;
        }
    }

    public function show($id)
    {
        $shipment = Shipment::findOrFail($id);
        return view('shipments.show', compact('shipment'));
    }


    public function edit(Shipment $shipment)
    {
        return view('shipments.edit', compact('shipment'));
    }

    public function update(Request $request, Shipment $shipment)
    {
        $validated = $request->validate([
            'sender_name' => 'required|string',
            'sender_city' => 'required|string',
            'sender_address' => 'required|string',
            'sender_phone' => 'required|string',
            'sender_postal_code' => 'required|string',
            'recipient_name' => 'required|string',
            'recipient_city' => 'required|string',
            'recipient_address' => 'required|string',
            'recipient_phone' => 'required|string',
            'recipient_postal_code' => 'required|string',
            'status' => 'required|in:Pending,Pickup,Dropped,Delivered,Blank',
            'schedule_date' => 'nullable|date',
        ]);

        DB::transaction(function () use ($shipment, $validated) {
            $previousStatus = $shipment->status;
            $shipment->update($validated);

            // Handle shipment status change to 'Pickup'
            if ($validated['status'] === 'Pickup' && $previousStatus !== 'Pickup') {
                foreach ($shipment->items as $item) {
                    $inventory = Inventory::where('name', $item->name)->first();

                    if ($inventory) {
                        // Update existing inventory record
                        $inventory->update([
                            'quantity_in_stock' => $inventory->quantity_in_stock + $item->quantity,
                        ]);
                    } else {
                        // Create a new inventory record
                        Inventory::create([
                            'name' => $item->name,
                            'quantity_in_stock' => $item->quantity,
                            'quantity_out' => 0, // Initial value
                        ]);
                    }
                }
            }

            // Handle shipment status change to 'Pickup'
            if ($validated['status'] === 'Dropped' && $previousStatus !== 'Dropped') {
                foreach ($shipment->items as $item) {
                    $inventory = Inventory::where('name', $item->name)->first();

                    if ($inventory) {
                        // Update existing inventory record
                        $inventory->update([
                            'quantity_in_stock' => $inventory->quantity_in_stock + $item->quantity,
                        ]);
                    } else {
                        // Create a new inventory record
                        Inventory::create([
                            'name' => $item->name,
                            'quantity_in_stock' => $item->quantity,
                            'quantity_out' => 0, // Initial value
                        ]);
                    }
                }
            }

            // Handle shipment status change to 'Delivered'
            if ($validated['status'] === 'Delivered' && $previousStatus !== 'Dropped') {
                foreach ($shipment->items as $item) {
                    $inventory = Inventory::firstOrCreate(
                        ['name' => $item->name],
                        [
                            'quantity_in_stock' => 0, // Only applies to new records
                            'quantity_out' => 0
                        ]
                    );

                    // Ensure quantity_in_stock is set to 0 if the status is Dropped
                    if ($inventory->quantity_in_stock !== 0) {
                        $inventory->update(['quantity_in_stock' => 0]);
                    }

                    // Increment quantity_out in inventory
                    $inventory->increment('quantity_out', $item->quantity);
                }
            }
        });

        return redirect()->route('shipments.index')->with('success', 'Shipment updated successfully.');
    }

    // Update ShipmentController.php - Add these methods
    public function track(Request $request)
    {
        $tracking_number = $request->get('tracking_number');
        $shipment = null;

        if ($tracking_number) {
            $shipment = Shipment::with(['locations' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }])->where('id', $tracking_number)->first();
        }

        return view('shipments.track', compact('shipment'));
    }

    public function updateLocation(Request $request, Shipment $shipment)
    {
        $request->validate([
            'location_name' => 'required|string',
            'status' => 'required|string',
        ]);

        $client = new \GuzzleHttp\Client();
        $response = $client->get('https://api.opencagedata.com/geocode/v1/json', [
            'query' => [
                'q' => $request->location_name,
                'key' => env('OPENCAGE_API_KEY'),
                'limit' => 1,
            ]
        ]);

        $data = json_decode($response->getBody(), true);

        if (!empty($data['results'])) {
            $location = $data['results'][0];

            $shipment->locations()->create([
                'location_name' => $request->location_name,
                'status' => $request->status,
                'latitude' => $location['geometry']['lat'],
                'longitude' => $location['geometry']['lng'],
                'notes' => $request->notes
            ]);

            return redirect()->back()->with('success', 'Location updated successfully');
        }

        return redirect()->back()->with('error', 'Location not found');
    }

    public function destroy(Shipment $shipment)
    {
        $shipment->delete();
        return redirect()->route('shipments.index')->with('success', 'Shipment deleted successfully.');
    }
}
