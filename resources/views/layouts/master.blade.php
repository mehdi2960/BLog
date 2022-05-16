<!DOCTYPE html>
<html lang="fa">

@include('layouts.header')

<body class="index-page sidebar-collapse">

<!-- responsive-header -->
@include('layouts.navbar')
<!-- responsive-header -->
@include('layouts.main-header')
<div class="wrapper default">
    @yield('content')
    @include('layouts.footer')
</div>

@include('sweet::alert')
</body>
</html>
