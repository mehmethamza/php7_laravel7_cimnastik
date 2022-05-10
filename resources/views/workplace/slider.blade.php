<div class="listing-slider mfp-gallery-container margin-bottom-0">
    @for ($i = 0; $i < 3; $i++)
        @foreach ($workplace -> workplaceImages  as $image)
        <a href="..{{$image->location}}" data-background-image="..{{$image->location}}" class="item mfp-gallery" title="Title 1"></a>
        @endforeach
    @endfor
     @empty($workplace -> workplaceImages[0])
        @for ($i = 0; $i < 4; $i++)
            <a href="../images/000000.png" data-background-image="../images/000000.png" class="item mfp-gallery" title="Title 1"></a>
        @endfor
     @endempty
</div>
