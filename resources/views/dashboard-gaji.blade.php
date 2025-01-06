<!DOCTYPE html>
<html lang="en">

<head>
@include('partials.header')
</head>

<body class="g-sidenav-show  bg-gray-100">
@include('partials.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">

                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                    <ul class="navbar-nav d-flex align-items-center  justify-content-end">
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-2">
            <div class="row">
                <div class="ms-3">
                    <h3 class="mb-0 h4 font-weight-bolder">Dashboard</h3>

                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-2 ps-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-sm mb-0 text-capitalize">Data Karyawan</p>
                                    <h4 class="mb-0"> @php
                                    $karyawan = App\Models\Karyawan::count();
                                    echo $karyawan;
                                @endphp</h4>
                                </div>
                                <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                <i class="material-symbols-rounded opacity-5">people</i>
                                </div>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                       
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-2 ps-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-sm mb-0 text-capitalize">Data Departemen</p>
                                    <h4 class="mb-0">@php
                                    $departemen = App\Models\Departemen::count();
                                    echo $departemen;
                                @endphp</h4>
                                </div>
                                <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                <i class="material-symbols-rounded opacity-5">business</i>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
               
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-2 ps-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-sm mb-0 text-capitalize">Data Tunjangan</p>
                                    <h4 class="mb-0">@php
                                    $tunjangan = App\Models\Tunjangan::count();
                                    echo $tunjangan;
                                @endphp</h4>
                                </div>
                                <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                <i class="material-symbols-rounded opacity-5">add_card</i>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
                
            </div>

        </div>
        @include('partials.footer')
        </div>
    </main>


    <script src="{{asset('adminpage')}}/assets/js/core/popper.min.js"></script>
        <script src="{{asset('adminpage')}}/assets/js/core/bootstrap.min.js"></script>
        <script src="{{asset('adminpage')}}/assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="{{asset('adminpage')}}/assets/js/plugins/smooth-scrollbar.min.js"></script>
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{asset('adminpage')}}/assets/js/material-dashboard.min.js?v=3.2.0"></script>
</body>

</html>