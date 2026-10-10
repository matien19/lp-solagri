<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.css')
    @stack('css')
</head>

<body class="index-page">

    @include('layout.header')
    <main class="main">
        @yield('content')
    </main>
    @include('layout.footer')
    
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    @include('layout.js')
    @stack('js')
</body>

</html>