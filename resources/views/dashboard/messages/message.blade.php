<li class="pending-booking">
    <div class="list-box-listing bookings">
        <div class="list-box-listing-img"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&s=120" alt=""></div>
        <div class="list-box-listing-content">
            <div class="inner">
                <h3>{{$message->name}}
                    @if ($message->reply)
                    <span class="booking-status pending">cevaplandı</span>
                    @else
                    <span class="booking-status unpaid">cevaplanmadı</span>
                    @endif

                    </h3>

                <div class="inner-booking-list">
                    <h5>İş Yeri:</h5>
                    <ul class="booking-list">
                        <li class="highlighted">{{$message->getWorkplace->title}}</li>
                    </ul>
                </div>
                <div class="inner-booking-list">
                    <h5>Mesaj Tarihi:</h5>
                    <ul class="booking-list">
                        <li class="highlighted">{{$message->created_at}}</li>
                    </ul>
                </div>

                <div class="inner-booking-list">
                    <h5>Mesaj İçeriği:</h5>
                    <ul class="booking-list">
                        <li>
                            {{$message->message}}
                        </li>
                    </ul>
                </div>

                <div class="inner-booking-list">
                    <h5>Mail:</h5>
                    <ul class="booking-list">
                        <li class="highlighted">{{$message->email}}</li>
                    </ul>
                </div>
                <div class="inner-booking-list">
                    <h5>Telefon:</h5>
                    <ul class="booking-list">
                        <li class="highlighted">{{$message->phone}}</li>
                    </ul>
                </div>

                <div class="inner-booking-list">
                    <h5>İletişim tercihi:</h5>
                    <ul class="booking-list">
                        <li>{{strtoupper($message->preferred_contact)}} ile</li>

                    </ul>
                </div>



            </div>
        </div>
    </div>
    @if (!$message->reply)
    <div class="buttons-to-right">
        <form action="{{route("dashboard.message.reply")}}" method="post">
        @csrf
        <input type="hidden" name="message_id" value="{{encrypt($message->id)}}">
        <button type="submit"  class="button gray approve"><i class="sl sl-icon-check"></i> Cevaplandı</button>
        </form>
    </div>
    @endif
</li>
