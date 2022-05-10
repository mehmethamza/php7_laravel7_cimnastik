<div class="col-lg-4 col-md-4 margin-top-75 sticky">


    <!-- Verified Badge -->
    @if ($workplace->status == "verifyed")
    <div class="verified-badge with-tip" data-tip-content="Bu roldeki iş yerleri onaylanmıştır ama verilerini düzenleyememektedirler">
        <i class="sl sl-icon-close"></i> Kısıtlı Erişimli
    </div>
    @elseif($workplace->status == "payed")
    <div class="verified-badge with-tip" data-tip-content="Bu roldeki iş yerleri tam yetkiye sahiptir verileri kendi kontrollerindedir">
        <i class="sl sl-icon-check"></i> Tam Erişimli
    </div>
    @endif


    <!-- Message Vendor -->
    <form action="{{route("workplace.store.message")}}" method="post">
        @csrf
        <input type="hidden" value="{{encrypt($workplace->id)}}" name="workplace_id">
        <div id="booking-widget-anchor" class="boxed-widget booking-widget message-vendor margin-top-35">
            <h3><i class="fa fa-envelope-o"></i> Message Vendor</h3>
            <div class="row with-forms  margin-top-0">

                <div class="col-lg-12">
                    <input type="text" placeholder="First and Last Name" value="Tom Smith" name="name">
                    <input type="text" placeholder="Email" value="mail@example.com" name="email">
                    <input type="text" placeholder="Phone" value="+12 345 678 910" name="phone">
                    <textarea id="" cols="10" rows="2" placeholder="Message" name="message" ></textarea>
                </div>

                <!-- Preferred Contact Methos Radios -->
                <div class="col-lg-12">
                    <div class="preferred-contact-method">
                        <h5>Preferred contact method</h5>

                        <div class="preferred-contact-radios">
                            <div class="radio">
                                <input id="radio-1" name="preferred_contact" type="radio" value="email"  checked>
                                <label for="radio-1"><span class="radio-label"></span> Email</label>
                            </div>

                            <div class="radio">
                                <input id="radio-2" name="preferred_contact" type="radio" value="phone">
                                <label for="radio-2"><span class="radio-label"></span> Phone</label>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Recaptcha Holder -->
            <div class="captcha-holder">
                <!-- Recaptcha goes here -->
            </div>

            <!-- Book Now -->
            <button href="#" class="button book-now fullwidth margin-top-5">Request Pricing</button>
        </div>
    </form>
    <!-- Book Now / End -->


    <!-- Contact -->
    <div class="boxed-widget margin-top-35">
        <div class="hosted-by-title">
            <h4><span>Hosted by</span> <a href="pages-user-profile.html">{{$workplace->workplaceSeller->name}}</a></h4>
            <a href="pages-user-profile.html" class="hosted-by-avatar"><img src="../images/dashboard-avatar.jpg" alt=""></a>
        </div>
        <ul class="listing-details-sidebar">
            <li><i class="sl sl-icon-phone"></i> <a href="tel:+90{{$workplace->workplaceSeller->userDetails->phone}}">{{$workplace->workplaceSeller->userDetails->phone}}</a></li>
            <!-- <li><i class="sl sl-icon-globe"></i> <a href="#">http://example.com</a></li> -->
            <li><i class="fa fa-envelope-o"></i> <a href="#">{{$workplace->workplaceSeller->email}}</a></li>
        </ul>

        <ul class="listing-details-sidebar social-profiles">
            <li><a href="#" class="facebook-profile"><i class="fa fa-facebook-square"></i> Facebook</a></li>
            <li><a href="#" class="twitter-profile"><i class="fa fa-twitter"></i> Twitter</a></li>
            <!-- <li><a href="#" class="gplus-profile"><i class="fa fa-google-plus"></i> Google Plus</a></li> -->
        </ul>

        <!-- Reply to review popup -->
        {{-- <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
            <div class="small-dialog-header">
                <h3>Send Message</h3>
            </div>
            <div class="message-reply margin-top-0">
                <textarea cols="40" rows="3" placeholder="Your message to Tom"></textarea>
                <button class="button">Send Message</button>
            </div>
        </div> --}}

        {{-- <a href="#small-dialog" class="send-message-to-owner button popup-with-zoom-anim"><i class="sl sl-icon-envelope-open"></i> Send Message</a> --}}
    </div>
    <!-- Contact / End-->


    <!-- Share / Like -->
    {{-- <div class="listing-share margin-top-40 margin-bottom-40 no-border">
        <button class="like-button"><span class="like-icon"></span> Bookmark this listing</button>
        <span>159 people bookmarked this place</span>

            <!-- Share Buttons -->
            <ul class="share-buttons margin-top-40 margin-bottom-0">
                <li><a class="fb-share" href="#"><i class="fa fa-facebook"></i> Share</a></li>
                <li><a class="twitter-share" href="#"><i class="fa fa-twitter"></i> Tweet</a></li>
                <li><a class="gplus-share" href="#"><i class="fa fa-google-plus"></i> Share</a></li>
                <!-- <li><a class="pinterest-share" href="#"><i class="fa fa-pinterest-p"></i> Pin</a></li> -->
            </ul>
            <div class="clearfix"></div>
    </div> --}}

</div>
