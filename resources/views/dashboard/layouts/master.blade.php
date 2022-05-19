<!doctype html>
<html lang="en">

@include('dashboard.layouts.header')
<body>
@include('sweet::alert')
<!-- Preloader -->
@include('dashboard.layouts.preloader')
<!-- Preloader -->

<!-- ======================================
******* Page Wrapper Area Start **********
======================================= -->
<div class="ecaps-page-wrapper">
@include('dashboard.layouts.sidebar')

<!-- Page Content -->
    <div class="ecaps-page-content">
    @include('dashboard.layouts.topnav')
        <!-- Main Content Area -->
      @yield('content')
    </div>
</div>

@include('dashboard.layouts.footer')
</body>
</html>
