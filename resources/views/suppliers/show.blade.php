@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Supplier Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $supplier->name }}</h5>
            <p><strong>Address:</strong> {{ $supplier->address }}</p>
            <p><strong>Phone:</strong> {{ $supplier->phone }}</p>
            @if($supplier->company_name)
            <p><strong>Company Name:</strong> {{ $supplier->company_name }}</p>
            @endif
            <p><strong>Supplier Code:</strong> {{ $supplier->supplier_code }}</p>
            @if($supplier->city)
            <p><strong>City:</strong> {{ $supplier->city }}</p>
            @endif
            @if($supplier->state_province)
            <p><strong>State/Province:</strong> {{ $supplier->state_province }}</p>
            @endif
        </div>
    </div>
    <a href="{{ route('suppliers.index') }}" class="btn btn-secondary mt-3">Back to Suppliers</a>
</div>
@endsection