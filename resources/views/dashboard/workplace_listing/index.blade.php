@extends('dashboard.layouts.master')
@section('content')

<div class="dashboard-content">

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>İşyerleri</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Dashboard</a></li>
                        <li>My Listings</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">

        <!-- Listings -->
        <div class="col-lg-12 col-md-12">
            <div class="dashboard-list-box margin-top-0">
                <h4>İşyerleri Listesi</h4>
                <ul>

                @foreach ($workplaces as $workplace)
                    <li>
                        <div class="list-box-listing">
                            <div class="list-box-listing-img"><a href="#"><img src="{{$workplace->workplaceImage->location}}" alt=""></a></div>
                            <div class="list-box-listing-content">
                                <div class="inner">
                                    <h3><a href="#">{{$workplace->title}}</a></h3>
                                    <span>{{$workplace->full_adress}}</span>
                                    <div>
                                        <span> <b>Durum:</b>  </span>
                                        @if ($workplace->status =="waiting")
                                            <span> Onaylanmayı Bekliyor</span>
                                        @elseif($workplace->status == "verifyed")
                                            <span> Onaylandı Ödeme Bekliyor</span>
                                        @elseif($workplace->status == "payed")
                                            <span> Ödeme Yapıldı Tam Erişimli</span>
                                        @endif
                                    </div>
                                    <div>
                                        <span>Tıklanma Sayısı:</span>
                                        <span>{{$workplace->click_rate}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="buttons-to-right" style="display: flex">
                            @if ($workplace->status == "payed")
                                <a href="{{route("dashboard.edit_listing",$workplace->slug)}}" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
                                <a href="{{route("dashboard.news.listing",$workplace->slug)}}" class="button gray"><i class="sl sl-icon-note"></i> Haberler</a>
                            @elseif($workplace->status == "waiting")
                                Onaylanmayı Bekliyor
                            @elseif($workplace->status == "verifyed")
                                <a href="{{route("dashboard.edit_listing",$workplace->slug)}}" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
                                <a href="{{route("dashboard.news.listing",$workplace->slug)}}" class="button gray"><i class="sl sl-icon-note"></i> Haberler</a>
                                <form action="{{route("dashboard.workplace.payment")}}" method="post">
                                    @csrf
                                    <input type="hidden" name="workplace_id" value="{{encrypt($workplace->id)}}">
                                    <button class="button gray"><i class="sl sl-icon-credit-card"></i>Ödeme İşlemi</button>
                                </form>
                            @endif
                            {{-- <a href="#" class="button gray"><i class="sl sl-icon-close"></i> Delete</a> --}}
                        </div>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>


        <!-- Copyrights -->
        <div class="col-md-12">
            <div class="copyrights">© 2021 Listeo. All Rights Reserved.</div>
        </div>
    </div>

</div>

@endsection
