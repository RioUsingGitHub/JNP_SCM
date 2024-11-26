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

<div class="form-group">
    <label for="company_name">Company Name</label>
    <input type="text" name="company_name" id="company_name" class="form-control" value="{{ old('company_name', $supplier->company_name ?? '') }}">
</div>

<div class="form-group">
    <label for="supplier_code">Supplier Code</label>
    <input type="text" name="supplier_code" id="supplier_code" class="form-control" value="{{ old('supplier_code', $supplier->supplier_code ?? '') }}" required>
</div>

<div class="form-group">
    <label for="city">City</label>
    <input type="text" name="city" id="city" class="form-control" value="{{ old('city', $supplier->city ?? '') }}">
</div>

<div class="form-group">
    <label for="state_province">State/Province</label>
    <input type="text" name="state_province" id="state_province" class="form-control" value="{{ old('state_province', $supplier->state_province ?? '') }}">
</div>

<div class="form-group mt-3">
    <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
</div>