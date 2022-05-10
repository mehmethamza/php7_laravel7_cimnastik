@extends('dashboard.layouts.master')
@section('content')



<div class="dashboard-content">

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Add Listing</h2>
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
            <form action="{{route("dashboard.workplace.store")}}" method="post"  enctype="multipart/form-data">
                @csrf
                <div id="add-listing">

                    <!-- Section -->
                    @include('dashboard.add_listing.basic_information')
                    <!-- Section / End -->

                    <!-- Section -->
                    @include('dashboard.add_listing.location')

                    <!-- Section / End -->
                    @include('dashboard.add_listing.gallery')


                    <!-- Section -->

                    <!-- Section / End -->


                    <!-- Section -->
                    @include('dashboard.add_listing.details')

                    <!-- Section / End -->


                    <!-- Section -->
                    {{-- <div class="add-listing-section margin-top-45">

                        <!-- Headline -->
                        <div class="add-listing-headline">
                            <h3><i class="fa fa-calendar-check-o"></i> Availability</h3>
                            <!-- Switcher -->
                            <label class="switch"><input type="checkbox" checked><span class="slider round"></span></label>
                        </div>

                        <!-- Switcher ON-OFF Content -->
                        <div class="switcher-content">

                                <!-- Availablity Slots -->
                                <!-- Set data-clock-type="24hr" to enable 24 hours clock type -->
                                <div class="availability-slots" data-clock-type="24hr">

                                    <!-- Single Day Slots -->
                                    <div class="day-slots">
                                        <div class="day-slot-headline">
                                            Monday
                                        </div>

                                        <!-- Slot For Cloning / Do NOT Remove-->
                                        <div class="single-slot cloned">
                                            <div class="single-slot-left">
                                                <div class="single-slot-time"></div>
                                                <button class="remove-slot"><i class="fa fa-close"></i></button>
                                            </div>

                                            <div class="single-slot-right">
                                                <strong>Slots:</strong>
                                                <div class="plusminus horiz">
                                                    <button></button>
                                                    <input type="number" name="slot-qty" value="1" min="1" max="99">
                                                    <button></button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Slot For Cloning / Do NOT Remove-->


                                        <!-- No slots -->
                                        <div class="no-slots">No slots added</div>

                                        <!-- Slots Container -->
                                        <div class="slots-container">

                                            <!-- Single Slot -->
                                            <div class="single-slot">
                                                <div class="single-slot-left">
                                                    <div class="single-slot-time">8:30 <i class="am-pm">am</i> - 9:00 <i class="am-pm">am</i></div>
                                                    <button class="remove-slot"><i class="fa fa-close"></i></button>
                                                </div>

                                                <div class="single-slot-right">
                                                    <strong>Slots:</strong>
                                                    <div class="plusminus horiz">
                                                        <button></button>
                                                        <input type="number" name="slot-qty" value="1" min="1" max="99">
                                                        <button></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Single Slot -->
                                            <div class="single-slot">
                                                <div class="single-slot-left">
                                                    <div class="single-slot-time">9:00 <i class="am-pm">am</i> - 9:30 <i class="am-pm">am</i></div>
                                                    <button class="remove-slot"><i class="fa fa-close"></i></button>
                                                </div>

                                                <div class="single-slot-right">
                                                    <strong>Slots:</strong>
                                                    <div class="plusminus horiz">
                                                        <button></button>
                                                        <input type="number" name="slot-qty" value="1" min="1" max="99">
                                                        <button></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Single Slot -->
                                            <div class="single-slot">
                                                <div class="single-slot-left">
                                                    <div class="single-slot-time">9:30 <i class="am-pm">am</i> - 10:00 <i class="am-pm">am</i></div>
                                                    <button class="remove-slot"><i class="fa fa-close"></i></button>
                                                </div>

                                                <div class="single-slot-right">
                                                    <strong>Slots:</strong>
                                                    <div class="plusminus horiz">
                                                        <button></button>
                                                        <input type="number" name="slot-qty" value="1" min="1" max="99">
                                                        <button></button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Slots Container / End -->


                                        <!-- Add Slot -->
                                        <div class="add-slot">
                                            <div class="add-slot-inputs">
                                                <input type="time" class="time-slot-start" min="00:00" max="12:00"/>
                                                <select class="time-slot-start twelve-hr" id="">
                                                    <option>am</option>
                                                    <option>pm</option>
                                                </select>
                                                <span>-</span>

                                                <input type="time" class="time-slot-end" min="00:00" max="12:00"/>
                                                <select class="time-slot-end twelve-hr" id="">
                                                    <option>am</option>
                                                    <option>pm</option>
                                                </select>
                                            </div>
                                            <div class="add-slot-btn">
                                                <button>Add</button>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Day Slots / End -->

                                    <!-- Single Day Slots -->
                                    <div class="day-slots">
                                        <div class="day-slot-headline">
                                            Tuesday
                                        </div>

                                        <!-- Slot For Cloning / Do NOT Remove-->
                                        <div class="single-slot cloned">
                                            <div class="single-slot-left">
                                                <div class="single-slot-time"></div>
                                                <button class="remove-slot"><i class="fa fa-close"></i></button>
                                            </div>

                                            <div class="single-slot-right">
                                                <strong>Slots:</strong>
                                                <div class="plusminus horiz">
                                                    <button></button>
                                                    <input type="number" name="slot-qty" value="1" min="1" max="99">
                                                    <button></button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Slot For Cloning / Do NOT Remove-->


                                        <!-- No slots -->
                                        <div class="no-slots">No slots added</div>

                                        <!-- Slots Container -->
                                        <div class="slots-container">

                                            <!-- Single Slot -->
                                            <div class="single-slot">
                                                <div class="single-slot-left">
                                                    <div class="single-slot-time">8:30 <i class="am-pm">am</i> - 9:00 <i class="am-pm">am</i></div>
                                                    <button class="remove-slot"><i class="fa fa-close"></i></button>
                                                </div>

                                                <div class="single-slot-right">
                                                    <strong>Slots:</strong>
                                                    <div class="plusminus horiz">
                                                        <button></button>
                                                        <input type="number" name="slot-qty" value="1" min="1" max="99">
                                                        <button></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Single Slot -->
                                            <div class="single-slot">
                                                <div class="single-slot-left">
                                                    <div class="single-slot-time">9:00 <i class="am-pm">am</i> - 9:30 <i class="am-pm">am</i></div>
                                                    <button class="remove-slot"><i class="fa fa-close"></i></button>
                                                </div>

                                                <div class="single-slot-right">
                                                    <strong>Slots:</strong>
                                                    <div class="plusminus horiz">
                                                        <button></button>
                                                        <input type="number" name="slot-qty" value="1" min="1" max="99">
                                                        <button></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Single Slot -->
                                            <div class="single-slot">
                                                <div class="single-slot-left">
                                                    <div class="single-slot-time">9:30 <i class="am-pm">am</i> - 10:00 <i class="am-pm">am</i></div>
                                                    <button class="remove-slot"><i class="fa fa-close"></i></button>
                                                </div>

                                                <div class="single-slot-right">
                                                    <strong>Slots:</strong>
                                                    <div class="plusminus horiz">
                                                        <button></button>
                                                        <input type="number" name="slot-qty" value="1" min="1" max="99">
                                                        <button></button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Slots Container / End -->


                                        <!-- Add Slot -->
                                        <div class="add-slot">
                                            <div class="add-slot-inputs">
                                                <input type="time" class="time-slot-start" min="00:00" max="12:00"/>
                                                <select class="time-slot-start twelve-hr" id="">
                                                    <option>am</option>
                                                    <option>pm</option>
                                                </select>
                                                <span>-</span>

                                                <input type="time" class="time-slot-end" min="00:00" max="12:00"/>
                                                <select class="time-slot-end twelve-hr" id="">
                                                    <option>am</option>
                                                    <option>pm</option>
                                                </select>
                                            </div>
                                            <div class="add-slot-btn">
                                                <button>Add</button>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Day Slots / End -->

                                    <!-- Single Day Slots -->
                                    <div class="day-slots">
                                        <div class="day-slot-headline">
                                            Wednesday
                                        </div>

                                        <!-- Slot For Cloning / Do NOT Remove-->
                                        <div class="single-slot cloned">
                                            <div class="single-slot-left">
                                                <div class="single-slot-time"></div>
                                                <button class="remove-slot"><i class="fa fa-close"></i></button>
                                            </div>

                                            <div class="single-slot-right">
                                                <strong>Slots:</strong>
                                                <div class="plusminus horiz">
                                                    <button></button>
                                                    <input type="number" name="slot-qty" value="1" min="1" max="99">
                                                    <button></button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Slot For Cloning / Do NOT Remove-->


                                        <!-- No slots -->
                                        <div class="no-slots">No slots added</div>

                                        <!-- Slots Container -->
                                        <div class="slots-container">

                                            <!-- Single Slot -->
                                            <div class="single-slot">
                                                <div class="single-slot-left">
                                                    <div class="single-slot-time">8:30 <i class="am-pm">am</i> - 9:00 <i class="am-pm">am</i></div>
                                                    <button class="remove-slot"><i class="fa fa-close"></i></button>
                                                </div>

                                                <div class="single-slot-right">
                                                    <strong>Slots:</strong>
                                                    <div class="plusminus horiz">
                                                        <button></button>
                                                        <input type="number" name="slot-qty" value="1" min="1" max="99">
                                                        <button></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Single Slot -->
                                            <div class="single-slot">
                                                <div class="single-slot-left">
                                                    <div class="single-slot-time">9:00 <i class="am-pm">am</i> - 9:30 <i class="am-pm">am</i></div>
                                                    <button class="remove-slot"><i class="fa fa-close"></i></button>
                                                </div>

                                                <div class="single-slot-right">
                                                    <strong>Slots:</strong>
                                                    <div class="plusminus horiz">
                                                        <button></button>
                                                        <input type="number" name="slot-qty" value="1" min="1" max="99">
                                                        <button></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Single Slot -->
                                            <div class="single-slot">
                                                <div class="single-slot-left">
                                                    <div class="single-slot-time">9:30 <i class="am-pm">am</i> - 10:00 <i class="am-pm">am</i></div>
                                                    <button class="remove-slot"><i class="fa fa-close"></i></button>
                                                </div>

                                                <div class="single-slot-right">
                                                    <strong>Slots:</strong>
                                                    <div class="plusminus horiz">
                                                        <button></button>
                                                        <input type="number" name="slot-qty" value="1" min="1" max="99">
                                                        <button></button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Slots Container / End -->


                                        <!-- Add Slot -->
                                        <div class="add-slot">
                                            <div class="add-slot-inputs">
                                                <input type="time" class="time-slot-start" min="00:00" max="12:00"/>
                                                <select class="time-slot-start twelve-hr" id="">
                                                    <option>am</option>
                                                    <option>pm</option>
                                                </select>
                                                <span>-</span>

                                                <input type="time" class="time-slot-end" min="00:00" max="12:00"/>
                                                <select class="time-slot-end twelve-hr" id="">
                                                    <option>am</option>
                                                    <option>pm</option>
                                                </select>
                                            </div>
                                            <div class="add-slot-btn">
                                                <button>Add</button>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Day Slots / End -->

                                    <!-- Single Day Slots -->
                                    <div class="day-slots">
                                        <div class="day-slot-headline">
                                            Thursday
                                        </div>

                                        <!-- Slot For Cloning / Do NOT Remove-->
                                        <div class="single-slot cloned">
                                            <div class="single-slot-left">
                                                <div class="single-slot-time"></div>
                                                <button class="remove-slot"><i class="fa fa-close"></i></button>
                                            </div>

                                            <div class="single-slot-right">
                                                <strong>Slots:</strong>
                                                <div class="plusminus horiz">
                                                    <button></button>
                                                    <input type="number" name="slot-qty" value="1" min="1" max="99">
                                                    <button></button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Slot For Cloning / Do NOT Remove-->


                                        <!-- No slots -->
                                        <div class="no-slots">No slots added</div>

                                        <!-- Slots Container -->
                                        <div class="slots-container">

                                            <!-- Single Slot -->
                                            <div class="single-slot">
                                                <div class="single-slot-left">
                                                    <div class="single-slot-time">8:30 <i class="am-pm">am</i> - 9:00 <i class="am-pm">am</i></div>
                                                    <button class="remove-slot"><i class="fa fa-close"></i></button>
                                                </div>

                                                <div class="single-slot-right">
                                                    <strong>Slots:</strong>
                                                    <div class="plusminus horiz">
                                                        <button></button>
                                                        <input type="number" name="slot-qty" value="1" min="1" max="99">
                                                        <button></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Single Slot -->
                                            <div class="single-slot">
                                                <div class="single-slot-left">
                                                    <div class="single-slot-time">9:00 <i class="am-pm">am</i> - 9:30 <i class="am-pm">am</i></div>
                                                    <button class="remove-slot"><i class="fa fa-close"></i></button>
                                                </div>

                                                <div class="single-slot-right">
                                                    <strong>Slots:</strong>
                                                    <div class="plusminus horiz">
                                                        <button></button>
                                                        <input type="number" name="slot-qty" value="1" min="1" max="99">
                                                        <button></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Single Slot -->
                                            <div class="single-slot">
                                                <div class="single-slot-left">
                                                    <div class="single-slot-time">9:30 <i class="am-pm">am</i> - 10:00 <i class="am-pm">am</i></div>
                                                    <button class="remove-slot"><i class="fa fa-close"></i></button>
                                                </div>

                                                <div class="single-slot-right">
                                                    <strong>Slots:</strong>
                                                    <div class="plusminus horiz">
                                                        <button></button>
                                                        <input type="number" name="slot-qty" value="1" min="1" max="99">
                                                        <button></button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Slots Container / End -->


                                        <!-- Add Slot -->
                                        <div class="add-slot">
                                            <div class="add-slot-inputs">
                                                <input type="time" class="time-slot-start" min="00:00" max="12:00"/>
                                                <select class="time-slot-start twelve-hr" id="">
                                                    <option>am</option>
                                                    <option>pm</option>
                                                </select>
                                                <span>-</span>

                                                <input type="time" class="time-slot-end" min="00:00" max="12:00"/>
                                                <select class="time-slot-end twelve-hr" id="">
                                                    <option>am</option>
                                                    <option>pm</option>
                                                </select>
                                            </div>
                                            <div class="add-slot-btn">
                                                <button>Add</button>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Day Slots / End -->

                                    <!-- Single Day Slots -->
                                    <div class="day-slots">
                                        <div class="day-slot-headline">
                                            Friday
                                        </div>

                                        <!-- Slot For Cloning / Do NOT Remove-->
                                        <div class="single-slot cloned">
                                            <div class="single-slot-left">
                                                <div class="single-slot-time"></div>
                                                <button class="remove-slot"><i class="fa fa-close"></i></button>
                                            </div>

                                            <div class="single-slot-right">
                                                <strong>Slots:</strong>
                                                <div class="plusminus horiz">
                                                    <button></button>
                                                    <input type="number" name="slot-qty" value="1" min="1" max="99">
                                                    <button></button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Slot For Cloning / Do NOT Remove-->


                                        <!-- No slots -->
                                        <div class="no-slots">No slots added</div>

                                        <!-- Slots Container -->
                                        <div class="slots-container">

                                            <!-- Single Slot -->
                                            <div class="single-slot">
                                                <div class="single-slot-left">
                                                    <div class="single-slot-time">8:30 <i class="am-pm">am</i> - 9:00 <i class="am-pm">am</i></div>
                                                    <button class="remove-slot"><i class="fa fa-close"></i></button>
                                                </div>

                                                <div class="single-slot-right">
                                                    <strong>Slots:</strong>
                                                    <div class="plusminus horiz">
                                                        <button></button>
                                                        <input type="number" name="slot-qty" value="1" min="1" max="99">
                                                        <button></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Single Slot -->
                                            <div class="single-slot">
                                                <div class="single-slot-left">
                                                    <div class="single-slot-time">9:00 <i class="am-pm">am</i> - 9:30 <i class="am-pm">am</i></div>
                                                    <button class="remove-slot"><i class="fa fa-close"></i></button>
                                                </div>

                                                <div class="single-slot-right">
                                                    <strong>Slots:</strong>
                                                    <div class="plusminus horiz">
                                                        <button></button>
                                                        <input type="number" name="slot-qty" value="1" min="1" max="99">
                                                        <button></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Single Slot -->
                                            <div class="single-slot">
                                                <div class="single-slot-left">
                                                    <div class="single-slot-time">9:30 <i class="am-pm">am</i> - 10:00 <i class="am-pm">am</i></div>
                                                    <button class="remove-slot"><i class="fa fa-close"></i></button>
                                                </div>

                                                <div class="single-slot-right">
                                                    <strong>Slots:</strong>
                                                    <div class="plusminus horiz">
                                                        <button></button>
                                                        <input type="number" name="slot-qty" value="1" min="1" max="99">
                                                        <button></button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Slots Container / End -->


                                        <!-- Add Slot -->
                                        <div class="add-slot">
                                            <div class="add-slot-inputs">
                                                <input type="time" class="time-slot-start" min="00:00" max="12:00"/>
                                                <select class="time-slot-start twelve-hr" id="">
                                                    <option>am</option>
                                                    <option>pm</option>
                                                </select>
                                                <span>-</span>

                                                <input type="time" class="time-slot-end" min="00:00" max="12:00"/>
                                                <select class="time-slot-end twelve-hr" id="">
                                                    <option>am</option>
                                                    <option>pm</option>
                                                </select>
                                            </div>
                                            <div class="add-slot-btn">
                                                <button>Add</button>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Day Slots / End -->

                                    <!-- Single Day Slots -->
                                    <div class="day-slots">
                                        <div class="day-slot-headline">
                                            Saturday
                                        </div>

                                        <!-- Slot For Cloning / Do NOT Remove-->
                                        <div class="single-slot cloned">
                                            <div class="single-slot-left">
                                                <div class="single-slot-time"></div>
                                                <button class="remove-slot"><i class="fa fa-close"></i></button>
                                            </div>

                                            <div class="single-slot-right">
                                                <strong>Slots:</strong>
                                                <div class="plusminus horiz">
                                                    <button></button>
                                                    <input type="number" name="slot-qty" value="1" min="1" max="99">
                                                    <button></button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Slot For Cloning / Do NOT Remove-->


                                        <!-- No slots -->
                                        <div class="no-slots">No slots added</div>

                                        <!-- Slots Container -->
                                        <div class="slots-container">

                                        </div>
                                        <!-- Slots Container / End -->


                                        <!-- Add Slot -->
                                        <div class="add-slot">
                                            <div class="add-slot-inputs">
                                                <input type="time" class="time-slot-start" min="00:00" max="12:00"/>
                                                <select class="time-slot-start twelve-hr" id="">
                                                    <option>am</option>
                                                    <option>pm</option>
                                                </select>
                                                <span>-</span>

                                                <input type="time" class="time-slot-end" min="00:00" max="12:00"/>
                                                <select class="time-slot-end twelve-hr" id="">
                                                    <option>am</option>
                                                    <option>pm</option>
                                                </select>
                                            </div>
                                            <div class="add-slot-btn">
                                                <button>Add</button>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Day Slots / End -->

                                    <!-- Single Day Slots -->
                                    <div class="day-slots">
                                        <div class="day-slot-headline">
                                            Sunday
                                        </div>

                                        <!-- Slot For Cloning / Do NOT Remove-->
                                        <div class="single-slot cloned">
                                            <div class="single-slot-left">
                                                <div class="single-slot-time"></div>
                                                <button class="remove-slot"><i class="fa fa-close"></i></button>
                                            </div>

                                            <div class="single-slot-right">
                                                <strong>Slots:</strong>
                                                <div class="plusminus horiz">
                                                    <button></button>
                                                    <input type="number" name="slot-qty" value="1" min="1" max="99">
                                                    <button></button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Slot For Cloning / Do NOT Remove-->


                                        <!-- No slots -->
                                        <div class="no-slots">No slots added</div>

                                        <!-- Slots Container -->
                                        <div class="slots-container">

                                        </div>
                                        <!-- Slots Container / End -->


                                        <!-- Add Slot -->
                                        <div class="add-slot">
                                            <div class="add-slot-inputs">
                                                <input type="time" class="time-slot-start" min="00:00" max="12:00"/>
                                                <select class="time-slot-start twelve-hr" id="">
                                                    <option>am</option>
                                                    <option>pm</option>
                                                </select>
                                                <span>-</span>

                                                <input type="time" class="time-slot-end" min="00:00" max="12:00"/>
                                                <select class="time-slot-end twelve-hr" id="">
                                                    <option>am</option>
                                                    <option>pm</option>
                                                </select>
                                            </div>
                                            <div class="add-slot-btn">
                                                <button>Add</button>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Day Slots / End -->

                                </div>
                                <!-- Availablity Slots / End -->

                        </div>
                        <!-- Switcher ON-OFF Content / End -->

                    </div> --}}
                    <!-- Section / End -->


                    <!-- Section -->
                    {{-- <div class="add-listing-section margin-top-45">

                        <!-- Headline -->
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-clock"></i> Opening Hours</h3>
                            <!-- Switcher -->
                            <label class="switch"><input type="checkbox" checked><span class="slider round"></span></label>
                        </div>

                        <!-- Switcher ON-OFF Content -->
                        <div class="switcher-content">

                            <!-- Day -->
                            <div class="row opening-day">
                                <div class="col-md-2"><h5>Monday</h5></div>
                                <div class="col-md-5">
                                    <select class="chosen-select" data-placeholder="Opening Time">
                                        <option label="Opening Time"></option>
                                        <option>Closed</option>
                                        <option>1 AM</option>
                                        <option>2 AM</option>
                                        <option>3 AM</option>
                                        <option>4 AM</option>
                                        <option>5 AM</option>
                                        <option>6 AM</option>
                                        <option>7 AM</option>
                                        <option>8 AM</option>
                                        <option>9 AM</option>
                                        <option>10 AM</option>
                                        <option>11 AM</option>
                                        <option>12 AM</option>
                                        <option>1 PM</option>
                                        <option>2 PM</option>
                                        <option>3 PM</option>
                                        <option>4 PM</option>
                                        <option>5 PM</option>
                                        <option>6 PM</option>
                                        <option>7 PM</option>
                                        <option>8 PM</option>
                                        <option>9 PM</option>
                                        <option>10 PM</option>
                                        <option>11 PM</option>
                                        <option>12 PM</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <select class="chosen-select" data-placeholder="Closing Time">
                                        <option label="Closing Time"></option>
                                        <option>Closed</option>
                                        <option>1 AM</option>
                                        <option>2 AM</option>
                                        <option>3 AM</option>
                                        <option>4 AM</option>
                                        <option>5 AM</option>
                                        <option>6 AM</option>
                                        <option>7 AM</option>
                                        <option>8 AM</option>
                                        <option>9 AM</option>
                                        <option>10 AM</option>
                                        <option>11 AM</option>
                                        <option>12 AM</option>
                                        <option>1 PM</option>
                                        <option>2 PM</option>
                                        <option>3 PM</option>
                                        <option>4 PM</option>
                                        <option>5 PM</option>
                                        <option>6 PM</option>
                                        <option>7 PM</option>
                                        <option>8 PM</option>
                                        <option>9 PM</option>
                                        <option>10 PM</option>
                                        <option>11 PM</option>
                                        <option>12 PM</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Day / End -->

                            <!-- Day -->
                            <div class="row opening-day js-demo-hours">
                                <div class="col-md-2"><h5>Tuesday</h5></div>
                                <div class="col-md-5">
                                    <select class="chosen-select" data-placeholder="Opening Time">
                                        <!-- Hours added via JS (this is only for demo purpose) -->
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <select class="chosen-select" data-placeholder="Closing Time">
                                        <!-- Hours added via JS (this is only for demo purpose) -->
                                    </select>
                                </div>
                            </div>
                            <!-- Day / End -->

                            <!-- Day -->
                            <div class="row opening-day js-demo-hours">
                                <div class="col-md-2"><h5>Wednesday</h5></div>
                                <div class="col-md-5">
                                    <select class="chosen-select" data-placeholder="Opening Time">
                                        <!-- Hours added via JS (this is only for demo purpose) -->
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <select class="chosen-select" data-placeholder="Closing Time">
                                        <!-- Hours added via JS (this is only for demo purpose) -->
                                    </select>
                                </div>
                            </div>
                            <!-- Day / End -->

                            <!-- Day -->
                            <div class="row opening-day js-demo-hours">
                                <div class="col-md-2"><h5>Thursday</h5></div>
                                <div class="col-md-5">
                                    <select class="chosen-select" data-placeholder="Opening Time">
                                        <!-- Hours added via JS (this is only for demo purpose) -->
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <select class="chosen-select" data-placeholder="Closing Time">
                                        <!-- Hours added via JS (this is only for demo purpose) -->
                                    </select>
                                </div>
                            </div>
                            <!-- Day / End -->

                            <!-- Day -->
                            <div class="row opening-day js-demo-hours">
                                <div class="col-md-2"><h5>Friday</h5></div>
                                <div class="col-md-5">
                                    <select class="chosen-select" data-placeholder="Opening Time">
                                        <!-- Hours added via JS (this is only for demo purpose) -->
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <select class="chosen-select" data-placeholder="Closing Time">
                                        <!-- Hours added via JS (this is only for demo purpose) -->
                                    </select>
                                </div>
                            </div>
                            <!-- Day / End -->

                            <!-- Day -->
                            <div class="row opening-day js-demo-hours">
                                <div class="col-md-2"><h5>Saturday</h5></div>
                                <div class="col-md-5">
                                    <select class="chosen-select" data-placeholder="Opening Time">
                                        <!-- Hours added via JS (this is only for demo purpose) -->
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <select class="chosen-select" data-placeholder="Closing Time">
                                        <!-- Hours added via JS (this is only for demo purpose) -->
                                    </select>
                                </div>
                            </div>
                            <!-- Day / End -->

                            <!-- Day -->
                            <div class="row opening-day js-demo-hours">
                                <div class="col-md-2"><h5>Sunday</h5></div>
                                <div class="col-md-5">
                                    <select class="chosen-select" data-placeholder="Opening Time">
                                        <!-- Hours added via JS (this is only for demo purpose) -->
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <select class="chosen-select" data-placeholder="Closing Time">
                                        <!-- Hours added via JS (this is only for demo purpose) -->
                                    </select>
                                </div>
                            </div>
                            <!-- Day / End -->

                        </div>
                        <!-- Switcher ON-OFF Content / End -->

                    </div> --}}
                    <!-- Section / End -->


                    <!-- Section -->
                    @include('dashboard.add_listing.pricing')


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
