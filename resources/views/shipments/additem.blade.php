@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-8">
        <h1 class="text-3xl font-bold text-indigo-600 mb-8 border-b pb-4">Add Items to Shipment</h1>

        <form action="{{ route('shipments.items.store', $shipment->id) }}" method="POST" id="itemsForm">
            @csrf
            <div id="items" class="space-y-8">
                <div class="item-container bg-gray-50 p-6 rounded-lg border border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Item Name</label>
                            <input type="text" name="items[0][name]"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                placeholder="Enter item name" required>
                        </div>

                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-700 mb-2">Quantity</label>
                            <input type="number" name="items[0][quantity]"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                min="1" placeholder="Quantity" required>
                        </div>

                        <div>
                            <label for="weight" class="block text-sm font-medium text-gray-700 mb-2">Weight (kg)</label>
                            <input type="number" name="items[0][weight]"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                step="0.1" placeholder="Weight" required>
                        </div>

                        <div>
                            <label for="length" class="block text-sm font-medium text-gray-700 mb-2">Length (cm)</label>
                            <input type="number" name="items[0][length]"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                step="0.1" placeholder="Length" required>
                        </div>

                        <div>
                            <label for="width" class="block text-sm font-medium text-gray-700 mb-2">Width (cm)</label>
                            <input type="number" name="items[0][width]"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                step="0.1" placeholder="Width" required>
                        </div>

                        <div>
                            <label for="height" class="block text-sm font-medium text-gray-700 mb-2">Height (cm)</label>
                            <input type="number" name="items[0][height]"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                step="0.1" placeholder="Height" required>
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea name="items[0][description]"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            rows="3" placeholder="Item description"></textarea>
                    </div>
                </div>
            </div>

            <div class="mt-8 flex justify-between items-center">
                <button type="button" onclick="addNewItem()"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Add Another Item
                </button>

                <button type="submit"
                    class="inline-flex items-center px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Submit Shipment Items
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.itemCount = 0;

        window.addNewItem = function() {
            window.itemCount++;
            const container = document.getElementById('items');

            // Create new item container
            const newItem = document.createElement('div');
            newItem.classList.add('item-container', 'bg-gray-50', 'p-6', 'rounded-lg', 'border', 'border-gray-200', 'relative');

            // Add remove button
            newItem.innerHTML = `
            <button type="button" class="remove-item absolute top-2 right-2 text-red-500 hover:text-red-700 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Item Name</label>
                    <input type="text" name="items[${window.itemCount}][name]" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        placeholder="Enter item name" required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Quantity</label>
                    <input type="number" name="items[${window.itemCount}][quantity]" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        min="1" placeholder="Quantity" required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Weight (kg)</label>
                    <input type="number" name="items[${window.itemCount}][weight]" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        step="0.1" placeholder="Weight" required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Length (cm)</label>
                    <input type="number" name="items[${window.itemCount}][length]" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        step="0.1" placeholder="Length" required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Width (cm)</label>
                    <input type="number" name="items[${window.itemCount}][width]" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        step="0.1" placeholder="Width" required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Height (cm)</label>
                    <input type="number" name="items[${window.itemCount}][height]" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        step="0.1" placeholder="Height" required>
                </div>
            </div>
            
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="items[${window.itemCount}][description]" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    rows="3" placeholder="Item description"></textarea>
            </div>
        `;

            // Add event listener to remove button
            newItem.querySelector('.remove-item').addEventListener('click', function() {
                container.removeChild(newItem);
            });

            // Append to container
            container.appendChild(newItem);
        };
    });
</script>
@endsection