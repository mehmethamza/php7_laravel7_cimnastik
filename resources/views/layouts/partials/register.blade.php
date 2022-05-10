<div class="tab-content" id="tab2" style="display: none;">
    <div>
        @include('errors')
    </div>
    <form action="{{route("user.store")}}" method="post"  class="register">
        @csrf

    <p class="form-row form-row-wide">
        <label for="username2">Username:
            <i class="im im-icon-Male"></i>
            <input required type="text" class="input-text" name="name" id="name" value="" />
        </label>
    </p>
    <p class="form-row form-row-wide">
        <label for="username2">Phone:
            <i class="im im-icon-Cloud-Smartphone"></i>
            <input required  class="input-text" name="phone" id="phone" type="tel" placeholder="(XXX) XXX XXXX" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" value="" />
        </label>
    </p>
    <p class="form-row form-row-wide">
        <label for="email2">Email Address:
            <i class="im im-icon-Mail"></i>
            <input required type="text" class="input-text" name="email" id="email" value="" />
        </label>
    </p>

    <p class="form-row form-row-wide">
        <label for="password1">Password:
            <i class="im im-icon-Lock-2"></i>
            <input required class="input-text" type="password" name="password" id="password"/>
        </label>
    </p>



    <input  type="submit" class="button border fw margin-top-10" name="register" value="Register" />

    </form>
</div>
