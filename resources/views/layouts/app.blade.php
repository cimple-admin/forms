<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <link rel="stylesheet" href="{{asset('/vendor/forms/admin-lte/plugins/fontawesome-free/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('/vendor/forms/admin-lte/plugins/toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('/vendor/forms/admin-lte/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('/vendor/forms/app.css')}}">
@stack('style')

<body>
{{ $slot }}

@livewireScripts
<script src="{{asset('vendor/forms/admin-lte/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/forms/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/forms/admin-lte/js/adminlte.min.js')}}"></script>
<script type="module" src="{{asset('/vendor/forms/ionicons/ionicons/ionicons.esm.js')}}"></script>
<script nomodule="" src="{{asset('/vendor/forms/ionicons/ionicons/ionicons.js')}}"></script>
<script src="{{asset('/vendor/forms/admin-lte/plugins/toastr/toastr.min.js')}}"></script>
@stack('scripts')
</body>
