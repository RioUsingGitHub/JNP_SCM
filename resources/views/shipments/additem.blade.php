@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Add Items to Shipment</h1>
    
    <form action="{{ route('shipments.items.store', $shipment->id) }}" method="POST">
        @csrf

        <div id="items-container">
            <!-- Item fields will be added dynamically here -->
            <div class="space-y-4" id="item1">
                <div class="flex flex-col">
                    <label for="name" class="text-sm font-medium">Item Name</label>
                    <input type="text" name="name[]" class="form-input mt-1" required>
                </div>
                <div class="flex flex-col">
                    <label for="quantity" class="text-sm font-medium">Quantity</label>
                    <input type="number" name="quantity[]" class="form-input mt-1" required>
                </div>
                <div class="flex flex-col">
                    <label for="weight" class="text-sm font-medium">Weight</label>
                    <input type="number" name="weight[]" step="0.01" class="form-input mt-1" required>
                </div>
                <div class="flex flex-col">
                    <label for="height" class="text-sm font-medium">Height</label>
                    <input type="number" name="height[]" class="form-input mt-1" required>
                </div>
                <div class="flex flex-col">
                    <label for="width" class="text-sm font-medium">Width</label>
                    <input type="number" name="width[]" class="form-input mt-1" required>
                </div>
                <div class="flex flex-col">
                    <label for="length" class="text-sm font-medium">Length</label>
                    <input type="number" name="length[]" class="form-input mt-1" required>
                </div>
                <div class="flex flex-col">
                    <label for="description" class="text-sm font-medium">Description</label>
                    <textarea name="description[]" class="form-input mt-1" rows="3" required></textarea>
                </div>
                <button type="button" class="remove-item mt-2 bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                    Remove Item
                </button>
            </div>
        </div>

        <!-- Add More Items Button -->
        <button type="button" id="addMoreItems" class="mt-4 bg-green-500 text-white p-2 rounded-lg hover:bg-green-600">
            Add Another Item
        </button>

        <!-- Submit Button -->
        <div class="mt-6 flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                Save Items
            </button>
        </div>
    </form>
</div>

<script>
    document.getElementById('addMoreItems').addEventListener('click', function() {
        const container = document.getElementById('items-container');
        const newItem = document.createElement('div');
        newItem.classList.add('space-y-4', 'mt-4');

        newItem.innerHTML = `
            <div class="flex flex-col">
                <label for="name" class="text-sm font-medium">Item Name</label>
                <input type="text" name="name[]" class="form-input mt-1" required>
            </div>
            <div class="flex flex-col">
                <label for="quantity" class="text-sm font-medium">Quantity</label>
                <input type="number" name="quantity[]" class="form-input mt-1" required>
            </div>
            <div class="flex flex-col">
                <label for="weight" class="text-sm font-medium">Weight</label>
                <input type="number" name="weight[]" step="0.01" class="form-input mt-1" required>
            </div>
            <div class="flex flex-col">
                <label for="height" class="text-sm font-medium">Height</label>
                <input type="number" name="height[]" class="form-input mt-1" required>
            </div>
            <div class="flex flex-col">
                <label for="width" class="text-sm font-medium">Width</label>
                <input type="number" name="width[]" class="form-input mt-1" required>
            </div>
            <div class="flex flex-col">
                <label for="length" class="text-sm font-medium">Length</label>
                <input type="number" name="length[]" class="form-input mt-1" required>
            </div>
            <div class="flex flex-col">
                <label for="description" class="text-sm font-medium">Description</label>
                <textarea name="description[]" class="form-input mt-1" rows="3" required></textarea>
            </div>
            <button type="button" class="remove-item mt-2 bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                Remove Item
            </button>
        `;

        container.appendChild(newItem);

        // Add event listener to the newly created remove button
        newItem.querySelector('.remove-item').addEventListener('click', function() {
            container.removeChild(newItem);
        });
    });

    // Attach remove event to the initial items
    document.querySelectorAll('.remove-item').forEach(button => {
        button.addEventListener('click', function() {
            const item = this.closest('.space-y-4');
            item.parentNode.removeChild(item);
        });
    });
</script>

@endsection
