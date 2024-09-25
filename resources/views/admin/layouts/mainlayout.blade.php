<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dashboar Admin</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon.png">
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
            <div class="mb-3">
            <img src="/foto/kasirrpl12.png" style="margin-left: -23px;  margin-top: -60px;" height="200" width="260" alt="foto">
            </div>
        </div>
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
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="/foto/logo.jpeg" height="50" width="50" alt="foto">
                            </div>
                            <div class="drop-down dropdown-profile   dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="profile"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        <hr class="my-2">
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
                    <li class="nav-label">Dashboard Admin</li>
                    <li>
                        <a href="/d_admin" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/user" aria-expanded="false">
                            <i class="icon-grid menu-icon"></i><span class="nav-text">User</span>
                        </a>
                    </li>
                    <li class="nav-label">UI Components</li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Laporan</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/laporantransaksi">History Transaksi</a></li>
                            <li><a href="/laporanproduk">History Produk</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="/payment" aria-expanded="false">
                            <i class="icon-envelope menu-icon"></i><span class="nav-text">Payment</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.logout') }}" aria-expanded="false" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="icon-key"></i><span class="nav-text">Logout</span>
                        </a>
                    </li>
                    
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
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
                <p class="text-center">Copyright &copy; Designed & Developed By <a href="#">Kasir</a> 2018</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
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
 
