<div class="row">
    <div class="col-md-12">
        <div class="simple-slick-carousel dots-nav">

        <!-- Listing Item -->
        @foreach ($populerWorkplaces as $workplace)
        <div class="carousel-item">
            <a href="{{route("workplace",$workplace->slug)}}" class="listing-item-container">
                <div class="listing-item">
                    <img src="{{$workplace->workplaceImage->location}}" alt="">

                    <div class="listing-badge now-open">En Popüler</div>

                    <div class="listing-item-content">
                        <h3>{{$workplace->title}} <i class="verified-icon"></i></h3>
                        <span>{{$workplace->province}} {{$workplace->district}}</span>
                    </div>

                </div>

            </a>
        </div>
        @endforeach

        <!-- Listing Item / End -->


        <!-- Listing Item / End -->
        </div>

    </div>

</div>
