<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderitem;
use App\Models\Product;
use App\Models\User;
use Carbon\Doctrine\CarbonType;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Illuminate\Support\Facades\Session;
class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */

      
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    //    $order = Order::where('user_id', Auth::id());
    //    $cart = session()->get('cart');
    //    return view('home.checkout', compact('cart'));
        //   $orderitems = Order::where('user_id', Auth::id())->get();
        //   foreach($orderitems as $item){
        //     if(!Product::where('id', $item->product_id)->where('quantity', '>=', $item->quantity)->exists()){
        //         $removeItem = Order::where('user_id', Auth::id())->where('product_id', $item->product_id)->first();
        //         $removeItem->delete();
        //     }
        //   }
        //   $orderitems = Order::where('user_id', Auth::id())->get();
    
    // $user = Auth::user();
    // $orders = $user->orders()->with('product')->latest()->paginate(5);
    $orders = Order::where('user_id', Auth::id());
    return view('home.index', compact('orders'));

        // $order = Order::with()
        //   return view('home.checkout', compact('orderitems'));
    }
     
    public function create()
    {
        $orders = Order::all();
        return view('home.create', compact('orders'));
    }


    public function messenger(){
        return view('home.thankyou');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
            $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phonenumber' => 'required',
            'Totalprice' => 'required',
            'user_id' => 'required|exists:App\Models\User,id'
        ]);
    
        $cart = session()->get('cart');
        if(!$cart) {
            return redirect()->back()->with('error', 'Cart is empty!');
        }
    
        $order = Order::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'address' => $request->input('address'),
            'phonenumber' => $request->input('phonenumber'),
            'Totalprice' => $request->input('Totalprice'),
            'user_id' => $request->input('user_id'),
        ]);
    
        $totalPrice = 0;
        foreach ($cart as $id => $item) {
            $product = Product::find($id);
            $orderItem = OrderItem::create([
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'product_id' => $id,
                'orders_id' => $order->id, //Thêm trường orders_id và cung cấp giá trị của nó
            ]);
            $totalPrice += $orderItem->price;
        }
        
        
        return redirect()->route('messenger')->with('msg', 'Order created successfully!');
        

    }

   
    public function destroy(Request $request, $id)
    {
        // Order::destroy($id);
        // $request->session();
        // return redirect()->back(); 
    }
}
