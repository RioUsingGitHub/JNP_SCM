<?php

namespace App\Observers;

use App\Models\Shipment;
use App\Models\Inventory;

class ShipmentObserver
{
    public function updated(Shipment $shipment)
    {
        if ($shipment->isDirty('status')) {
            if ($shipment->status == 'pickup') {
                $this->updateInventoryOnPickup($shipment);
            } elseif ($shipment->status == 'dropoff') {
                $this->updateInventoryOnDropOff($shipment);
            }
        }
    }

    private function updateInventoryOnPickup(Shipment $shipment)
    {
        // Add items to inventory
        foreach ($shipment->items as $item) {
            Inventory::create([
                'item_name' => $item->name,
                'quantity' => $item->quantity,
                'weight' => $item->weight,
                'height' => $item->height,
                'width' => $item->width,
                'length' => $item->length,
            ]);
        }
    }

    private function updateInventoryOnDropOff(Shipment $shipment)
    {
        // Remove items from inventory (example logic, adjust as needed)
        foreach ($shipment->items as $item) {
            $inventory = Inventory::where('name', $item->name)->first();
            if ($inventory) {
                $inventory->quantity -= $item->quantity;
                $inventory->save();
            }
        }
    }
}
