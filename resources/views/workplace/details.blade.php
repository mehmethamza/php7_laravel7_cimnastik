<div id="listing-overview" class="listing-section">

    <!-- Description -->

    {{$workplace -> details -> content}}
    <!-- Listing Contacts -->
    <div class="listing-links-container">

        <ul class="listing-links contact-links">
            <li><a href="tel:12-345-678" class="listing-links"><i class="fa fa-phone"></i> {{$workplace -> details -> phone}}</a></li>
            <li><a href="mailto:mail@example.com" class="listing-links"><i class="fa fa-envelope-o"></i> {{$workplace -> details -> email}}</a>
            </li>
            <li><a href="#" target="_blank"  class="listing-links"><i class="fa fa-link"></i> {{$workplace -> details -> web}}</a></li>
        </ul>
        <div class="clearfix"></div>

        <ul class="listing-links">
            <li><a href="#" target="_blank" class="listing-links-fb"><i class="fa fa-facebook-square"></i> Facebook</a></li>
            <li><a href="#" target="_blank" class="listing-links-yt"><i class="fa fa-youtube-play"></i> YouTube</a></li>
            <li><a href="#" target="_blank" class="listing-links-ig"><i class="fa fa-instagram"></i> Instagram</a></li>
            <li><a href="#" target="_blank" class="listing-links-tt"><i class="fa fa-twitter"></i> Twitter</a></li>
        </ul>
        <div class="clearfix"></div>

    </div>
    <div class="clearfix"></div>


    <!-- Amenities -->
    <h3 class="listing-desc-headline">Hizmetler</h3>
    <ul class="listing-features checkboxes margin-top-0">
        @foreach ($workplace -> workplaceProperties as $x)
            <li>{{$x -> property -> name}}</li>
        @endforeach

    </ul>
</div>
