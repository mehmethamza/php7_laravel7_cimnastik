<div id="listing-location" class="listing-section">
    <h3 class="listing-desc-headline margin-top-60 margin-bottom-30">Konum</h3>

    <div id="singleListingMap-container">
        @php
            $location = explode(",",$workplace -> location)
        @endphp
        <div id="singleListingMap" data-latitude="{{$location[0]}}" data-longitude="{{$location[1]}}" data-map-icon="im im-icon-gym"></div>
        <a href="#" id="streetView">Street View</a>
    </div>
</div>
