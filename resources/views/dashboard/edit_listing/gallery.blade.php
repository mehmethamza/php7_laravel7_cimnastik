<div class="add-listing-section margin-top-45">
    <!-- Headline -->
    <div class="add-listing-headline">
        <h3><i class="sl sl-icon-picture"></i> Silinecek resimleri seç </h3>

    </div>
    <div class="row">
        @foreach ($workplace->workplaceImages as $image)
        <div class="col-md-4" style="padding: 4rem">
            <div style="margin-bottom: 10px" >
                <style>
                    .deletingimages{
                        padding: 0;
                        object-fit:cover;
                        width: 100%;
                        height: 20rem;
                    }
                </style>
                <img class="deletingimages"
                src="{{$image->location}}" alt="" srcset=""
                >
                <div class="row">
                    <input  type="checkbox" name="deletingimages[]" id="" value="{{encrypt($image->location)}}">
                </div>
            </div>
        </div>
        @endforeach


    </div>
</div>






<div class="add-listing-section margin-top-45">
    <!-- Headline -->
    <div class="add-listing-headline">
        <h3><i class="sl sl-icon-picture"></i> Gallery</h3>
    </div>
    <input type="file" name="images[]"  multiple>
</div>
