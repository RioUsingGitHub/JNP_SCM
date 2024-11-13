@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Supplier</h2>

    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('suppliers.form', ['buttonText' => 'Update Supplier'])
    </form>
</div>
@endsection
