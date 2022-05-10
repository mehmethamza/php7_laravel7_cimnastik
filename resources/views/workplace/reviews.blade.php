<div id="listing-reviews" class="listing-section">
    <h3 class="listing-desc-headline margin-top-75 margin-bottom-20">Yorumlar <span></span></h3>

    <!-- Rating Overview -->
    <div class="rating-overview">
        <div class="rating-overview-box">
            <span class="rating-overview-box-total">{{$average_rating_average}}</span>
            <span class="rating-overview-box-percent">üzerinden 5.0</span>
            <div class="star-rating" data-rating="{{$average_rating_average}}"></div>
        </div>

        <div class="rating-bars">
                <div class="rating-bars-item">
                    <span class="rating-bars-name">Hizmet <i class="tip" data-tip-content="Quality of customer service and attitude to work with you"></i></span>
                    <span class="rating-bars-inner">
                        <span class="rating-bars-rating" data-rating="{{$average_rating_service}}">
                            <span class="rating-bars-rating-inner"></span>
                        </span>
                        <strong>{{$average_rating_service}}</strong>
                    </span>
                </div>
                <div class="rating-bars-item">
                    <span class="rating-bars-name">İletişim <i class="tip" data-tip-content="Overall experience received for the amount spent"></i></span>
                    <span class="rating-bars-inner">
                        <span class="rating-bars-rating" data-rating="{{$average_rating_communacatione}}">
                            <span class="rating-bars-rating-inner"></span>
                        </span>
                        <strong>{{$average_rating_communacatione}}</strong>
                    </span>
                </div>
                <div class="rating-bars-item">
                    <span class="rating-bars-name">Tavsiye <i class="tip" data-tip-content="Visibility, commute or nearby parking spots"></i></span>
                    <span class="rating-bars-inner">
                        <span class="rating-bars-rating" data-rating="{{$average_rating_advice}}">
                            <span class="rating-bars-rating-inner"></span>
                        </span>
                        <strong>{{$average_rating_advice}}</strong>
                    </span>
                </div>
                <div class="rating-bars-item">
                    <span class="rating-bars-name">Ortalama <i class="tip" data-tip-content="The physical condition of the business"></i></span>
                    <span class="rating-bars-inner">
                        <span class="rating-bars-rating" data-rating="{{$average_rating_average}}">
                            <span class="rating-bars-rating-inner"></span>
                        </span>
                        <strong>{{$average_rating_average}}</strong>
                    </span>
                </div>
        </div>
    </div>
    <!-- Rating Overview / End -->


    <div class="clearfix"></div>

    <!-- Reviews -->
    <section class="comments listing-reviews">
        <ul>
            @foreach ($comments as $comment)
            <li>
                <div class="avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
                <div class="comment-content"><div class="arrow-comment"></div>
                    <div class="comment-by">{{$comment->name}}  <span class="date">{{$comment -> created_at}}</span>
                        <div class="star-rating" data-rating="{{$comment->rating_average}}"></div>
                    </div>
                    <p>{{$comment -> comment}}</p>

                    {{-- <div class="review-images mfp-gallery-container">
                        <a href="images/review-image-01.jpg" class="mfp-gallery"><img src="images/review-image-01.jpg" alt=""></a>
                    </div> --}}

                    @if ($isSellerWorkplace)
                        @if ($workplace->status=="payed")
                            <a href="javascript:;" onclick="changePid('{{encrypt($comment->id)}}')" class="rate-review">Cevapla</a>
                        @else
                            <a href="{{route("dashboard.redirect.payment")}}" class="rate-review">Cevapla</a>
                        @endif

                    @endif

                </div>
                    @if (!empty($comment -> childComments[0]))
                    <ul>
                        @foreach ($comment -> childComments as $comment)
                        <li>
                            <style>
                                .avatar-image{
                                    height: 9rem ;
                                    width: 10rem;
                                    border-radius: 50%;
                                }
                            </style>
                            <div class="avatar"><img class="avatar-image" src="{{$seller->userDetails->image}} @if(empty($seller->userDetails->image)) http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&s=70 @endif " alt="" /></div>
                            <div class="comment-content"><div class="arrow-comment"></div>
                                <div class="comment-by">{{$seller->name}}  <span >Fİrma Sahibi</span>

                                </div>
                                <p>{{$comment -> comment}}</p>
                                {{-- <div class="review-images mfp-gallery-container">
                                    <a href="{{$seller->userDetails->image}}" class="mfp-gallery">
                                        {{-- <img src="images/review-image-01.jpg" alt="">
                                    </a>
                                </div> --}}
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                {{-- <ul>
                    <li>
                        <div class="avatar"><img src="{{$seller->userDetails->image}}" alt="" /></div>
                        <div class="comment-content"><div class="arrow-comment"></div>
                            <div class="comment-by">{{$seller->name}}  <span >Fİrma Sahibi</span>

                            </div>
                            <p>{{$comment -> comment}}</p>

                            <div class="review-images mfp-gallery-container">
                                <a href="{{$seller->userDetails->image}}" class="mfp-gallery"><img src="images/review-image-01.jpg" alt=""></a>
                            </div>


                        </div>
                    </li>
                </ul> --}}
            </li>
            @endforeach
         </ul>
    </section>

    <!-- Pagination -->
    <div class="clearfix"></div>
    {{-- <div class="row">
        <div class="col-md-12">
            <!-- Pagination -->
            <div class="pagination-container margin-top-30">
                <nav class="pagination">
                    <ul>
                        <li><a href="#" class="current-page">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div> --}}
    <div class="clearfix"></div>
    <!-- Pagination / End -->
</div>
