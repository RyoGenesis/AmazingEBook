<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Amazing E-Book</title>
    <link rel="stylesheet" href="/asset/css/bootstrap.css" />
    <link rel="stylesheet" href="/asset/css/apps.css" />
</head>
<body class="d-flex flex-column min-vh-100">
    @include('layout.header')
    <div class="container-fluid p-3 flex-fill">
        <div class="px-5">
            @yield('content')
        </div>
        
        {{-- <div class="row px-4 py-2">
            <div class="col-2"></div>
        </div> --}}
    </div>
    @include('layout.footer')
</body>
<script src="/asset/js/bootstrap.js"></script>
</html>