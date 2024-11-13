<!-- resources/views/inventories/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Inventory Item Details</h1>
    <div class="mb-3">
        <strong>Item Name:</strong> {{ $inventory->name }}
    </div>
    <div class="mb-3">
        <strong>Quantity In Stock:</strong> {{ $inventory->quantity_in_stock }}
    </div>
    <div class="mb-3">
        <strong>Quantity Out:</strong> {{ $inventory->quantity_out }}
    </div>
    <a href="{{ route('inventories.index') }}" class="btn btn-secondary">Back to Inventory List</a>
</div>
@endsection
