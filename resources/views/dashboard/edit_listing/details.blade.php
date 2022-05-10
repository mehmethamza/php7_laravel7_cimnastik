<div class="add-listing-section margin-top-45">

    <!-- Headline -->
    <div class="add-listing-headline">
        <h3><i class="sl sl-icon-docs"></i> Details</h3>
    </div>

    <!-- Description -->
    <div class="form">
        <h5>Açıklama</h5>
        <textarea class="WYSIWYG" name="description" cols="40" rows="3" id="summary"  spellcheck="true">{{$workplace->details->content}}</textarea>
    </div>

    <!-- Row -->
    <div class="row with-forms">

        <!-- Phone -->
        <div class="col-md-4">
            <h5>Phone <span>(optional)</span></h5>
            <input type="text" name="phone" value="{{$workplace->details->phone}}">
        </div>

        <!-- Website -->
        <div class="col-md-4">
            <h5>Website <span>(optional)</span></h5>
            <input type="text" name="web" value="{{$workplace->details->web}}">
        </div>

        <!-- Email Address -->
        <div class="col-md-4">
            <h5>E-mail <span>(optional)</span></h5>
            <input type="text" name="email" value="{{$workplace->details->email}}">
        </div>

    </div>
    <!-- Row / End -->


    <!-- Row -->
    <div class="row with-forms">

        <!-- Phone -->
        <div class="col-md-4">
            <h5 class="fb-input"><i class="fa fa-facebook-square"></i> Facebook <span>(optional)</span></h5>
            <input type="text" placeholder="https://www.facebook.com/" name="facebook" value="{{$workplace->details->facebook}}">
        </div>

        <!-- Website -->
        <div class="col-md-4">
            <h5 class="twitter-input"><i class="fa fa-twitter"></i> Twitter <span>(optional)</span></h5>
            <input type="text" placeholder="https://www.twitter.com/" name="twitter" value="{{$workplace->details->twitter}}">
        </div>
        {{-- Youtube --}}
        <div class="col-md-4">
            <h5 class="youtube-input"><i class="fa fa-youtube"></i> Youtube <span>(optional)</span></h5>
            <input type="text"  name="youtube_embed" value="{{$workplace->youtube_embed}}">
        </div>
        <!-- Email Address -->
        {{-- <div class="col-md-4">
            <h5 class="gplus-input"><i class="fa fa-google-plus"></i> Google Plus <span>(optional)</span></h5>
            <input type="text" placeholder="https://plus.google.com" name="gmail">
        </div> --}}

    </div>
    <!-- Row / End -->


    <!-- Checkboxes -->
    <h5 class="margin-top-30 margin-bottom-10">Amenities <span>(optional)</span></h5>
    <div class="checkboxes in-row margin-bottom-20">

        @foreach ($properties as $property)
            <input  id="check-a-{{$property -> name}}" type="checkbox" value="{{ encrypt( $property -> id)}}" name="properties[]"
                @foreach ($workplace->workplaceProperties as $item)
                    @if ($item->property_id == $property->id)
                        checked
                    @endif
                @endforeach
            />
            <label for="check-a-{{$property -> name}}">{{$property -> name}}</label>
        @endforeach

    </div>
    <!-- Checkboxes / End -->

</div>
