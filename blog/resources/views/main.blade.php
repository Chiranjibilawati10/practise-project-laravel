<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials._head')
    </head>
<body>
    @include('partials._navbar')

    <div class="container">
        @yield('content')

        @include('partials._footer')
    </div>

</body>
</html>