<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
<ul>
    <li><a href="/">Home</a></li>
    <li><a href="/about-page">About</a></li>
    <li><a href="/contact-page">Contact</a></li>
    <li><a href="/shop-page">Shop</a></li>
</ul>
@yield('content'){{--is shown for header another page --}}

@yield('test-contnt')
{{--<script>alert("are you sure! You  TKH User!!!");</script>--}}

</body>
</html>