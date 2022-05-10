<!DOCTYPE html>
<head>

<!-- Basic Page Needs
================================================== -->
<title>Listeo</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/main-color.css" id="colors">
<link rel="stylesheet" href="../cute-alert/cute-alert.css">


</head>

<body>
<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
@include('layouts.partials.header')
<div class="clearfix"></div>
<!-- Header Container / End -->





<!-- Content
================================================== -->
@yield('content')


<!-- Footer
================================================== -->
@include('layouts.partials.footer')

<!-- Footer / End -->


<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>


</div>
<!-- Wrapper / End -->



<!-- Scripts
================================================== -->
<script type="text/javascript" src="../scripts/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../scripts/jquery-migrate-3.3.2.min.js"></script>
<script type="text/javascript" src="../scripts/mmenu.min.js"></script>
<script type="text/javascript" src="../scripts/chosen.min.js"></script>
<script type="text/javascript" src="../scripts/slick.min.js"></script>
<script type="text/javascript" src="../scripts/rangeslider.min.js"></script>
<script type="text/javascript" src="../scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="../scripts/waypoints.min.js"></script>
<script type="text/javascript" src="../scripts/counterup.min.js"></script>
<script type="text/javascript" src="../scripts/jquery-ui.min.js"></script>
<script type="text/javascript" src="../scripts/tooltips.min.js"></script>
<script type="text/javascript" src="../scripts/custom.js"></script>


<!-- Leaflet // Docs: https://leafletjs.com/ -->
<script src="../scripts/leaflet.min.js"></script>

<!-- Leaflet Maps Scripts -->
<script src="../scripts/leaflet-markercluster.min.js"></script>
<script src="../scripts/leaflet-gesture-handling.min.js"></script>
<script src="../scripts/leaflet-listeo.js"></script>

<!-- Leaflet Geocoder + Search Autocomplete // Docs: https://github.com/perliedman/leaflet-control-geocoder -->
<script src="../scripts/leaflet-autocomplete.js"></script>
<script src="../scripts/leaflet-control-geocoder.js"></script>
<script src="../scripts/vue.js"></script>
<script src="../scripts/axios.min.js"></script>


<!-- Style Switcher
================================================== -->
<script src="../scripts/switcher.js"></script>

<div id="style-switcher">
	<h2>Color Switcher <a href="#"><i class="sl sl-icon-settings"></i></a></h2>

	<div>
		<ul class="colors" id="color1">
			<li><a href="#" class="main" title="Main"></a></li>
			<li><a href="#" class="blue" title="Blue"></a></li>
			<li><a href="#" class="green" title="Green"></a></li>
			<li><a href="#" class="orange" title="Orange"></a></li>
			<li><a href="#" class="navy" title="Navy"></a></li>
			<li><a href="#" class="yellow" title="Yellow"></a></li>
			<li><a href="#" class="peach" title="Peach"></a></li>
			<li><a href="#" class="beige" title="Beige"></a></li>
			<li><a href="#" class="purple" title="Purple"></a></li>
			<li><a href="#" class="celadon" title="Celadon"></a></li>
			<li><a href="#" class="red" title="Red"></a></li>
			<li><a href="#" class="brown" title="Brown"></a></li>
			<li><a href="#" class="cherry" title="Cherry"></a></li>
			<li><a href="#" class="cyan" title="Cyan"></a></li>
			<li><a href="#" class="gray" title="Gray"></a></li>
			<li><a href="#" class="olive" title="Olive"></a></li>
		</ul>
	</div>

</div>
<!-- Style Switcher / End -->

{{-- <script>
    var workplaces = $(".workplaces");
    $.get( "{{route('jq.workplaces')}}", function( data ) {
        console.log(data.workplaces);
    });
</script> --}}

<script>
    const app = new Vue({
    el: '#workplaces',
    name: 'default',
    data() {
        return {
            workplace_list:[],
            checkedProperties:[],
            search:"",
            selectedProduct:"",
        }
    },
    methods: {
        getValidation(item)
        {
            if (item == "") {
                return "all";
            }
            else if (item == []) {
                return ["all"];
            }
            else
            {
                return item;
            }

        },
        getWorkplaces()
        {

            var address = "{{route("jq.workplaces")}}";
            console.log(address);
            axios.get(address,{
                params:{
                    "search" : this.getValidation(this.search),
                    "product" : this.getValidation(this.selectedProduct),
                    "properties" : this.getValidation(this.checkedProperties),
                }
            }).then(response => (this.workplace_list = response.data.workplaces));
        },
    },
    created() {
        this.getWorkplaces();
    },
    computed: {
    },

});
</script>

<script src="../cute-alert/cute-alert.js"></script>
@include('alert')
@yield('footer')
</body>
</html>
