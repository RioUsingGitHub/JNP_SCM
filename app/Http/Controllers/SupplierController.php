<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15', // You can adjust max length for phone numbers
            'company_name' => 'nullable|string|max:255',
            'supplier_code' => 'required|string|max:50|unique:suppliers,supplier_code',
            'city' => 'nullable|string|max:100',
            'state_province' => 'nullable|string|max:100',
        ]);

        // Create a new supplier with the validated data
        Supplier::create($request->all());

        // Redirect to the suppliers index page with a success message
        return redirect()->route('suppliers.index')->with('success', 'Supplier created successfully.');
    }


    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        // Validate the input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15', // You can adjust max length for phone numbers
            'company_name' => 'nullable|string|max:255',
            'supplier_code' => 'required|string|max:50|unique:suppliers,supplier_code',
            'city' => 'nullable|string|max:100',
            'state_province' => 'nullable|string|max:100',
        ]);

        $supplier->update($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully.');
    }

    public function show($id)
    {
        // Find the supplier by ID or fail with a 404 error
        $supplier = Supplier::findOrFail($id);

        // Return the detailed view with the supplier data
        return view('suppliers.show', compact('supplier'));
    }


    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully.');
    }
}
