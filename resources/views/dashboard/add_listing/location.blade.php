<div class="add-listing-section margin-top-45">

    <!-- Headline -->
    <div class="add-listing-headline">
        <h3><i class="sl sl-icon-location"></i> Konum</h3>
    </div>

    <div class="submit-section">

        <!-- Row -->
        <div class="row with-forms">

            <!-- City -->
            <div class="col-md-6">
                <h5>İL</h5>
                <select  name="province" class=" form-select province" >
                    @foreach ($provinces as $province)
                        <option  data-id="{{$province-> id}}" value="{{$province-> name}}">{{$province -> name}}</option>
                    @endforeach
                </select>
            </div>

            <!-- Address -->
            <div class="col-md-6">
                <h5>Address</h5>
                <input type="text" name="address" placeholder="e.g. 964 School Street">
            </div>

            <!-- City -->
            <div class="col-md-6">
                <h5>İLÇE</h5>
                <select name="district" class="chosen-select-single form-select district" >
                        {{-- <option value="{{$item-> name}}">{{$item -> name}}</option> --}}

                </select>
            </div>

            <!-- Zip-Code -->
            <div class="col-md-6">
                <h5>Zip-Code</h5>
                <input name="zip" type="text">
            </div>
            <div class="col-md-6">
                <h5>Geograpial Location</h5>
                <input name="location" type="text">
            </div>
            <!-- tax-Code -->
            <div class="col-md-6">
                <h5>Vergi Kodu</h5>
                <input name="tax_number" type="text">
            </div>

        </div>
        <!-- Row / End -->

    </div>
</div>
