<head>
    <title>{{ $title ?? env("APP_NAME") }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('/vendor/forms/app.css')}}">
    @livewireStyles
</head>
<body>
{{ $slot }}

@livewireScripts
<script src="{{asset('/vendor/forms/app.js')}}"></script>
{{assert()}}
</body>
