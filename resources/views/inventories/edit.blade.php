<!-- resources/views/inventories/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Package *items</h1>
    <form action="{{ route('inventories.update', $inventory->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Package Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $inventory->name }}" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Package Category</label>
            <select class="form-control" id="category" name="category" required>
                <option value="Checked" {{ (isset($inventory) && $inventory->category == 'Checked') ? 'selected' : '' }}>Checked</option>
                <option value="Banned" {{ (isset($inventory) && $inventory->category == 'Banned') ? 'selected' : '' }}>Banned</option>
                <option value="Unchecked" {{ (isset($inventory) && $inventory->category == 'Unchecked') ? 'selected' : '' }}>Unchecked</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="quantity_in_stock" class="form-label">Quantity In Stock</label>
            <input type="number" class="form-control" id="quantity_in_stock" name="quantity_in_stock" value="{{ $inventory->quantity_in_stock }}" required>
        </div>
        <div class="mb-3">
            <label for="quantity_out" class="form-label">Quantity Out</label>
            <input type="number" class="form-control" id="quantity_out" name="quantity_out" value="{{ $inventory->quantity_out }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Item</button>
    </form>
</div>
@endsection