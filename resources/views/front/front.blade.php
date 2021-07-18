
<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, intial-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="http://bxslider.com/lib/jquery.bxslider.js"></script>
    <link href="http://bxslider.com/lib/jquery.bxslider.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('asset/css/front.css') }}" >

    <title>@yield('title')</title>
    @yield('cs')
</head>
<header>
    @include('layouts.navbar')
    @include('layouts.banner')
    @include('layouts.menu')
</header>

<body>
<div>

    @guest()
    @else
        @include('layouts.leftbar')

    @endguest
</div>
<div class="container">
    <div class="row">
@yield('Content')


</div>

<script>
    $(document).ready(function(){
        $('.bxslider').bxSlider({
            captions: true
        });
    });

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"
        integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"
        integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG"
        crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d5277a44d5.js" crossorigin="anonymous"></script>
@yield('js')

</body>
<footer>
    @include('layouts.footer')
</footer>

</html>

