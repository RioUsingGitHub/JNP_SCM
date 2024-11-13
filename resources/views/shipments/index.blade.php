@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Shipments</h1>
    <a href="{{ route('shipments.create') }}" class="btn btn-primary mb-3">Add New Shipment</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Sender Name</th>
                <th>Recipient Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shipments as $shipment)
                <tr>
                    <td>{{ $shipment->sender_name }}</td>
                    <td>{{ $shipment->recipient_name }}</td>
                    <td>{{ $shipment->status }}</td>
                    <td>
                        <a href="{{ route('shipments.show', $shipment->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('shipments.edit', $shipment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('shipments.destroy', $shipment->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
