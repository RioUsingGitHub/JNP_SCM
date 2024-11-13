<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipment;
use App\Models\ShipmentItem;

class ShipmentItemController extends Controller
{
    public function create(Shipment $shipment)
    {
        return view('shipments.additem', compact('shipment'));
    }
    
    public function store(Request $request, Shipment $shipment)
    {
        $validated = $request->validate([
            'name.*' => 'required|string',
            'quantity.*' => 'required|integer',
            'weight.*' => 'required|numeric',
            'height.*' => 'required|numeric',
            'width.*' => 'required|numeric',
            'length.*' => 'required|numeric',
            'description.*' => 'required|string',
        ]);
    
        foreach ($validated['name'] as $index => $name) {
            $item = $shipment->items()->create([
                'name' => $name,
                'quantity' => $validated['quantity'][$index],
                'weight' => $validated['weight'][$index],
                'height' => $validated['height'][$index],
                'width' => $validated['width'][$index],
                'length' => $validated['length'][$index],
                'description' => $validated['description'][$index],
                'quantity_in_stock' => $validated['quantity'][$index], // Set the initial quantity in stock
            ]);
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

public function destroy(Request $request, Shipment $shipment, ShipmentItem $item)
{
    // Check if the quantity in stock is sufficient to remove the item
    if ($item->quantity_in_stock < $item->quantity) {
        return redirect()->route('shipments.show', $shipment->id)
            ->with('error', 'Cannot remove the item as the quantity in stock is insufficient.');
    }

    $item->delete();
    return redirect()->route('shipments.show', $shipment->id)
        ->with('success', 'Item removed from shipment successfully.');
}
}
