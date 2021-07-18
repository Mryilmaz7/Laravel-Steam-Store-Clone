<?php

namespace App\Http\Controllers;
use App\Models\Balance;
use App\Models\Inventory;
use App\Models\Items;
use App\Models\Library;
use App\Models\Posts;
use App\Models\Products;
use App\Models\User;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Blade;
use Illuminate\Validation\Rules\In;
use VendorPackage\View\Components\AlertComponent;
use Jenssegers\Agent\Agent;


class AdminController extends Controller
{

    use Notifiable;
    public function __construct()
    {

        $this->middleware('auth');

    }

    public function addproduct(Request $request)
    {
        $user = auth()->user();
        $name =        $request->name;
        $howmuch =     $request->howmuch;
        $image =       $request->image;
        $content =     $request->content;
        $imagetwo =    $request->imagetwo;
        $imagethree =  $request->imagethree;
        $genres=       $request->genres;

        $data = [
            'name' => $name,
            'howmuch' => $howmuch,
            'genres'=>$genres,
            'image' => $image,
            'imagetwo' => $imagetwo,
            'imagethree' => $imagethree,
            'content' =>$content,

        ];
        Products::create($data);
        return view('admin.addproduct',[
            'user' =>$user,
        ]);

    }

    public function Showaddproduct()
    {
        $product = Products::select('name', 'howmuch', 'image','imagetwo','imagethree','content','genres')->get();
        $user = auth()->user();
        return view('admin.addproduct', [
            'user' => $user,
            'product' => $product
        ]);

    }


    public function ShowaddPost()
    {
        $user = auth()->user();

        return view('admin.addpost', [
            'user' => $user,

        ]);
    }


    public function ShowAddbalance()
    {
        $user = auth()->user();

        return view('admin.addbalance', [
            'user' => $user,

        ]);


    }

    public function addbalance(Request $request)
    {
        $user = auth()->user();
        $balance = $request->balance;
        DB::table('users')
            ->where('id', $user->id)
            ->update(['balance' => $user->balance + $balance]);
        return view('admin.addbalance',[
            'user' =>$user,
            ]);
    }


// User Profileee

    public function userpage($user)
    {

        $user = User::find($user);
        $posts = Posts::where('user_id', $user->id)->get();

        return view('admin.userpage', compact('posts'), [
            'user' => $user,
            'posts' => $posts,

        ]);
    }

    public function myprofile()
    {
        $user = auth()->user();
        $userpost = auth()->user()->id;
        $posts = Posts::where('user_id', $userpost)->get();
        return view('admin.userpage', compact('posts'), [
            'user' => $user,
            'posts' => $posts
        ]);

    }


    public function addPost(Request $request)
    {
        $title = $request->title;
        $content = $request->content;
        $status = $request->status;
        $user_id = auth()->user()->id;

        $data = [
            'title' => $title,
            'content' => $content,
            'user_id' => $user_id
        ];
        if (!is_null($status)) {
            $data['status'] = 1;
        }
        Posts::create($data);
    }

    public function additem(Request $request){
        $user_id=auth()->id();
        $name=$request->name;
        $howmuch=$request->howmuch;
        $image=$request->image;
        $data = [
            'user_id' => $user_id,
            'name' => $name,
            'howmuch' => $howmuch,
            'image'=>$image
        ];

        Inventory::create($data);
        return redirect('/home/inventory');

    }
    public function Showadditem()
    {
        $item = Inventory::select('id','user_id','name', 'howmuch', 'image')->get();
        $user = auth()->user();
        return view('admin.additem', [
            'user' => $user,
            'item' => $item
        ]);

    }
    // BUY ITEM
  public function buyitem(Items $item){
        $user=auth()->user();
        $selluser=User::find($item->selling_user_id);
      $name = $item->name;
      $howmuch = $item->howmuch;
      $image = $item->image;
       Items::find($item->id)->delete();
        if ($user->balance >= $howmuch) {
            DB::table('users')
                ->where('id', $user->id)
                ->update(['balance' => $user->balance - $howmuch]);

            $data = [
                'user_id' => auth()->id(),
                'name' => $name,
                'howmuch' => $howmuch,
                'image'=>$image
            ];
            Inventory::create($data);

            User::where('id',$selluser->id)->update(['balance'=>$selluser->balance + $howmuch]);

            return redirect()->route('admin.market')->with('success','The purchase is successful.');

        }

  }
    // SHOP
    public function market(){

        $user = auth()->user();
        $items=Items::select('id','selling_user_id','name','image','howmuch')->get(array());

            return view('admin.market', [
                'user' => $user,
                'items' => $items

            ]);

    }


// FOR SELL
    public function sold(Inventory $inventory)
    {
       Inventory::find($inventory->id)->delete();
        $name = $inventory->name;
        $howmuch = $inventory->howmuch;
        $image = $inventory->image;
        $data = [
            'selling_user_id'=>auth()->id(),
            'name' => $name,
            'howmuch' => $howmuch,
            'image' => $image
        ];
        Items::create($data);
        return redirect()->route('admin.inventory')->with('success','The purchase is successful.');

    }
// Remove my market
        public function removemarket(Items $item){
        Items::find($item->id)->delete();
            $user=auth()->user();
            $name = $item->name;
            $howmuch = $item->howmuch;
            $image = $item->image;
            $data = [
                'user_id' => auth()->id(),
                'name' => $name,
                'howmuch' => $howmuch,
                'image'=>$image
            ];
            Inventory::create($data);
            return redirect()->route('mymarket')->with('success','The purchase is successful.');
        }


