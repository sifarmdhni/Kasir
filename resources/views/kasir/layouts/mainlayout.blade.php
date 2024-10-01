<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Kasir</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/kasir5.png">
    <!-- Custom Stylesheet -->
    <link href="/assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
   

</head>

<body>
    

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->


        <div class="nav-header">
            <div class="brand-logo">
                <a href="indexkasir">
                    <b class="logo-abbr"><img src="/assets/images/0.png" alt=""> </b>
                    <span class="logo-compact"><img src="/assets/images/0.png" alt=""></span>
                    <span class="brand-title">
                        <img src="/assets/images/kasirrpl12.png" style="margin-left: -40px;  margin-top: -80px;" height="200" width="260" alt="foto">
                    </span>
                </a>
            </div>
        </div>


        {{-- <div class="nav-header">
            <div class="brand-logo">
                <a href="/indexkasir">
                     <b style="margin-left: -40px;  margin-top: 80px;" height="50" width="50"><img src="images/kasir5.png" alt=""> </b>
                    <span class="logo-compact"><img src="images/logo-compact.png" alt=""></span>
                    <div class="mb-3">
                    <img src="/foto/kasirrpl12.png" style="margin-left: -40px;  margin-top: -80px;" height="200" width="260" alt="foto">
                    </div>

                </a>
            </div>
        </div> --}}

        <!-- <div class="nav-header">
            <div class="mb-3">
            <img src="/foto/kasirrpl12.png" style="margin-left: -23px;  margin-top: -60px;" height="200" width="260" alt="foto">
            </div>
        </div> -->
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header  justify-top">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    
                </div>
                <div class="header-right">
                <ul class="clearfix">
                    <li class="icons dropdown">
                        <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                            <span class="activity active"></span>
                            @if(Auth::guard('kasir')->check())
                                <img src="{{ asset('storage/kasir_photos/'.Auth::guard('kasir')->user()->foto) }}" height="40" width="40" alt="Photo Kasir">
                            @else
                                <img src="{{ asset('assets/images/user/default.png') }}" height="40" width="40" alt="Default Photo">
                            @endif
                        </div>
                        <div class="drop-down dropdown-profile dropdown-menu">
                            <div class="dropdown-content-body">
                                <ul>
                                    <li>
                                        <a href="{{ route('kasir.profile') }}"><i class="icon-user"></i> <span>Profile</span></a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard Kasir</li>
                    <li>
                        <a href="/indexkasir" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    
                
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-grid menu-icon"></i><span class="nav-text">Data Master</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/kategoriproduk">Data Kategori Produk</a></li>
                            <li><a href="/produk">Data Produk</a></li>
                        </ul>
                    </li>
                  
                   
                    <li>
                        <a href="/customerkasir" aria-expanded="false">
                            <i class="fa fa-users menu-icon"></i><span class="nav-text">Data Customer</span>
                        </a>
                    </li>

                    <li>
                        <a href="/transaksi" aria-expanded="false">
                            <i class="icon-graph  menu-icon"></i><span class="nav-text">Transaksi</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('kasir.logout') }}" aria-expanded="false" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="icon-key menu-icon"></i><span class="nav-text">Logout</span>
                        </a>
                    </li>
                    
                    <form id="logout-form" action="{{ route('kasir.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        @yield('content')
        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="#">Kasir</a> 2024</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="/assets/plugins/common/common.min.js"></script>
    <script src="/assets/js/custom.min.js"></script>
    <script src="/assets/js/settings.js"></script>
    <script src="/assets/js/gleek.js"></script>
    <script src="/assets/js/styleSwitcher.js"></script>

    <script src="/assets/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
    
    <script src="/aasets/js/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script src="/aasets/js/sweetalert/sweetalert.min.js"></script>

    @if (session('success'))
    <script>
        var SweetAlert2Demo= funtion(){
            var initDemos= funtion(){
                swal({
                    title:"{{session('success')}}",
                    text:"{{session('success')}}",
                    icon:"success",
                    buttons:{
                        confirm:{
                            text:"Confirm Me",
                            value:true,
                            visible:true,
                            className:"btn btn-success",
                            closeModal:true
                        }
                    }
                });
            };
            return{
                init:function(){
                    initDemos();
                },
            };
        }();

        jQuery(document).ready(function(){
            SweetAlert2Demo.init();
        });
    </script>
    @endif

    @if (session('error'))
    <script>
        var SwetAlert2Demo = function(){
            var initDemos = function(){
                swall({
                    title:"{{session('error')}}",
                    text:"{{session('error')}}",
                    icon:"error",
                    buttons:{
                        confirm:{
                            text:"Confirm Me",
                            value:true,
                            visible:true,
                            className:"btn btn-success",
                            closeModal:true
                        }
                    }
                });
            };
            return {
                init: function(){
                    initDemos();
                }
            }
        }();

        jQuery (document).ready(function(){
            SweetAlert2Demo.init();
        });
    </script>
    @endif

</body>

</html>
 
