<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin</title>
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
   
    <div id="main-wrapper">
    <div class="nav-header">
            <div class="brand-logo">
                <a href="/d_admin">
                    <!-- <b class="logo-abbr"><img src="images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="images/logo-compact.png" alt=""></span> -->
                    <div class="mb-3">
                    <img src="/foto/kasirrpl12.png" style="margin-left: -40px;  margin-top: -80px;" height="200" width="260" alt="foto">
                    </div>
                </a>
            </div>
        </div>
       
        <div class="header  justify-top">    
            <div class="header-content clearfix">
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
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
                        <a href="/datakasir" aria-expanded="false">
                            <i class="fa fa-users menu-icon"></i><span class="nav-text">Data Kasir</span>
                        </a>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Laporan</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/laporantransaksi"> Transaksi</a></li>
                            <li><a href="/laporanproduk">Produk</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="/payment" aria-expanded="false">
                            <i class="icon-graph  menu-icon"></i><span class="nav-text">Payment</span>
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
                <p class="text-center">Copyright &copy; Designed & Developed By <a href="#">Kasir</a> 2024</p>
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
 
