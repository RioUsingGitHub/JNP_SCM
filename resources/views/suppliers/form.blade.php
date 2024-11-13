<div class="form-group">
    <label for="name">Supplier Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $supplier->name ?? '') }}" required>
</div>

<div class="form-group">
    <label for="address">Address</label>
    <textarea name="address" id="address" class="form-control" required>{{ old('address', $supplier->address ?? '') }}</textarea>
</div>

<div class="form-group">
    <label for="phone">Phone</label>
    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $supplier->phone ?? '') }}" required>
</div>

<div class="form-group mt-3">
    <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
</div>
