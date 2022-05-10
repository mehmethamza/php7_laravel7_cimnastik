<div id="add-review" class="add-review-box">

    <!-- Add Review -->
    @if ($isSellerWorkplace)
            <h3 class="listing-desc-headline margin-bottom-10">Yorum Cevapla</h3>
            <p class="comment-notes">Yorum cevapladığında puanlama değişmez.</p>
        @else
            <h3 class="listing-desc-headline margin-bottom-10">Yorum ekle</h3>
            <p class="comment-notes">Email adresin yorum kısmında gözükmeyecektir.</p>
    @endif

        <!-- Subratings Container -->
        <form method="POST" action="{{route("dashboard.comments.store")}}" id="add-comment" class="add-comment">
            @csrf
            <input type="hidden" name="workplace_id" value="{{encrypt($workplace -> id)}}">
            @if ($isSellerWorkplace)
                <input type="hidden" name="name" value="admin">
                <input type="hidden" name="email" value="admin">
                <input type="hidden" name="rating_service" value="5">
                <input type="hidden" name="rating_communacation" value="5">
                <input type="hidden" name="rating_advice" value="5">
                <input class="pid_item" type="hidden" name="pid" value="">
            @else
                <div class="sub-ratings-container">

                    <!-- Subrating #1 -->
                    <div class="add-sub-rating">
                        <div class="sub-rating-title">Hizmet <i class="tip" data-tip-content="Quality of customer service and attitude to work with you"></i></div>
                        <div class="sub-rating-stars">
                            <!-- Leave Rating -->
                            <div class="clearfix"></div>
                            <formm method="GET" class="leave-rating">
                                <input type="radio" name="rating_service" id="rating-1" value="5"/>
                                <label for="rating-1" class="fa fa-star"></label>
                                <input type="radio" name="rating_service" id="rating-2" value="4"/>
                                <label for="rating-2" class="fa fa-star"></label>
                                <input type="radio" name="rating_service" id="rating-3" value="3"/>
                                <label for="rating-3" class="fa fa-star"></label>
                                <input type="radio" name="rating_service" id="rating-4" value="2"/>
                                <label for="rating-4" class="fa fa-star"></label>
                                <input type="radio" name="rating_service" id="rating-5" value="1"/>
                                <label for="rating-5" class="fa fa-star"></label>
                            </formm>
                        </div>
                    </div>

                    <!-- Subrating #2 -->
                    <div class="add-sub-rating">
                        <div class="sub-rating-title">İletişim <i class="tip" data-tip-content="Overall experience received for the amount spent"></i></div>
                        <div class="sub-rating-stars">
                            <!-- Leave Rating -->
                            <div class="clearfix"></div>
                            <formm class="leave-rating">
                                <input type="radio" name="rating_communacation" id="rating-11" value="5"/>
                                <label for="rating-11" class="fa fa-star"></label>
                                <input type="radio" name="rating_communacation" id="rating-12" value="4"/>
                                <label for="rating-12" class="fa fa-star"></label>
                                <input type="radio" name="rating_communacation" id="rating-13" value="3"/>
                                <label for="rating-13" class="fa fa-star"></label>
                                <input type="radio" name="rating_communacation" id="rating-14" value="2"/>
                                <label for="rating-14" class="fa fa-star"></label>
                                <input type="radio" name="rating_communacation" id="rating-15" required value="1"/>
                                <label for="rating-15" class="fa fa-star"></label>
                            </formm>
                        </div>
                    </div>

                    <!-- Subrating #3 -->
                    <div class="add-sub-rating">
                        <div class="sub-rating-title">Tavsiye <i class="tip" data-tip-content="Visibility, commute or nearby parking spots"></i></div>
                        <div class="sub-rating-stars">
                            <!-- Leave Rating -->
                            <div class="clearfix"></div>
                            <formm class="leave-rating">
                                <input type="radio" name="rating_advice" id="rating-21" value="5"/>
                                <label for="rating-21" class="fa fa-star"></label>
                                <input type="radio" name="rating_advice" id="rating-22" value="4"/>
                                <label for="rating-22" class="fa fa-star"></label>
                                <input type="radio" name="rating_advice" id="rating-23" value="3"/>
                                <label for="rating-23" class="fa fa-star"></label>
                                <input type="radio" name="rating_advice" id="rating-24" value="2"/>
                                <label for="rating-24" class="fa fa-star"></label>
                                <input type="radio" name="rating_advice" id="rating-25" required value="1"/>
                                <label for="rating-25" class="fa fa-star"></label>
                            </formm>
                        </div>
                    </div>

                    <!-- Subrating #4 -->
                    {{--
                    <div class="add-sub-rating">
                        <div class="sub-rating-title">Cleanliness <i class="tip" data-tip-content="The physical condition of the business"></i></div>
                        <div class="sub-rating-stars">
                            <!-- Leave Rating -->
                            <div class="clearfix"></div>
                            <form class="leave-rating">
                                <input type="radio" name="rating" id="rating-31" value="1"/>
                                <label for="rating-31" class="fa fa-star"></label>
                                <input type="radio" name="rating" id="rating-32" value="2"/>
                                <label for="rating-32" class="fa fa-star"></label>
                                <input type="radio" name="rating" id="rating-33" value="3"/>
                                <label for="rating-33" class="fa fa-star"></label>
                                <input type="radio" name="rating" id="rating-34" value="4"/>
                                <label for="rating-34" class="fa fa-star"></label>
                                <input type="radio" name="rating" id="rating-35" value="5"/>
                                <label for="rating-35" class="fa fa-star"></label>
                            </form>
                        </div>
                    </div> --}}

                    <!-- Uplaod Photos -->
                    {{-- <div class="uploadButton margin-top-15">
                        <input class="uploadButton-input" type="file"  name="attachments[]" accept="image/*, application/pdf" id="upload" multiple/>
                        <label class="uploadButton-button ripple-effect" for="upload">Add Photos</label>
                        <span class="uploadButton-file-name"></span>
                    </div> --}}
                    <!-- Uplaod Photos / End -->

                </div>
            @endif
        <!-- Subratings Container / End -->

        <!-- Review Comment -->

            <fieldset>
                @if ($isSellerWorkplace)
                @else
                <div class="row">
                    <div class="col-md-6">
                        <label>Name:</label>
                        <input type="text" name="name" value=""/>
                    </div>

                    <div class="col-md-6">
                        <label>Email:</label>
                        <input type="text" name="email" value=""/>
                    </div>
                </div>
                @endif

                <div>
                    <label>Review:</label>
                    <textarea cols="40" name="comment" required rows="3"></textarea>
                </div>

            </fieldset>

            <button class="button">Yorum Ekle</button>
            <div class="clearfix"></div>
        </form>


</div>


<script>
    function changePid(id) {

        var pid_item = $(".pid_item");
        console.log(pid_item);
        pid_item.attr('value', id);
    }
</script>
