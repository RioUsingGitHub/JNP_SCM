@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Shipment Details</h1>

    <h3>Sender</h3>
    <p>Name: {{ $shipment->sender_name }}</p>
    <p>City: {{ $shipment->sender_city }}</p>
    <p>Address: {{ $shipment->sender_address }}</p>
    <p>Phone: {{ $shipment->sender_phone }}</p>
    <p>Postal Code: {{ $shipment->sender_postal_code }}</p>

    <h3>Recipient</h3>
    <p>Name: {{ $shipment->recipient_name }}</p>
    <p>City: {{ $shipment->recipient_city }}</p>
    <p>Address: {{ $shipment->recipient_address }}</p>
    <p>Phone: {{ $shipment->recipient_phone }}</p>
    <p>Postal Code: {{ $shipment->recipient_postal_code }}</p>

    <h3>Shipment Status: {{ $shipment->status }}</h3>

    <h2>Items</h2>
    <a href="{{ route('shipment-items.create', $shipment->id) }}" class="btn btn-primary mb-3">Add Item</a>

    <table class="table">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Dimensions (LxWxH)</th>
                <th>Weight</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shipment->items as $item)
                <tr>
                    <td>{{ $item->item_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->length }} x {{ $item->width }} x {{ $item->height }}</td>
                    <td>{{ $item->weight }} kg</td>
                    <td>
                        <a href="{{ route('shipment-items.edit', [$shipment->id, $item->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('shipment-items.destroy', [$shipment->id, $item->id]) }}" method="POST" style="display:inline;">
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
