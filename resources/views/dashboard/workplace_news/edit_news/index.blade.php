@extends('dashboard.layouts.master')
@section('content')
<div class="dashboard-content">

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Haber Ekle</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Dashboard</a></li>
                        <li>Add Listing</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form action="{{route("workplace.news.edit")}}" method="post"  enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="news_id" value="{{encrypt($news->id)}}">
                <div id="add-listing">

                    <!-- Section -->
                    @include('dashboard.workplace_news.edit_news.basic_information')
                    <!-- Section / End -->

                    <!-- Section -->

                    <!-- Section / End -->
                    @include('dashboard.workplace_news.edit_news.gallery')


                    <!-- Section -->

                    <!-- Section / End -->



                    <!-- Section / End -->


                    <button type="submit" class="button preview">Preview <i class="fa fa-arrow-circle-right"></i></button>

                </div>
            </form>
        </div>

        <!-- Copyrights -->
        <div class="col-md-12">
            <div class="copyrights">© 2021 Listeo. All Rights Reserved.</div>
        </div>

    </div>

</div>

@endsection
