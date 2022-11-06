<!doctype html>
<html lang="en">
@include('website.layouts.head')
<body>
<div class="overlay"></div>

@include('website.layouts.header')

@yield('content')

@include('website.layouts.footer')

</body>
</html>
