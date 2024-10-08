<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Register Page</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/kasir5.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="/assets/css/style.css" rel="stylesheet">
</head>

<body class="h-100" style="background-image: url('aasd.jpeg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    @if (Session::has('status'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->




    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="#">
                                    <center>
                                        <img src="foto//eweh.png" alt="Foto"  width="200" height="70" style="margin: 15px;" >
                                    </center>
                                </a>

                                <form class="mt-5 mb-5 login-input" method="POST"
                                action="{{ route('admin.register') }}" method="POST">
    @csrf
    <div class="form-group">
    <input type="text" class="form-control" name="name" placeholder="Name">
</div>
<div class="form-group">
    <input type="email" class="form-control" name="email" placeholder="Email">
</div>
<div class="form-group">
    <input type="password" class="form-control" name="password" placeholder="Password">
</div>
<div class="form-group">
    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
</div>
    <button type="submit" class="btn login-form__btn submit w-100">Sign In</button>
    </form>
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                                <center><p>Sudah Punya Akun? <a href="/authadmin">Click Sign In</a></p></center>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!--**********************************
        Scripts
    ***********************************-->
    <script src="/assets/plugins/common/common.min.js"></script>
    <script src="/assets/js/custom.min.js"></script>
    <script src="/assets/js/settings.js"></script>
    <script src="/assets/js/gleek.js"></script>
    <script src="/assets/js/styleSwitcher.js"></script>



    @if (session('error'))
        <script>
            var SwetAlert2Demo = function() {
                var initDemos = function() {
                    swall({
                        title: "{{ session('error') }}",
                        text: "{{ session('error') }}",
                        icon: "error",
                        buttons: {
                            confirm: {
                                text: "Confirm Me",
                                value: true,
                                visible: true,
                                className: "btn btn-success",
                                closeModal: true
                            }
                        }
                    });
                };
                return {
                    init: function() {
                        initDemos();
                    }
                }
            }();

            jQuery(document).ready(function() {
                SweetAlert2Demo.init();
            });
        </script>
    @endif

</body>

</html>
