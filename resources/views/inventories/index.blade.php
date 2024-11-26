<!-- resources/views/inventories/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Inventory Items</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Category</th>
                <th>Quantity In Stock</th>
                <th>Quantity Out</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventories as $inventory)
            <tr>
                <td>{{ $inventory->name }}</td>
                <td>{{ $inventory->category }}</td>
                <td>{{ $inventory->quantity_in_stock }}</td>
                <td>{{ $inventory->quantity_out }}</td>
                <td>
                    <a href="{{ route('inventories.show', $inventory->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('inventories.edit', $inventory->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('inventories.destroy', $inventory->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection