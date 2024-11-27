@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="text-center text-primary mb-4">Edit Inventory Item</h2>
            <form action="{{ route('inventories.update', $inventory->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <!-- Package Information -->
                <div class="form-group border p-4 rounded bg-light mb-4">
                    <h4 class="text-primary mb-3">Package Information</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Package Name</label>
                            <input type="text" class="form-control" id="name" name="name" 
                                   value="{{ old('name', $inventory->name) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="category" class="form-label">Package Category</label>
                            <select class="form-control" id="category" name="category" required>
                                <option value="Checked" {{ $inventory->category == 'Checked' ? 'selected' : '' }}>Checked</option>
                                <option value="Banned" {{ $inventory->category == 'Banned' ? 'selected' : '' }}>Banned</option>
                                <option value="Unchecked" {{ $inventory->category == 'Unchecked' ? 'selected' : '' }}>Unchecked</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Stock Information -->
                <div class="form-group border p-4 rounded bg-light">
                    <h4 class="text-primary mb-3">Stock Information</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="quantity_in_stock" class="form-label">Quantity In Stock</label>
                            <input type="number" class="form-control" id="quantity_in_stock" name="quantity_in_stock" 
                                   value="{{ old('quantity_in_stock', $inventory->quantity_in_stock) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="quantity_out" class="form-label">Quantity Out</label>
                            <input type="number" class="form-control" id="quantity_out" name="quantity_out" 
                                   value="{{ old('quantity_out', $inventory->quantity_out) }}">
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="form-group mt-4 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="fas fa-save"></i> Update Item
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
