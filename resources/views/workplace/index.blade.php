@extends('layouts.master')

@section('content')
@include('workplace.slider')


<!-- Content
================================================== -->

<div class="container">
	<div class="row sticky-wrapper">
		<div class="col-lg-8 col-md-8 padding-right-30">

			<!-- Titlebar -->
			@include('workplace.information')


			<!-- Listing Nav -->
			<div id="listing-nav" class="listing-nav-container">
				<ul class="listing-nav">
					<li><a href="#listing-overview" class="active">Tanıtım</a></li>
					<li><a href="#listing-pricing-list">Ücretlendirme</a></li>
                    @if ($workplace->status =="payed")
					<li><a href="#listing-news-list">Haberler</a></li>
                    @endif
					<li><a href="#listing-location">Yerleşke</a></li>
					<li><a href="#listing-reviews">Yorumlar</a></li>
					<li><a href="#add-review">Yorum Ekle</a></li>
				</ul>
			</div>

			<!-- Overview -->

			@include('workplace.details')

            @if ($workplace->status =="payed" && $workplace->youtube_embed != "")
			    @include('workplace.introduction')
            @endif

            @include('workplace.news')
			<!-- Food Menu -->
			@include('workplace.pricing')

			<!-- Food Menu / End -->


			<!-- Location -->
			@include('workplace.location')


			<!-- Reviews -->
			@include('workplace.reviews')



			<!-- Add Review Box -->
			@include('workplace.add_review')

			<!-- Add Review Box / End -->


		</div>


		<!-- Sidebar
		================================================== -->
        @include('workplace.sidebar')

		<!-- Sidebar / End -->

	</div>
</div>
{{-- @include('workplace.notice') --}}
@endsection

@section('footer')
    @include('workplace.notice')
@endsection
