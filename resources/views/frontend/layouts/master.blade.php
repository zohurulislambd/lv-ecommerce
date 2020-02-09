<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
@include('frontend.partials.styles')
    <title>@yield('title','Home')</title>
  </head>
  <body>
    @include('frontend.partials.navber')
    {{-- start sidebar + content  --}}
    @yield('content')

<footer>
  <p class="text-center"> &copy;All rights researved 2019 <a href="#">Intorez Ltd</a></p>
</footer>
@include('frontend.partials/scripts')
</body>
</html>
