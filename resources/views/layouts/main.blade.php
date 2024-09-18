<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>{{ $title }}</title>
</head>

<body>
    @include('partials.navbar')
    <div class="mx-auto w-full px-4 py-6 sm:px-6 lg:px-8">
        @yield('container')
    </div>
    @include('partials.footer')
    
    

</body>

</html>