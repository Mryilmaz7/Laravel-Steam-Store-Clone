<link rel="stylesheet" href="{{ asset('asset/css/leftbar.css') }}" >

<div class="leftbar">


   <br> <a class="Navbar">Config <i class="fas fa-cogs"></i></a><br>
    <a class="Navbar" href="{{route('admin.addbalance')}}">{{$user->balance}}</a><br>
    <a href="{{route('admin.library')}}" class="Navbar">Library <i class="fas fa-gamepad"></i></a>
    <a href="{{route('admin.inventory')}}" class="Navbar">Inventory</a>
    <a href="{{route('mymarket')}}" class="Navbar">My Market</a>
</div>
