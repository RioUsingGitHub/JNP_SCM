<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipment;
use App\Models\ShipmentItem;

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
        ]);

        $shipment = Shipment::create($request->all());
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
        ]);

        $shipment->update($request->all());
        return redirect()->route('shipments.index')->with('success', 'Shipment updated successfully.');
    }

    public function destroy(Shipment $shipment)
    {
        $shipment->delete();
        return redirect()->route('shipments.index')->with('success', 'Shipment deleted successfully.');
    }
}