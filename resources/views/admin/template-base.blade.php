@include('admin.components.header.header')

<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

        @include('admin.components.sidebar.sidebar')

        <!-- Layout container -->
        <div class="layout-page">

            <!-- Navbar -->
            @include('admin.components.navbar.navbar')
            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                @yield('main-content')
                
                <!-- / Content -->

                @include('admin.components.footer.footer')
                <!-- / Footer -->
                
                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->

<div class="buy-now no-print">
    <a href="#" onclick="alert('Ini contoh alert')"
        class="btn btn-danger btn-buy-now">Contoh alert</a>
</div>


@include('admin.components.footer.end-footer')
