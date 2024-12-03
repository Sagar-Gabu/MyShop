<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('admin/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('admin/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block">Admin</span>
                <img src="{{ asset('img/logo.png') }}" alt="">
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->
                
                @auth
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link text-decoration-none">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </button>
                        </form>
                    </li>
                @endauth
            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="bi bi-house"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin.category.index') }}">
                    <i class="bi bi-list-check"></i>
                    <span>Category</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin.subcategory.index') }}">
                    <i class="bi bi-tags"></i>
                    <span>SubCategory</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin.product.index') }}">
                    <i class="bi bi-box"></i>
                    <span>Product</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin.setting.index') }}">
                    <i class="bi bi-gear"></i>
                    <span>Site Setting</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="">
                    <i class="bi bi-card-list"></i>
                    <span>orders</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('profile.edit')}}">
                    <i class="bi bi-person"></i>
                    <span>My Profile</span>
                </a>
            </li>
        </ul>
    </aside><!-- End Sidebar -->

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
        </div>
        {{$slot}}
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('admin/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('admin/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('admin/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/php-email-form/validate.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous">
    </script>

    @yield('ajax')

    <!-- Template Main JS File -->
    <script src="{{ asset('admin/js/main.js') }}"></script>

</body>

</html>
 