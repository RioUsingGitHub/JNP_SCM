<div class="form-group border p-4 rounded bg-light mb-4">
    <h4 class="text-primary mb-3">Supplier Information</h4>
    <div class="row">
        <div class="col-md-6">
            <label for="company_name">Company Name</label>
            <input type="text" name="company_name" id="company_name" class="form-control" value="{{ old('company_name', $supplier->company_name ?? '') }}">
        </div>
        <div class="col-md-6">
            <label for="name">Primary Contact Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $supplier->name ?? '') }}">
        </div>
        <div class="col-md-6 mt-3">
            <label for="supplier_code">Supplier Code</label>
            <input type="text" name="supplier_code" id="supplier_code" class="form-control" value="{{ old('supplier_code', $supplier->supplier_code ?? '') }}" required>
        </div>
    </div>
</div>

<div class="form-group border p-4 rounded bg-light">
    <h4 class="text-primary mb-3">Detail Information</h4>
    <div class="row">
        <div class="col-md-6">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $supplier->address ?? '') }}">
        </div>
        <div class="col-md-6">
            <label for="phone">Phone Number</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $supplier->phone ?? '') }}">
        </div>
        <div class="col-md-6 mt-3">
            <label for="city">City</label>
            <input type="text" name="city" id="city" class="form-control" value="{{ old('city', $supplier->city ?? '') }}">
        </div>
        <div class="col-md-6 mt-3">
            <label for="state_province">State/Province</label>
            <input type="text" name="state_province" id="state_province" class="form-control" value="{{ old('state_province', $supplier->state_province ?? '') }}">
        </div>
    </div>
</div>

<div class="form-group mt-4 d-flex justify-content-end">
    <button type="submit" class="btn btn-success btn-lg">
        <i class="fas fa-plus"></i> {{ $buttonText }}
    </button>
</div>