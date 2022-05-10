@if (session('alert'))

{{-- session('alert') --}}
<script>
    switch ("{{session("alert_type")}}") {
        case "success":
            var image = "img/success.svg";
            var ttitle = "Başarılı";
            break;
        case "error":
        var image = "img/error.svg";
        var ttitle = "Başarısız";
            break;
        default:
            break;
    }
    cuteAlert({
        type:"{{session("alert_type")}}",
        title:ttitle,
        message:"{{session("alert")}}",
        buttonText:"kapat",
    });

</script>

@endif
