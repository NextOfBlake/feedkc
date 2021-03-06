<form class="needs-validation" action="/donate" method="post" novalidate>
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="firstName">Food Name</label>
            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
            <div class="invalid-feedback">
                Valid Food Name is required.
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="lastName">Business</label>
            <input type="dropdown" class="form-control" id="lastName" placeholder="" value="" required>
            <div class="invalid-feedback">
                Valid Business is required.
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="country">Category</label>
            <select class="custom-select d-block w-100" name="category" required>
                <option>Select A Category</option>
                @foreach(Enum::keyToValue()->valueFormatters(['title'])->categories() as $value => $label)
                    <option value="{{ $value }}">
                        {{ $label }}
                    </option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                Please select a valid category.
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="state">Expiration</label>
            <select class="custom-select d-block w-100" id="state" required>
                <option value="">Choose...</option>
                <option>Next Week</option>
            </select>
            <div class="invalid-feedback">
                Please provide a valid Expiration
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="quantity_amount">Quantity Amount</label>
            <input type="text" name="quantity_amount" class="form-control" placeholder="" required>
            <div class="invalid-feedback">
                amount is required.
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="quantity_unit">Units</label>
            <select class="custom-select d-block w-100" name="quantity_unit" required>
                <option>Units</option>
                @foreach(Enum::keyToValue()->valueFormatters(['title'])->quantityUnits() as $value => $label)
                    <option value="{{ $value }}">
                        {{ $label }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="mb-3">
        <label for="email">Additional Information</label>
        <input type="email" class="form-control" id="email" placeholder="When going to pick up you have to go here...">
    </div>


    <hr class="mb-4">

    <button class="btn btn-primary btn-lg btn-block" type="submit">Add to Donation Cart</button>
    <br>
    <br>
</form>
