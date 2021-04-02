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
                    @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>Oops!</strong> {{ session('error') }}.
                        </div>
                    @endif
                    <x-form.login-form />
                </div>
            </div>
        </div>
        <script src="{{ asset('template/vendors/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('template/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    </body>
</html>
