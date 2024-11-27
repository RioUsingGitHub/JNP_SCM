@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="text-center mb-4">Create New Supplier</h2>
            <form action="{{ route('suppliers.store') }}" method="POST">
                @csrf
                @include('suppliers.form', ['buttonText' => 'Add Supplier'])
            </form>
        </div>
    </div>
</div>
@endsection