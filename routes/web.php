<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ShipmentItemController;

use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

use App\Models\ShipmentItem;

Route::get('/test-inventory/{itemId}', function ($itemId) {
    $item = ShipmentItem::find($itemId);

    if (!$item) {
        return "Shipment Item not found.";
    }

    $inventory = $item->inventory;

    if ($inventory) {
        return "Quantity in Stock: " . $inventory->quantity_in_stock;
    } else {
        return "Inventory record not found.";
    }
});


Route::get('/track', [ShipmentController::class, 'track'])->name('track');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('verified')
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resource routes for inventories, shipments, and suppliers
    Route::resource('inventories', InventoryController::class);
    Route::resource('shipments', ShipmentController::class);
    Route::resource('suppliers', SupplierController::class);

    // Shipment Items nested routes for specific shipment
    Route::prefix('shipments/{shipment}')->group(function () {
        Route::post('/items', [ShipmentItemController::class, 'store'])->name('shipment.items.store');
        Route::put('/items/{item}', [ShipmentItemController::class, 'update'])->name('shipment.items.update');
        Route::delete('/items/{item}', [ShipmentItemController::class, 'destroy'])->name('shipment.items.destroy');
        Route::post('/items', [ShipmentItemController::class, 'store'])->name('shipments.items.store');
        Route::post('/items/{item}/delete', [ShipmentItemController::class, 'destroy'])->name('shipments.items.delete');
        Route::get('/additem', [ShipmentItemController::class, 'create'])->name('shipments.additem');
        Route::post('/location', [ShipmentController::class, 'updateLocation'])->name('shipments.location.update');
    });
});

require __DIR__ . '/auth.php';
