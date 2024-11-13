@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Shipment</h1>
    <form action="{{ route('shipments.store') }}" method="POST">
        @csrf
        @include('shipments.form') 
        <button type="submit" class="btn btn-primary">Create Shipment</button>
    </form>
</div>
@endsection
