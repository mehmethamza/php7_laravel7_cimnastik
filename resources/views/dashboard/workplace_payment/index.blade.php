@extends('dashboard.layouts.master')
@section('content')

<div class="dashboard-content">

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>{{$workplace->title}}</h2>
                <!-- Breadcrumbs -->
                {{-- <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Dashboard</a></li>
                        <li>My Listings</li>
                    </ul>
                </nav> --}}
            </div>
        </div>
    </div>

    <div class="row">

        <!-- Listings -->
        <div class="col-lg-12 col-md-12">
            <div class="dashboard-list-box margin-top-0">
                <h4>Tam erişim için ödeme işlemi</h4>
                </div>
                    <div>
                        {!! $paymentForm !!}
                        <div id="iyzipay-checkout-form" >

                    </div>
                </div>
            </div>



        <!-- Copyrights -->
        <div class="col-md-12">
            <div class="copyrights">© 2021 Listeo. All Rights Reserved.</div>
        </div>
    </div>

</div>

@endsection
