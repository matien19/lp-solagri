<!DOCTYPE html>
<html lang="en-US" dir="ltr" data-navigation-type="default" data-navbar-horizontal-shape="default">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Sarana Hijau</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    @include('layout_admin.css')
</head>

<body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        @include('layout_admin.sidebar')
        @include('layout_admin.navbar')

        <div class="content">
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show alert-invalid" role="alert">
                <strong>Validasi Error!</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form id="delete-form" method="POST" style="display:none;">
                @csrf
                @method('DELETE')
            </form>
            @yield('content')
            @include('layout_admin.footer')
        </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    @include('layout_admin.js')
    @stack('scripts')

</body>

</html>