<div id="titlebar" class="listing-titlebar">
    <div class="listing-titlebar-title">
        <h2>{{$workplace -> title}}</h2>
        <span>
            <a href="#listing-location" class="listing-address">
                <i class="fa fa-map-marker"></i>
                {{$workplace -> full_adress}}
            </a>
        </span>
        <div class="star-rating" data-rating="5">
            <div class="rating-counter"><a href="#listing-reviews">(12 reviews)</a></div>
        </div>
    </div>
</div>
