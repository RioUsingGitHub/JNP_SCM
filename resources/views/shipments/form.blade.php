<!-- Sender Section -->
<div class="bg-white shadow-md rounded-lg p-6 mb-8">
    <h4 class="text-2xl font-bold text-indigo-600 mb-6 border-b pb-3">Shipment Details</h4>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-6">
        <div>
            <label for="status" class="block text-sm font-medium text-gray-800 mb-2">Status</label>
            <select id="status" name="status"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-300 ease-in-out"
                required>
                <option value="Pending" {{ (isset($shipment) && $shipment->status == 'Pending') ? 'selected' : '' }}>Pending</option>
                <option value="Pickup" {{ (isset($shipment) && $shipment->status == 'Pickup') ? 'selected' : '' }}>Pickup</option>
                <option value="Dropped" {{ (isset($shipment) && $shipment->status == 'Dropped') ? 'selected' : '' }}>Dropped</option>
                <option value="Delivered" {{ (isset($shipment) && $shipment->status == 'Delivered') ? 'selected' : '' }}>Delivered</option>
                <option value="Blank" {{ (isset($shipment) && $shipment->status == 'Blank') ? 'selected' : '' }}>Blank</option>
            </select>
        </div>
        <div>
            <label for="schedule_date" class="block text-sm font-medium text-gray-800 mb-2">Schedule Date</label>
            <input type="date" id="schedule_date" name="schedule_date"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-300 ease-in-out"
                value="{{ $shipment->schedule_date ?? old('schedule_date') }}">
        </div>
    </div>
</div>
<div class="bg-white shadow-md rounded-lg p-6 mb-8">
    <h4 class="text-2xl font-bold text-indigo-600 mb-6 border-b pb-3">Sender Information</h4>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="space-y-6">
            <div>
                <label for="sender_name" class="block text-sm font-medium text-gray-800 mb-2">Name</label>
                <input type="text" id="sender_name" name="sender_name"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-300 ease-in-out placeholder-gray-400"
                    placeholder="Enter sender's full name"
                    value="{{ $shipment->sender_name ?? old('sender_name') }}" required>
            </div>
            <div>
                <label for="sender_city" class="block text-sm font-medium text-gray-800 mb-2">Origin City</label>
                <input type="text" id="sender_city" name="sender_city"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-300 ease-in-out placeholder-gray-400"
                    placeholder="City of origin"
                    value="{{ $shipment->sender_city ?? old('sender_city') }}" required>
            </div>
            <div>
                <label for="sender_postal_code" class="block text-sm font-medium text-gray-800 mb-2">Post Code</label>
                <input type="text" id="sender_postal_code" name="sender_postal_code"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-300 ease-in-out placeholder-gray-400"
                    placeholder="Postal code"
                    value="{{ $shipment->sender_postal_code ?? old('sender_postal_code') }}" required>
            </div>
        </div>
        <div class="space-y-6">
            <div>
                <label for="sender_address" class="block text-sm font-medium text-gray-800 mb-2">Address</label>
                <input type="text" id="sender_address" name="sender_address"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-300 ease-in-out placeholder-gray-400"
                    placeholder="Full street address"
                    value="{{ $shipment->sender_address ?? old('sender_address') }}" required>
            </div>
            <div>
                <label for="sender_phone" class="block text-sm font-medium text-gray-800 mb-2">Phone Number</label>
                <input type="tel" id="sender_phone" name="sender_phone"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-300 ease-in-out placeholder-gray-400"
                    placeholder="Contact phone number"
                    value="{{ $shipment->sender_phone ?? old('sender_phone') }}" required>
            </div>
        </div>
    </div>
</div>

<!-- Recipient Section -->
<div class="bg-white shadow-md rounded-lg p-6 mb-8">
    <h4 class="text-2xl font-bold text-indigo-600 mb-6 border-b pb-3">Recipient Information</h4>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="space-y-6">
            <div>
                <label for="recipient_name" class="block text-sm font-medium text-gray-800 mb-2">Name</label>
                <input type="text" id="recipient_name" name="recipient_name"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-300 ease-in-out placeholder-gray-400"
                    placeholder="Enter recipient's full name"
                    value="{{ $shipment->recipient_name ?? old('recipient_name') }}" required>
            </div>
            <div>
                <label for="recipient_city" class="block text-sm font-medium text-gray-800 mb-2">Destination City</label>
                <input type="text" id="recipient_city" name="recipient_city"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-300 ease-in-out placeholder-gray-400"
                    placeholder="Destination city"
                    value="{{ $shipment->recipient_city ?? old('recipient_city') }}" required>
            </div>
            <div>
                <label for="recipient_postal_code" class="block text-sm font-medium text-gray-800 mb-2">Post Code</label>
                <input type="text" id="recipient_postal_code" name="recipient_postal_code"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-300 ease-in-out placeholder-gray-400"
                    placeholder="Postal code"
                    value="{{ $shipment->recipient_postal_code ?? old('recipient_postal_code') }}" required>
            </div>
        </div>
        <div class="space-y-6">
            <div>
                <label for="recipient_address" class="block text-sm font-medium text-gray-800 mb-2">Address</label>
                <input type="text" id="recipient_address" name="recipient_address"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-300 ease-in-out placeholder-gray-400"
                    placeholder="Full street address"
                    value="{{ $shipment->recipient_address ?? old('recipient_address') }}" required>
            </div>
            <div>
                <label for="recipient_phone" class="block text-sm font-medium text-gray-800 mb-2">Phone Number</label>
                <input type="tel" id="recipient_phone" name="recipient_phone"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-300 ease-in-out placeholder-gray-400"
                    placeholder="Contact phone number"
                    value="{{ $shipment->recipient_phone ?? old('recipient_phone') }}" required>
            </div>
        </div>
    </div>
</div>