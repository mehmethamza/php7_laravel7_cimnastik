
@extends('layouts.master')
@section('content')
<script>
    var map_locations = [
        @foreach ($workplaces as $workplace)
            @php
                $location = explode(",",$workplace -> location)
            @endphp
            {
                "location_1" : "{{$location[0]}}",
                "location_2" : "{{$location[1]}}",
                "url" : "{{route("workplace",$workplace -> slug)}}",
                "name" : "{{$workplace -> title}}",
                "address" : "{{$workplace -> province}}"+"/"+"{{$workplace -> district}}",
                "image" : `{{$workplace->workplaceImage->location ?? "https://dummyimage.com/550/ffffff/000000"}}`,

            },
        @endforeach
    ];
</script>
<div  id="workplaces">
    @include('home.map_search')
    <div class="container">
        <div class="row">

            <div class="col-md-12">

                <!-- Sorting - Filtering Section -->
                <div class="row margin-bottom-25 margin-top-40">

                    <div class="col-md-6">
                        <!-- Layout Switcher -->
                        <div class="layout-switcher">
                            <a href="#" class="grid active"><i class="fa fa-th"></i></a>
                            <a href="listings-list-full-width.html" class="list"><i class="fa fa-align-justify"></i></a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="fullwidth-filters">

                            <!-- Panel Dropdown -->
                            <div class="panel-dropdown wide float-right">
                                <a href="#">More Filters</a>
                                <div class="panel-dropdown-content checkboxes">

                                    <!-- Checkboxes -->
                                    <div class="row">
                                        @foreach ($properties as $property)
                                            <input id="check-{{$property->name}}" type="checkbox" value="{{encrypt($property->id)}}" @change="getWorkplaces()" v-model="checkedProperties" name="check">
                                            <label for="check-{{$property->name}}">{{$property->name}}</label>
                                        @endforeach
                                    </div>


                                    <!-- Buttons -->
                                    <div class="panel-buttons">
                                        <button class="panel-cancel">Cancel</button>
                                        <button class="panel-apply" @change="getWorkplaces()">Apply</button>
                                    </div>

                                </div>
                            </div>
                            <!-- Panel Dropdown / End -->

                            {{-- <!-- Panel Dropdown-->
                            <div class="panel-dropdown float-right">
                                <a href="#">Distance Radius</a>
                                <div class="panel-dropdown-content">
                                    <input class="distance-radius" type="range" min="1" max="100" step="1" value="50" data-title="Radius around selected destination">
                                    <div class="panel-buttons">
                                        <button class="panel-cancel">Disable</button>
                                        <button class="panel-apply">Apply</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Panel Dropdown / End -->

                            <!-- Sort by -->
                            <div class="sort-by">
                                <div class="sort-by-select">
                                    <select data-placeholder="Default order" class="chosen-select-no-single">
                                        <option>Default Order</option>
                                        <option>Highest Rated</option>
                                        <option>Most Reviewed</option>
                                        <option>Newest Listings</option>
                                        <option>Oldest Listings</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Sort by / End --> --}}

                        </div>
                    </div>

                </div>
                <!-- Sorting - Filtering Section / End -->

                {{--  --}}
                @include('home.populer_workplaces')
            {{--  --}}
                <div class="row "  >

                    @include('home.workplace')

                </div>

                <!-- Pagination -->
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Pagination -->
                        <div class="pagination-container margin-top-20 margin-bottom-40">
                            <nav class="pagination">
                                <ul>
                                    <li><a href="#" class="current-page">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Pagination / End -->

            </div>

        </div>
    </div>
</div>
@endsection
