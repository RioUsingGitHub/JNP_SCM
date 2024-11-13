@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Shipment</h1>
    <form action="{{ route('shipments.update', $shipment->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('shipments.form') 
        <button type="submit" class="btn btn-primary">Update Shipment</button>
    </form>
</div>
@endsection