 // MY INVENTORY
    public function inventory(){
        $user = auth()->user();
        $inventory=Inventory::select('id','user_id', 'name', 'howmuch', 'image')->where('user_id',auth()->id())->get();
        return view('admin.inventory',[
            'user' => $user,
            'inventory'=>$inventory
        ]);
    }
    // HOME
    public function home()
    {

        $user = auth()->user();
        $library=Library::select('id','user_id','product_name','product_id')->where('user_id',auth()->id())->get() ;
        $product = Products::select('id', 'name', 'howmuch', 'image')->get();
        $list = Posts::select('title', 'content')->get();
        return view('admin.index', compact('list'), [

            'library'=>$library,
            'user' => $user,
            'product' => $product,
        ]);
    }
    // LIBRARY
    public function library()
    {
        $user = auth()->user();
        $libraryy=DB::table('products')->join('library','library.product_id','=','products.id')
            ->select('products.name','products.howmuch','products.image')
            ->where('user_id',auth()->id())
            ->get();
        return view('admin.library',[
       'libraryy'=>$libraryy,
            'user'=>$user
    ]);
    }
    public function mymarket(){
        $user =auth()->user();
        $mylibrary=Items::select('id','selling_user_id','name','howmuch','image')->where('selling_user_id',auth()->id())->get();
        return view('admin.mymarket',[
            'mylibrary'=>$mylibrary,
            'user'=>$user
        ]);
    }
    // BUY
    public function buy(Request $request)
    {
        $cartItems= \Cart::session(auth()->id())->getContent();
        $user = auth()->user();
        $total = \Cart::session(auth()->id())->getTotal();
        if ($total <= $user->balance) {
            DB::table('users')
                ->where('id', $user->id)
                ->update(['balance' => $user->balance - $total]);
            $Items=\Cart::session(auth()->id())->getContent();
            foreach ($Items as $row) {
                $product_id = $row->id;
                $product_name = $row->name;
                $user_id = auth()->user()->id;

                $data = [
                    'user_id' => $user_id,
                    'product_id' => $product_id,
                    'product_name' => $product_name
                ];

                Library::create($data);

            }
            \Cart::session(auth()->id())->clear();
            return redirect()->route('cart.index')->with('success','The purchase is successful.');



        }
        else {

            return redirect()->route('cart.index')->with('error','Insufficient Balance.To add balance, tap add balance.');


        }
}
public function game(Products $game){
        $user=auth()->user();
        $posts=Posts::select('id','content','product_id','user_id')->where('product_id',$game->id)->get();
        $games=Products::select('id','name','howmuch','image','imagetwo','imagethree','content')->where('id',$game->id)->get();
    return view('admin.game',[
        'posts'=>$posts,
        'user'=>$user,
        'games'=>$games
    ]);

}
public function showgame(Products $game,Request $request){
    $content=$request->content;
    $product_id=$game->id;
    $user_id=auth()->id();
    $data=[
        'user_id'=>$user_id,
        'content'=>$content,
        'product_id'=>$product_id
    ];
    Posts::create($data);

}
}
