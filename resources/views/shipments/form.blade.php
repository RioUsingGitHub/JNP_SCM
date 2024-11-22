<div class="mb-3">
    <label for="sender_name" class="form-label">Sender Name</label>
    <input type="text" class="form-control" id="sender_name" name="sender_name" value="{{ $shipment->sender_name ?? old('sender_name') }}" required>
</div>
<div class="mb-3">
    <label for="sender_city" class="form-label">Sender City</label>
    <input type="text" class="form-control" id="sender_city" name="sender_city" value="{{ $shipment->sender_city ?? old('sender_city') }}" required>
</div>
<div class="mb-3">
    <label for="sender_address" class="form-label">Sender Address</label>
    <input type="text" class="form-control" id="sender_address" name="sender_address" value="{{ $shipment->sender_address ?? old('sender_address') }}" required>
</div>
<div class="mb-3">
    <label for="sender_phone" class="form-label">Sender Phone</label>
    <input type="text" class="form-control" id="sender_phone" name="sender_phone" value="{{ $shipment->sender_phone ?? old('sender_phone') }}" required>
</div>
<div class="mb-3">
    <label for="sender_postal_code" class="form-label">Sender Postal Code</label>
    <input type="text" class="form-control" id="sender_postal_code" name="sender_postal_code" value="{{ $shipment->sender_postal_code ?? old('sender_postal_code') }}" required>
</div>
<div class="mb-3">
    <label for="recipient_name" class="form-label">Recipient Name</label>
    <input type="text" class="form-control" id="recipient_name" name="recipient_name" value="{{ $shipment->recipient_name ?? old('recipient_name') }}" required>
</div>
<div class="mb-3">
    <label for="recipient_city" class="form-label">Recipient City</label>
    <input type="text" class="form-control" id="recipient_city" name="recipient_city" value="{{ $shipment->recipient_city ?? old('recipient_city') }}" required>
</div>
<div class="mb-3">
    <label for="recipient_address" class="form-label">Recipient Address</label>
    <input type="text" class="form-control" id="recipient_address" name="recipient_address" value="{{ $shipment->recipient_address ?? old('recipient_address') }}" required>
</div>
<div class="mb-3">
    <label for="recipient_phone" class="form-label">Recipient Phone</label>
    <input type="text" class="form-control" id="recipient_phone" name="recipient_phone" value="{{ $shipment->recipient_phone ?? old('recipient_phone') }}" required>
</div>
<div class="mb-3">
    <label for="recipient_postal_code" class="form-label">Recipient Postal Code</label>
    <input type="text" class="form-control" id="recipient_postal_code" name="recipient_postal_code" value="{{ $shipment->recipient_postal_code ?? old('recipient_postal_code') }}" required>
</div>
<div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select class="form-control" id="status" name="status" required>
        <option value="Pending" {{ (isset($shipment) && $shipment->status == 'Pending') ? 'selected' : '' }}>Pending</option>
        <option value="Pickup" {{ (isset($shipment) && $shipment->status == 'Pickup') ? 'selected' : '' }}>Pickup</option>
        <option value="Dropped" {{ (isset($shipment) && $shipment->status == 'Dropped') ? 'selected' : '' }}>Dropped</option>
        <option value="Delivered" {{ (isset($shipment) && $shipment->status == 'Delivered') ? 'selected' : '' }}>Delivered</option>
        <option value="Blank" {{ (isset($shipment) && $shipment->status == 'Blank') ? 'selected' : '' }}>Blank</option>
    </select>
</div>
