@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create New Supplier</h2>

    <form action="{{ route('suppliers.store') }}" method="POST">
        @csrf
        @include('suppliers.form', ['buttonText' => 'Create Supplier'])
    </form>
</div>
@endsection
