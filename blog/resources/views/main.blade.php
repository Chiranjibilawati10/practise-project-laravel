<!DOCTYPE html>
<html lang="en">
    <head>
        @yield('stylesheets')
        
        @include('partials._head')
    </head>
<body>
    @include('partials._navbar')

    <div class="container">
    @include('partials._messages')
        @yield('content')

        @include('partials._footer')
    </div>
    @yield('scripts')
</body>
</html>