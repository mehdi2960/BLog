<!DOCTYPE html>
<html lang="fa">

@include('layouts.header')

<body class="index-page sidebar-collapse">

    <!-- responsive-header -->
    @include('layouts.navbar')
    <!-- responsive-header -->
    @include('layouts.main-header')
    <div class="wrapper default">

        <main class="main default">
           @yield('content')
        </main>
@include('layouts.footer')
    </div>

</body>

</html>
