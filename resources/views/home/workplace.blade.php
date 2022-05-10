<div v-for="workplace in workplace_list">
    <div class="col-lg-4 col-md-6">
        <a :href="'{{route("workplace")}}'+'/'+workplace.slug" class="listing-item-container compact">
            <div class="listing-item">
                <img :src="workplace.img_location" alt="">
                <div class="listing-item-content">
                    {{-- <div class="numerical-rating" data-rating="3.5"></div> --}}
                    <h3 v-text="workplace.title"></h3>
                    <span v-text="workplace.province + `/` + workplace.district"></span>
                </div>
                {{-- <span class="like-icon"></span> --}}
            </div>
        </a>
    </div>
</div>
