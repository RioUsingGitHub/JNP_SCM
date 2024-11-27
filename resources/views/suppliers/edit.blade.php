@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="text-center mb-4">Edit Supplier</h2>
            <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
                @csrf
                @method('PUT')
                @include('suppliers.form', ['buttonText' => 'Update Supplier'])
            </form>
        </div>
    </div>
</div>
@endsection