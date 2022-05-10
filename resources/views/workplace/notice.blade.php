<script src="../cute-alert/cute-alert.js"></script>
@if ($workplace->status == "payed" && $workplace->notice != "")
<script>

    var image = "img/info.svg";

    cuteAlert({
        type:"info",
        title:"Bilgilendirme",
        message:"{{$workplace->notice}}",
        buttonText:"kapat",
    });

</script>
@endif
