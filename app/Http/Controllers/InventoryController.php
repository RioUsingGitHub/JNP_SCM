<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventories = Inventory::all();
        return view('inventories.index', compact('inventories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity_in_stock' => 'required|integer|min:0',
            'quantity_out' => 'nullable|integer|min:0',
        ]);

        Inventory::create($request->all());

        return redirect()->route('inventories.index')->with('success', 'Inventory item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventory $inventory)
    {
        $inventories = Inventory::all();
        return view('inventories.show', compact('inventory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventory $inventory)
    {
        return view('inventories.edit', compact('inventory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventory $inventory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity_in_stock' => 'required|integer|min:0',
            'quantity_out' => 'nullable|integer|min:0',
        ]);

        $inventory->update($request->all());

        return redirect()->route('inventories.index')->with('success', 'Inventory item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventory $inventory)
    {
        $inventory->delete();

        return redirect()->route('inventories.index')->with('success', 'Inventory item deleted successfully.');
    }
}
