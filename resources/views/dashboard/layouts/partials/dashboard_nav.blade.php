<!-- Responsive Navigation Trigger -->
<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>

<div class="dashboard-nav">
    <div class="dashboard-nav-inner">

        <ul data-submenu-title="Kullanıcı İşlemleri">
            {{-- <li class="active"><a href="dashboard.html"><i class="sl sl-icon-settings"></i> Dashboard</a></li> --}}
            <li ><a href="{{route("dashboard.profile.show")}}"><i class="sl sl-icon-settings"></i> Profil Ayarları</a></li>
            {{-- <li><a href="dashboard-messages.html"><i class="sl sl-icon-envelope-open"></i> Messages <span class="nav-tag messages">2</span></a></li>
            <li><a href="dashboard-bookings.html"><i class="fa fa-calendar-check-o"></i> Bookings</a></li>
            <li><a href="dashboard-wallet.html"><i class="sl sl-icon-wallet"></i> Wallet</a></li> --}}
        </ul>
        <ul data-submenu-title="İşyerleri İşlemleri">
            {{-- <li class="active"><a href="dashboard.html"><i class="sl sl-icon-settings"></i> Dashboard</a></li> --}}
            <li ><a href="{{route("dashboard.add_listing")}}"><i class="fa fas fa-solid fa-plus"></i> İşyeri Ekle</a></li>
            <li ><a href="{{route("dashboard.listing.workplace")}}"><i class="fa fas fa-solid fa-list"></i> İşyerlerini Görüntüle</a></li>
            <li ><a href="{{route("dashboard.messages")}}"><i class=" fa fas fa-solid fa-list"></i> Mesajları Görüntüle</a></li>
            {{-- <li><a href="dashboard-messages.html"><i class="sl sl-icon-envelope-open"></i> Messages <span class="nav-tag messages">2</span></a></li>
            <li><a href="dashboard-bookings.html"><i class="fa fa-calendar-check-o"></i> Bookings</a></li>
            <li><a href="dashboard-wallet.html"><i class="sl sl-icon-wallet"></i> Wallet</a></li> --}}
        </ul>
        <ul data-submenu-title="Account">
            {{-- <li><a href="dashboard-my-profile.html"><i class="sl sl-icon-user"></i> My Profile</a></li> --}}
            <li><a href="{{route("user.logout")}}"><i class="sl sl-icon-power"></i> Logout</a></li>
        </ul>

    </div>
</div>
<!-- Navigation / End -->
