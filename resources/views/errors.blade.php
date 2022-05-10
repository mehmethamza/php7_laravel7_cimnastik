@if($errors->any())
    <ul style="color: black">
        @foreach ($errors->all() as $error)
            <li style="color: black">{{$error}}</li>
        @endforeach
    </ul>
@endif
