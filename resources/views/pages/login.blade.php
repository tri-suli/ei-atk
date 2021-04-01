<!DOCTYPE html>
<html lang="en">
    <head>
      @include('components.themes.head', ['page_name' => 'Login'])
    </head>
    <body class="login">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>
            <div class="login_wrapper">
                <div class="animate form login_form">
                    <x-form.login-form />
                </div>
                {{-- <div id="register" class="animate form registration_form">
                    <section class="login_content">
                        <form>
                            <h1>Create Account</h1>
                            <div>
                            <input type="text" class="form-control" placeholder="Username" required="" />
                            </div>
                            <div>
                            <input type="email" class="form-control" placeholder="Email" required="" />
                            </div>
                            <div>
                            <input type="password" class="form-control" placeholder="Password" required="" />
                            </div>
                            <div>
                            <a class="btn btn-default submit" href="index.html">Submit</a>
                            </div>

                            <div class="clearfix"></div>

                            <div class="separator">
                            <p class="change_link">Already a member ?
                                <a href="#signin" class="to_register"> Log in </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i> {{ config('app.name') }}</h1>
                                <p>©{{ date('Y') }} All Rights Reserved.</p>
                            </div>
                            </div>
                        </form>
                    </section>
                </div> --}}
            </div>
        </div>
    </body>
</html>
