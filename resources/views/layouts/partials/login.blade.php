<div class="tab-content" id="tab1" style="display: none;">
    <form method="post" action="{{route("user.login")}}" class="login">
        @csrf
        <p class="form-row form-row-wide">
            <label for="email">Email:
                <i class="im im-icon-Male"></i>
                <input required type="text" class="input-text" name="email" id="email" value="" />
            </label>
        </p>

        <p class="form-row form-row-wide">
            <label for="password">Password:
                <i class="im im-icon-Lock-2"></i>
                <input required class="input-text" type="password" name="password" id="password"/>
            </label>
            <span class="lost_password">
                <a href="#" >Lost Your Password?</a>
            </span>
        </p>

        <div class="form-row">
            <input  type="submit" class="button border margin-top-5" name="login" value="Login" />
            <div class="checkboxes margin-top-10">
                <input  id="remember-me" type="checkbox" name="remember">
                <label for="remember-me">Remember Me</label>
            </div>
        </div>

    </form>
</div>
