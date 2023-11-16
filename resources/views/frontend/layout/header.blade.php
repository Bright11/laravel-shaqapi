<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shaq Express Test</title>
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    @stack('style')
</head>
<body>
    @include('frontend.layout.simplebar')
    @yield('content')

</body>
</html>
