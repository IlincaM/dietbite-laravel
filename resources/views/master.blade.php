<!doctype html>
<html lang="{{ config('app.locale') }}">
    @include('partials._head')
    <body>
        @include('partials._nav')
        <div>
            @yield('content')
        </div>
        @yield('footer')
        @yield('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
