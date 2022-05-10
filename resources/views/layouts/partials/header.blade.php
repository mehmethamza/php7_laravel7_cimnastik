<header id="header-container">

	<!-- Header -->
	<div id="header">
		<div class="container">

			<!-- Left Side Content -->
			<div class="left-side">

				<!-- Logo -->
				<div id="logo">
					<a href="{{route("home")}}"><img src="../../images/logo.png" alt=""></a>
				</div>

				<!-- Mobile Navigation -->
				<div class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>

				<!-- Main Navigation -->
				<nav id="navigation" class="style-1">
					<ul id="responsive">

						<li><a href="{{route("home")}}">Home</a>
						</li>

						{{-- <li><a class="current" href="#">Listings</a>
							<ul>
								<li><a href="#">List Layout</a>
									<ul>
										<li><a href="listings-list-with-sidebar.html">With Sidebar</a></li>
										<li><a href="listings-list-full-width.html">Full Width</a></li>
										<li><a href="listings-list-full-width-with-map.html">Full Width + Map</a></li>
									</ul>
								</li>
								<li><a href="#">Grid Layout</a>
									<ul>
										<li><a href="listings-grid-with-sidebar-1.html">With Sidebar 1</a></li>
										<li><a href="listings-grid-with-sidebar-2.html">With Sidebar 2</a></li>
										<li><a href="listings-grid-full-width.html">Full Width</a></li>
										<li><a href="listings-grid-full-width-with-map.html">Full Width + Map</a></li>
									</ul>
								</li>
								<li><a href="#">Half Screen Map</a>
									<ul>
										<li><a href="listings-half-screen-map-list.html">List Layout</a></li>
										<li><a href="listings-half-screen-map-grid-1.html">Grid Layout 1</a></li>
										<li><a href="listings-half-screen-map-grid-2.html">Grid Layout 2</a></li>
									</ul>
								</li>
								<li><a href="#">Single Listings</a>
									<ul>
										<li><a href="listings-single-page.html">Single Listing 1</a></li>
										<li><a href="listings-single-page-2.html">Single Listing 2</a></li>
										<li><a href="listings-single-page-3.html">Single Listing 3</a></li>
									</ul>
								</li>
								<li><a href="#">Open Street Map</a>
									<ul>
										<li><a href="listings-half-screen-map-list-OpenStreetMap.html">Half Screen Map List Layout</a></li>
										<li><a href="listings-half-screen-map-grid-1-OpenStreetMap.html">Half Screen Map Grid Layout 1</a></li>
										<li><a href="listings-half-screen-map-grid-2-OpenStreetMap.html">Half Screen Map Grid Layout 2</a></li>
										<li><a href="listings-list-full-width-with-map-OpenStreetMap.html">Full Width List</a></li>
										<li><a href="listings-grid-full-width-with-map-OpenStreetMap.html">Full Width Grid</a></li>
										<li><a href="listings-single-page-OpenStreetMap.html">Single Listing</a></li>
									</ul>
								</li>
							</ul>
						</li>

						<li><a href="#">User Panel</a>
							<ul>
								<li><a href="dashboard.html">Dashboard</a></li>
								<li><a href="dashboard-messages.html">Messages</a></li>
								<li><a href="dashboard-bookings.html">Bookings</a></li>
								<li><a href="dashboard-wallet.html">Wallet</a></li>
								<li><a href="dashboard-my-listings.html">My Listings</a></li>
								<li><a href="dashboard-reviews.html">Reviews</a></li>
								<li><a href="dashboard-bookmarks.html">Bookmarks</a></li>
								<li><a href="dashboard-add-listing.html">Add Listing</a></li>
								<li><a href="dashboard-my-profile.html">My Profile</a></li>
								<li><a href="dashboard-invoice.html">Invoice</a></li>
							</ul>
						</li>

						<li><a href="#">Pages</a>
							<div class="mega-menu mobile-styles three-columns">

									<div class="mega-menu-section">
										<ul>
											<li class="mega-menu-headline">Pages #1</li>
											<li><a href="pages-user-profile.html"><i class="sl sl-icon-user"></i> User Profile</a></li>
											<li><a href="pages-booking.html"><i class="sl sl-icon-check"></i> Booking Page</a></li>
											<li><a href="pages-add-listing.html"><i class="sl sl-icon-plus"></i> Add Listing</a></li>
											<li><a href="pages-blog.html"><i class="sl sl-icon-docs"></i> Blog</a></li>
										</ul>
									</div>

									<div class="mega-menu-section">
										<ul>
											<li class="mega-menu-headline">Pages #2</li>
											<li><a href="pages-contact.html"><i class="sl sl-icon-envelope-open"></i> Contact</a></li>
											<li><a href="pages-coming-soon.html"><i class="sl sl-icon-hourglass"></i> Coming Soon</a></li>
											<li><a href="pages-404.html"><i class="sl sl-icon-close"></i> 404 Page</a></li>
											<li><a href="pages-masonry-filtering.html"><i class="sl sl-icon-equalizer"></i> Masonry Filtering</a></li>
										</ul>
									</div>

									<div class="mega-menu-section">
										<ul>
											<li class="mega-menu-headline">Other</li>
											<li><a href="pages-elements.html"><i class="sl sl-icon-settings"></i> Elements</a></li>
											<li><a href="pages-pricing-tables.html"><i class="sl sl-icon-tag"></i> Pricing Tables</a></li>
											<li><a href="pages-typography.html"><i class="sl sl-icon-pencil"></i> Typography</a></li>
											<li><a href="pages-icons.html"><i class="sl sl-icon-diamond"></i> Icons</a></li>
										</ul>
									</div>

							</div>
						</li> --}}
                        @if (auth()->check())
                            <li><a href="{{route("dashboard.index")}}">Dashboard</a></li>
                        @else

                        @endif

					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->

			</div>
			<!-- Left Side Content / End -->

			<!-- Right Side Content / End -->
			<div class="right-side">
				<div class="header-widget">
                    @if (auth()->check())
                    <a href="{{route("user.logout")}}" class="button border with-icon">Logout</a>
			        @else
					<a href="#sign-in-dialog"  class="sign-in popup-with-zoom-anim sign-panel"><i class="sl sl-icon-login"></i> Sign In</a>
                    @endif
				</div>
			</div>
			<!-- Right Side Content / End -->

			<!-- Sign In Popup -->

			<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">

				<div class="small-dialog-header">
					<h3>Sign In</h3>
				</div>

				<!--Tabs -->

                    <div class="sign-in-form style-1">

                        <ul class="tabs-nav">
                            <li class=""><a href="#tab1">Log In</a></li>
                            <li><a href="#tab2">Register</a></li>
                        </ul>

                        <div class="tabs-container alt">

                            <!-- Login -->
                            @include('layouts.partials.login')

                            <!-- Register -->
                            @include('layouts.partials.register')

                        </div>
                    </div>

			</div>
			<!-- Sign In Popup / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
