@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Add Items to Shipment</h1>
    
    <form action="{{ route('shipments.items.store', $shipment->id) }}" method="POST">
    @csrf
    <div id="items">
        <div class="item">
            <label for="name">Item Name</label>
            <input type="text" name="items[0][name]" required>

            <label for="quantity">Quantity</label>
            <input type="number" name="items[0][quantity]" required min="1">

            <label for="weight">Weight</label>
            <input type="number" name="items[0][weight]" required step="0.1">

            <label for="length">Length</label>
            <input type="number" name="items[0][length]" required step="0.1">

            <label for="width">Width</label>
            <input type="number" name="items[0][width]" required step="0.1">

            <label for="height">Height</label>
            <input type="number" name="items[0][height]" required step="0.1">

            <label for="description">Description</label>
            <textarea name="items[0][description]"></textarea>
        </div>
    </div>
    <button type="button" onclick="addNewItem()">Add Another Item</button>
    <button type="submit">Submit</button>
</form>
</div>

<script>
let itemCount = 0; // To track dynamically added items

function addNewItem() {
    const container = document.getElementById('items'); // Parent container for items

    // Create a new item element
    const newItem = document.createElement('div');
    newItem.classList.add('space-y-4'); // Styling class
    newItem.innerHTML = `
        <label for="item_name">Item Name</label>
        <input type="text" name="items[${itemCount}][name]" required>

        <label for="quantity">Quantity</label>
        <input type="number" name="items[${itemCount}][quantity]" required min="1">

        <label for="weight">Weight</label>
        <input type="number" name="items[${itemCount}][weight]" required step="0.1">

        <label for="length">Length</label>
        <input type="number" name="items[${itemCount}][length]" required step="0.1">

        <label for="width">Width</label>
        <input type="number" name="items[${itemCount}][width]" required step="0.1">

        <label for="height">Height</label>
        <input type="number" name="items[${itemCount}][height]" required step="0.1">

        <label for="description">Description</label>
        <textarea name="items[${itemCount}][description]"></textarea>

        <button type="button" class="remove-item">Remove Item</button>
    `;

    // Append the new item to the container
    container.appendChild(newItem);

    // Add event listener to the remove button of the new item
    newItem.querySelector('.remove-item').addEventListener('click', function() {
        container.removeChild(newItem);
    });

    // Increment the item counter
    itemCount++;
}

// Attach remove event to existing items (if any)
document.querySelectorAll('.remove-item').forEach(button => {
    button.addEventListener('click', function() {
        const item = this.closest('.space-y-4'); // Find the closest item container
        item.parentNode.removeChild(item);
    });
});

</script>

@endsection
