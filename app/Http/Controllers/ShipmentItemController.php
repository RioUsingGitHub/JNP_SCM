<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipment;
use App\Models\ShipmentItem;
use Illuminate\Support\Facades\Log;

class ShipmentItemController extends Controller
{
    public function create(Shipment $shipment)
    {
        return view('shipments.additem', compact('shipment'));
    }

    public function store(Request $request, Shipment $shipment)
    {

        $validated = $request->validate([
            'items.*.name' => 'required|string',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.weight' => 'required|numeric|min:0.1',
            'items.*.length' => 'required|numeric|min:0.1',
            'items.*.width' => 'required|numeric|min:0.1',
            'items.*.height' => 'required|numeric|min:0.1',
            'items.*.description' => 'nullable|string',
        ]);

        foreach ($validated['items'] as $itemData) {
            $shipment->items()->create($itemData);
        }

        return redirect()->route('shipments.show', $shipment->id)
            ->with('success', 'Items added to shipment successfully.');
    }


    public function edit(Shipment $shipment, ShipmentItem $item)
    {
        return view('shipment_items.edit', compact('shipment', 'item'));
    }

    public function update(Request $request, Shipment $shipment, ShipmentItem $item)
    {
        $request->validate([
            'item_name' => 'required|string',
            'quantity' => 'required|integer',
            'weight' => 'required|numeric',
            'length' => 'required|numeric',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $item->update($request->all());

        return redirect()->route('shipments.show', $shipment)->with('success', 'Item updated successfully.');
    }

    public function destroy(Shipment $shipment, ShipmentItem $item)
    {
        // Ngapain di delete item nya
    }
}
