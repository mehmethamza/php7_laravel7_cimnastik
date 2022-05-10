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
                    <option value=""></option>
                    @foreach ($provinces as $province)
                        <option  data-id="{{$province-> id}}" value="{{$province-> name}}"
                        @if ($province->name == $workplace->province)
                            selected
                        @endif
                        >{{$province -> name}}</option>
                    @endforeach
                </select>
            </div>

            <!-- Address -->
            <div class="col-md-6">
                <h5>Address</h5>
                <input type="text" name="address" placeholder="e.g. 964 School Street" value="{{$workplace->full_adress}}">
            </div>

            <!-- City -->
            <div class="col-md-6">
                <h5>İLÇE</h5>
                <select name="district" class="chosen-select-single form-select district" >
                    <option value="{{$workplace->district}}">{{$workplace->district}}</option>

                </select>
            </div>

            <!-- Zip-Code -->
            <div class="col-md-6">
                <h5>Zip-Code</h5>
                <input name="zip" type="text" value="{{$workplace->zip}}">
            </div>
            <div class="col-md-6">
                <h5>Geograpial Location</h5>
                <input name="location" type="text" value="{{$workplace->location}}">
            </div>

        </div>
        <!-- Row / End -->

    </div>
</div>
