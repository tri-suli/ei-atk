<section class="login_content">
    <form method="POST" action="{{ url('login') }}">
        @csrf
        <h1>Login Form</h1>
        <div>
            <input type="text" class="form-control" placeholder="Username/Email" />
        </div>
        <div>
            <input type="password" class="form-control" placeholder="Password" />
        </div>
        <div>
            <button type="submit" class="btn btn-default submit">Log in</button>
            {{-- <a class="reset_pass" href="#">Lost your password?</a> --}}
        </div>
        <div class="clearfix"></div>
        <div class="separator">
            {{-- <p class="change_link">New to site?
                <a href="#signup" class="to_register"> Create Account </a>
            </p> --}}
            <div class="clearfix"></div>
            <br />
            <div>
                <h1><i class="fa fa-paw"></i> {{ config('app.name') }}</h1>
                <p>©{{ date('Y') }} All Rights Reserved.</p>
            </div>
        </div>
    </form>
</section>