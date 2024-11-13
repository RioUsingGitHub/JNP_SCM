@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Shipment Details</h1>

    <div>
        <h3>Sender Information</h3>
        <p>{{ $shipment->sender_name }}, {{ $shipment->sender_city }}</p>
        <p>{{ $shipment->sender_address }}, {{ $shipment->sender_postal_code }}</p>
        <p>Phone: {{ $shipment->sender_phone }}</p>
    </div>

    <div>
        <h3>Recipient Information</h3>
        <p>{{ $shipment->recipient_name }}, {{ $shipment->recipient_city }}</p>
        <p>{{ $shipment->recipient_address }}, {{ $shipment->recipient_postal_code }}</p>
        <p>Phone: {{ $shipment->recipient_phone }}</p>
    </div>

    <div>
        <h3>Status</h3>
        <p>{{ ucfirst($shipment->status) }}</p>
    </div>

    <div>
        <h3>Items</h3>
        <ul>
            @foreach($shipment->items as $item)
                <li>
                    {{ $item->name }} - Quantity: {{ $item->quantity }}
                    <form action="{{ route('shipments.items.delete', ['shipment' => $shipment->id, 'item' => $item->id]) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                    </form>
                </li>
            @endforeach
        </ul>
        <a href="{{ route('shipments.index') }}" class="btn btn-secondary">Back to Shipments</a>
        
        <a href="{{ route('shipments.additem', $shipment->id) }}" class="btn btn-secondary">
            Add Items to Shipment
        </a>
    </div>
</div>

@endsection
