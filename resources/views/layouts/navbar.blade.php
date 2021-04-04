<link rel="stylesheet" href="{{ asset('asset/css/navbar.css') }}" >

<div class="div">
    <a class="Home" href="{{route('admin.index')}}">Home</a>
    @guest

    @else

        <a class="Navbar" href="{{route('admin.myprofile')}}">{{auth()->user()->name}}</a>
        <a class="Navbar" href="{{route('admin.addbalance')}}">Add Balance</a>
        <a class="Navbar" href="{{route('cart.index')}}" ><i class="fas fa-shopping-cart"></i>Cart</a>
       <a class="number"> {{\Cart::session(auth()->id())->getTotalQuantity()}}</a>
        <a class="Navbar" href="{{route('admin.market')}}">Market</a>
        <a class="Navbar" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logoutform').submit();" >Logout</a>

        <form class="formlogout" action="{{route('logout')}}" id="logoutform" method="POST">
            @csrf
        </form>

    @endguest


    <form class="search">
        <input class="searchinput" type="search" placeholder="Search">
        <button class="button" type="submit">Search</button>

    </form>
</div>
