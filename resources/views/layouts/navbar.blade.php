<link rel="stylesheet" href="{{ asset('asset/css/navbar.css') }}" >

<div class="div">

@guest
        <a class="Home"  href="{{route('notlogin.index')}}"> <img class="steampng" src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Steam_Logo.png"></a>
        <a class="Home" href="{{route('admin.index')}}">STORE</a>
        <a class="Home">COMMUNITY</a>
        <a class="Home">ABOUT</a>
        <a class="Home">SUPPORT</a>
        <a class="Auth" href= {{route('login')}}>Sign In</a>
        <a class="Auth" href= {{route('register')}}>Sign Up </a>
    @else
        <a class="Home"  href="{{route('notlogin.index')}}"> <img class="steampng" src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Steam_Logo.png"></a>
        <a class="Home" href="{{route('admin.index')}}">STORE</a>
        <a class="Home" href="{{route('admin.myprofile')}}">{{auth()->user()->name}}</a>
        <a class="Home" href="{{route('admin.addbalance')}}">Add Balance</a>
        <a class="Home" href="{{route('cart.index')}}" ><i class="fas fa-shopping-cart"></i>Cart</a>
        <a class="Home"> {{\Cart::session(auth()->id())->getTotalQuantity()}}</a>
        <a class="Home" href="{{route('admin.market')}}">Market</a>
        <ul class="Home list">Config <i class="fas fa-cogs"></i>
        </ul>
        <a class="Home" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logoutform').submit();" >Logout</a>

        <form class="formlogout" action="{{route('logout')}}" id="logoutform" method="POST">
            @csrf
        </form>


    @endguest



</div>
