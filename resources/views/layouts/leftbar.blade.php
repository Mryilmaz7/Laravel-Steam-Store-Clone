<link rel="stylesheet" href="{{ asset('asset/css/leftbar.css') }}" >

<div class="leftBar">

    <a class="leftNavbar" href="{{route('admin.addbalance')}}"><i class="fas fa-lira-sign"></i>{{$user->balance}}</a>
    <a class="leftNavbar" href="{{route('admin.library')}}" >Library <i class="fas fa-gamepad"></i></a>
    <a class="leftNavbar" href="{{route('admin.inventory')}}" >Inventory  <i class="fas fa-box-open"></i></a>
    <a class="leftNavbar" href="{{route('mymarket')}}" >My Market <i class="fas fa-shopping-bag"></i></a>

</div>

