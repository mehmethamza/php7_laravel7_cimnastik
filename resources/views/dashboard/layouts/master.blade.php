<!DOCTYPE html>
<head>

<!-- Basic Page Needs
================================================== -->
<title>Listeo</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/css/main-color.css" id="colors">
<link rel="stylesheet" href="/cute-alert/cute-alert.css">





</head>

<body>

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
@include('dashboard.layouts.partials.header')
<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Dashboard -->
<div id="dashboard">

	<!-- Navigation
	================================================== -->

    @include('dashboard.layouts.partials.dashboard_nav')



	<!-- Content
	================================================== -->


        @yield('content')



	<!-- Content / End -->


</div>
<!-- Dashboard / End -->


</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
<script type="text/javascript" src="/scripts/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="/scripts/jquery-migrate-3.3.2.min.js"></script>
<script type="text/javascript" src="/scripts/mmenu.min.js"></script>
<script type="text/javascript" src="/scripts/chosen.min.js"></script>
<script type="text/javascript" src="/scripts/slick.min.js"></script>
<script type="text/javascript" src="/scripts/rangeslider.min.js"></script>
<script type="text/javascript" src="/scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="/scripts/waypoints.min.js"></script>
<script type="text/javascript" src="/scripts/counterup.min.js"></script>
<script type="text/javascript" src="/scripts/jquery-ui.min.js"></script>
<script type="text/javascript" src="/scripts/tooltips.min.js"></script>
<script type="text/javascript" src="/scripts/custom.js"></script>






<script>

    var province = $(".province");
    var districts = $(".district");

    function changeDistricts(data) {
        var districts_data = data.districts;
        districts.empty();
        districts_data.forEach(x => {
            // console.log(x.name);
            districts.append(`<option value="`+x.name+`">`+x.name+`</option>`);
        });
    }
    province.change(function(){
        var data_id = province.find(':selected').attr('data-id');
        $.get( "{{route("dashboard.sendDistricts")}}"+"/"+data_id, function(data) {
            changeDistricts(data);
        });
    });
</script>
<script src="/cute-alert/cute-alert.js"></script>

@include('alert')
@yield('footer')
</body>
</html>
