<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('site_title')</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico" />
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/sweetalert2@11') }}"></script>
    <script src="{{ asset('js/config.js') }}"></script>
</head>

<body>
    <div id="loader" class="LoadingOverlay d-none">
        <div class="Line-Progress">
            <div class="indeterminate"></div>
        </div>
    </div>
    @yield('content')
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script>
        @if (session('success'))
            message('success', "{{ session('success') }}");
        @elseif (session('error'))
            message('error', "{{ session('error') }}");
        @elseif (session('warning'))
            message('warning', "{{ session('warning') }}");
        @elseif (session('info'))
            message('info', "{{ session('info') }}");
        @elseif (session('question'))
            message('question', "{{ session('question') }}");
        @endif
    </script>
</body>

</html>
