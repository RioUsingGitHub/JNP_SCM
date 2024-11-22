<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Shipment;
use App\Models\ShipmentItem;
use App\Models\Inventory;



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
            'status' => 'required|in:pickup,dropoff',
            'items.*.name' => 'required|string',
            'items.*.quantity' => 'required|integer',
            'items.*.weight' => 'required|numeric',
            'items.*.length' => 'required|numeric',
            'items.*.width' => 'required|numeric',
            'items.*.height' => 'required|numeric',
            'items.*.description' => 'nullable|string',
        ]);

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
        ]));

        if ($request->has('items')) {
            foreach ($request->input('items') as $itemData) {
                $shipment->items()->create($itemData);
            }
        }

        return redirect()->route('shipments.index')->with('success', 'Shipment created successfully.');
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
            'status' => 'required|in:Pending,Pickup,Dropped,Blank',
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

            // Handle shipment status change to 'Dropped'
            if ($validated['status'] === 'Dropped' && $previousStatus !== 'Dropped') {
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

    public function destroy(Shipment $shipment)
    {
        $shipment->delete();
        return redirect()->route('shipments.index')->with('success', 'Shipment deleted successfully.');
    }
}
