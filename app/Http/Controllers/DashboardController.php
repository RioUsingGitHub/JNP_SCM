<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipment;
use App\Models\Inventory;
use App\Models\Supplier;
use App\Models\ShipmentItem;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $shipmentCount = Shipment::count();
        $inventoryCount = Inventory::count();
        $supplierCount = Supplier::count();
        $droppedShipments = Shipment::where('status', 'Dropped')->count();
        $deliveredShipments = Shipment::where('status', 'Delivered')->count();
        $pendingShipments = Shipment::where('status', 'Pending')->count();
        $pickupShipments = Shipment::where('status', 'Pickup')->count();
        $newShipments = Shipment::where('created_at', '>=', now()->subDay())->count();

        // Calculate total weights using ShipmentItem
        $totalWeightInStock = DB::table('inventories')
            ->join('shipment_items', 'inventories.name', '=', 'shipment_items.name')
            ->select(DB::raw('SUM(shipment_items.weight * inventories.quantity_in_stock) as total_weight'))
            ->first()
            ->total_weight ?? 0;

        $totalWeightOut = DB::table('inventories')
            ->join('shipment_items', 'inventories.name', '=', 'shipment_items.name')
            ->select(DB::raw('SUM(shipment_items.weight * inventories.quantity_out) as total_weight'))
            ->first()
            ->total_weight ?? 0;

        // New items count (last 24 hours)
        $newItems = ShipmentItem::where('created_at', '>=', now()->subDay())->count();

        return view('dashboard', compact(
            'shipmentCount',
            'inventoryCount',
            'supplierCount',
            'droppedShipments',
            'deliveredShipments',
            'pendingShipments',
            'pickupShipments',
            'totalWeightInStock',
            'totalWeightOut',
            'newShipments',
            'newItems'
        ));
    }
}
