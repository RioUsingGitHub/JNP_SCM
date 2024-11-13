<!-- resources/views/inventories/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Inventory Item</h1>
    <form action="{{ route('inventories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Item Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="quantity_in_stock" class="form-label">Quantity In Stock</label>
            <input type="number" class="form-control" id="quantity_in_stock" name="quantity_in_stock" required>
        </div>
        <div class="mb-3">
            <label for="quantity_out" class="form-label">Quantity Out</label>
            <input type="number" class="form-control" id="quantity_out" name="quantity_out">
        </div>
        <button type="submit" class="btn btn-primary">Add Item</button>
    </form>
</div>
@endsection
