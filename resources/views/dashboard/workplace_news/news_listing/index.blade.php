@extends('dashboard.layouts.master')
@section('content')

<div class="dashboard-content">

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Haberler</h2>
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
                <h4><form action="{{route("dashboard.news.store.page")}}" method="post">@csrf<input type="hidden" name="workplace_id" value="{{encrypt($workplace->id)}}"><button  class="button gray" type="submit">Haber Ekle</button></form></h4>

                <ul>

                @foreach ($news as $wnews)
                    <li>
                        <div class="list-box-listing">
                            <div class="list-box-listing-img"><a href="#"><img src="{{$wnews->image}}" alt=""></a></div>
                            <div class="list-box-listing-content">
                                <div class="inner">
                                    <h3><a href="#">{{$wnews->title}}</a></h3>
                                    <span style="margin-right: 70px;">
                                        <p style="margin-right: 90px">
                                            <b>İçareği:</b>
                                            {{$wnews->content}}
                                        </p>
                                    </span>

                                </div>
                            </div>
                        </div>
                        <div class="buttons-to-right" style="display: inline-flex">
                            <form action="{{route("dashboard.news.edit.page")}}" method="post" >
                                @csrf
                                <input type="hidden" name="news_id" value="{{encrypt($wnews->id)}}">
                                <button class="button gray" type="submit"><i class="sl sl-icon-note"></i>Edit</button>
                            </form>
                            <a href="#" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
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
