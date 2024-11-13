<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipment;
use App\Models\Inventory;
use App\Models\Supplier;

class DashboardController extends Controller
{
    public function index()
    {
        $shipmentCount = Shipment::count();
        $inventoryCount = Inventory::count();
        $supplierCount = Supplier::count();
        $droppedShipments = Shipment::where('status', 'dropoff')->count();
    
        return view('dashboard', compact('inventoryCount', 'shipmentCount', 'supplierCount', 'droppedShipments'));
    }
    
}

