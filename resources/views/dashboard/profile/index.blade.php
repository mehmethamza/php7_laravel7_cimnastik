@extends('dashboard.layouts.master')
@section('content')

<div class="dashboard-content">

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>My Profile</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Dashboard</a></li>
                        <li>My Profile</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">

        <!-- Profile -->
        <div class="col-lg-6 col-md-12">
            <div class="dashboard-list-box margin-top-0">
                <h4 class="gray">Profile Details</h4>
                <div class="dashboard-list-box-static">
                    <form action="{{route("dashboard.profile.update.details")}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <!-- Avatar -->
                    <div class="edit-profile-photo">
                        <img src="..{{$user->userDetails->image ?? "/images/user-avatar.jpg" }}" alt="">
                        <div class="change-photo-btn">
                            <div class="photoUpload">
                                <span><i class="fa fa-upload"></i> Upload Photo</span>
                                <input type="file" class="upload" name="image" />
                            </div>
                        </div>
                    </div>

                    <!-- Details -->
                    <div class="my-profile">

                        <label>Your Name</label>
                        <input  name="name" value="{{$user->name}}" type="text">

                        <label>Phone</label>
                        <input  name="phone" value="{{$user->userDetails->phone}}" type="text">

                        {{-- <label>Email</label>
                        <input value="tom@example.com" type="text">

                        <label>Notes</label>
                        <textarea name="notes" id="notes" cols="30" rows="10">Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper</textarea> --}}

                        <label><i class="fa fa-twitter"></i> Twitter</label>
                        <input name="twitter" value="{{$user->userDetails->twitter}}" type="text">

                        <label><i class="fa fa-facebook-square"></i> Facebook</label>
                        <input name="facebook" value="{{$user->userDetails->facebook}}" type="text">

                        <label><i class="fa fa-linkedin-square"></i> Linkedin</label>
                        <input name="linkedin" value="{{$user->userDetails->linkedin}}" type="text">

                        <label><i class="fa fa-instagram"></i> Instagram</label>
                        <input name="instagram" value="{{$user->userDetails->instagram}}" type="text">

                        <label><i class="fa fa-youtube"></i> Youtube</label>
                        <input name="youtube" value="{{$user->userDetails->youtube}}" type="text">

                        {{-- <label><i class="fa fa-google-plus"></i> Google+</label>
                        <input placeholder="https://www.google.com/" type="text"> --}}
                    </div>

                    <button type="submit" class="button margin-top-15">Save Changes</button>
                    </form>

                </div>
            </div>
        </div>

        <!-- Change Password -->
        <div class="col-lg-6 col-md-12">
            <div class="dashboard-list-box margin-top-0">
                <h4 class="gray">Change Password</h4>
                <div class="dashboard-list-box-static">

                    <!-- Change Password -->
                    <div class="my-profile">
                        <form action="{{route("dashboard.profile.update.password")}}" method="post">
                        @csrf
                        <label class="margin-top-0">Current Password</label>
                        <input type="password" name="lastpassword">

                        <label>New Password</label>
                        <input type="password" name="newpassword">

                        <label>Confirm New Password</label>
                        <input type="password" name="confirmnewpassword">

                        <button class="button margin-top-15">Change Password</button>
                        </form>
                    </div>

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
