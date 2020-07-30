<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Cart;
use App\Coupon;
use App\Order;
use App\OrderItems;
use Session;
use Auth;
use Illuminate\Support\Facades\DB;

// use Stripe;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function shopShipInfo(Request $request){
        $categories = Category::where('parent_id',0)->get();
        $product = Product::find(1);
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $request->session()->put('cart',$cart);
        
        $Cart = $request->session()->get('cart');
        if ($Cart->totalPrice > 0)
            $Cart_ = $Cart;
        else
            $Cart_ = null;
        $coupon = $request->input('coupon')? $request->input('coupon') : 0;
        $totalprice = $Cart->totalPrice - $coupon;

        if ($request->isMethod('post')) {
            $name = $request->input('name');
            $address = $request->input('address');
            $post_code = $request->input('post_code');
            $customer = array('name' => $name , 'address'=>$address, 'post_code'=>$post_code);
            Session::put('customer',$customer);

            $coupon_amount = Session::get('coupon_amount') ?? 0;    
            $coupon_name = Session::get('coupon_name') ?? '';    
            $shipping = Session::get('shipping') ?? 0;

        return view('pages.shopShipMethod')->with([
             'product' => $product,
             'categories' => $categories,
             'Cart' => $Cart_,
             'totalprice'=> $totalprice,
             'customer'=> $customer,
             'coupon_amount' => $coupon_amount,
             'coupon_name' => $coupon_name,
             'shipping' => $shipping  ]);
        }

        return view('pages.shopShipInfo')->with([
             'product' => $product,
             'categories' => $categories,
             'Cart' => $Cart_,
             'totalprice'=> $totalprice ]);
    }

    public function shopShipMethod(Request $request){

        // SHIPPING + COUPON FLUSH      
        // if(Session::has('shipping')) {
        //     Session::forget('shipping'); }
        // if(Session::has('coupon_amount')) {
        //     Session::forget('coupon_amount'); }
        // if(Session::has('coupon_name')) {
        //     Session::forget('coupon_name'); } 

        $categories = Category::where('parent_id',0)->get();
        $product = Product::find(1);
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $request->session()->put('cart',$cart);
        
        $Cart = $request->session()->get('cart');
        if ($Cart->totalPrice > 0)
            $Cart_ = $Cart;
        else
            $Cart_ = null;
        $coupon = $request->input('coupon')? $request->input('coupon') : 0;
        $totalprice = $Cart->totalPrice - $coupon;

        $customer = Session::get('customer');
        $coupon_amount = Session::get('coupon_amount') ?? 0;    
        $coupon_name = Session::get('coupon_name') ?? '';    
        $shipping = Session::get('shipping') ?? 0;    

        return view('pages.shopShipMethod')->with([
             'product' => $product,
             'categories' => $categories,
             'Cart' => $Cart_,
             'totalprice'=> $totalprice,
             'customer'=> $customer, 
             'coupon_amount' => $coupon_amount,
             'coupon_name' => $coupon_name,
             'shipping' => $shipping ]);
    }
    // public function postShipMethod(Request $request){
    //     $shipping = $request->input('shipping_radio')? $request->input('shipping_radio'):0;
    //     Session::put('shipping',$shipping);

    //     $categories = Category::where('parent_id',0)->get();
    //     $product = Product::find(1);
    //     $oldCart = Session::has('cart')?Session::get('cart'):null;
    //     $cart = new Cart($oldCart);
    //     $request->session()->put('cart',$cart);
        
    //     $Cart = $request->session()->get('cart');
    //     if ($Cart->totalPrice > 0)
    //         $Cart_ = $Cart;
    //     else
    //         $Cart_ = null;
        
    //     $coupon = $request->input('coupon')? $request->input('coupon') : 0;
    //     $totalprice = $Cart->totalPrice - $coupon;
        
    //     $customer = Session::get('customer');
    //     $coupon_amount = Session::get('coupon_amount') ?? 0;    
    //     $coupon_name = Session::get('coupon_name') ?? '';    
    //     $shipping = Session::get('shipping') ?? 0;    

    //     return view('pages.shopShipMethod')->with([
    //          'product' => $product,
    //          'categories' => $categories,
    //          'Cart' => $Cart_,
    //          'totalprice'=> $totalprice,
    //          'customer'=> $customer,
    //          'coupon_amount' => $coupon_amount,
    //          'coupon_name' => $coupon_name,
    //          'shipping' => $shipping  ]);
    // }

    public function shopPayMethod(Request $request){
        $categories = Category::where('parent_id',0)->get();
        $product = Product::find(1);
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $request->session()->put('cart',$cart);
        
        $Cart = $request->session()->get('cart');
        if ($Cart->totalPrice > 0)
            $Cart_ = $Cart;
        else
            $Cart_ = null;
        $coupon = $request->input('coupon')? $request->input('coupon') : 0;
        $totalprice = $Cart->totalPrice - $coupon;

        $customer = Session::get('customer');
        $shipping = Session::get('shipping') ?? 0;
        $coupon_amount = Session::get('coupon_amount') ?? 0;
        $coupon_name = Session::get('coupon_name') ?? '';    

        return view('pages.shopPayMethod')->with([
             'product' => $product,
             'categories' => $categories,
             'Cart' => $Cart_,
             'totalprice'=> $totalprice,
             'customer'=> $customer,
             'coupon_amount' => $coupon_amount,
             'coupon_name' => $coupon_name,
             'shipping' => $shipping  ]);
    }



    public function shopCart(Request $request)
    {
        $categories = Category::where('parent_id',0)->get();
        $product = Product::find(1);
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $request->session()->put('cart',$cart);
        
        $Cart = $request->session()->get('cart');
        if ($Cart->totalPrice > 0)
            $Cart_ = $Cart;
        else
            $Cart_ = null;

        $totalprice = $Cart->totalPrice;  

        return view('pages.shopCart')->with([
        'product' => $product,
        'categories' => $categories,
        'Cart' => $Cart_,
        'totalprice'=> $totalprice ]);
    }
 public function shopCheckout(Request $request)
    {
        $categories = Category::where('parent_id',0)->get();
        $product = Product::find(1);
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $request->session()->put('cart',$cart);
        
        $Cart = $request->session()->get('cart');
        if ($Cart->totalPrice > 0)
            $Cart_ = $Cart;
        else
            $Cart_ = null;

        $totalprice = $Cart->totalPrice;  
                // dd($cart);

        return view('pages.shopCheckout')->with([
        'product' => $product,
        'categories' => $categories,
        'Cart' => $Cart_,
        'totalprice'=> $totalprice ]);
    }

    public function shopCheckoutCoupon(Request $request){
        
        $coup = $request->input('coupon'); 
        $coupon_a = Coupon::where('name',$coup)->exists() ? Coupon::where('name',$coup)->get() : null;
        if($coupon_a == null){
            $coupon_name = "unknown"; 
            $coupon_amount= 0;
            return redirect()->back();
        }    
        else {
            $coupon_name = $coupon_a[0]->name; 
            $coupon_amount=$coupon_a[0]->amount; 
            Session::put('coupon_amount',$coupon_amount);                 
        }
        $product = Product::find(1);
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $request->session()->put('cart',$cart);
        
        $Cart = $request->session()->get('cart');
        if ($Cart->totalPrice > 0)
            $Cart_ = $Cart;
        else
            $Cart_ = null;

        $request->session()->put('cart',$cart);
        $totalprice = $cart->totalPrice;

        // $coupon_amount = Session::get('coupon_amount');
        $customer = Session::get('customer');
        $shipping = Session::get('shipping');
        // dd($coupon_amount);
        return view('pages.shopPayMethod')->with([
             'product' => $product,
             'Cart' => $Cart_,
             'coupon'=>$coupon_name,
             'coupon_amount'=>$coupon_amount,
             'customer'=> $customer,
             'shipping' => $shipping,
             'totalprice'=> $totalprice ]);
    }
    public function getCheckout(Request $request){
        $categories = Category::where('parent_id',0)->get();
        $product = Product::find(1);
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $request->session()->put('cart',$cart);
        
        $Cart = $request->session()->get('cart');
        if ($Cart->totalPrice > 0)
            $Cart_ = $Cart;
        else
            $Cart_ = null;
        $coupon = $request->input('coupon')? $request->input('coupon') : 0;
        $totalprice = $Cart->totalPrice - $coupon;
        return view('pages.checkout')->with([
             'product' => $product,
             'categories' => $categories,
             'Cart' => $Cart_,
             'totalprice'=> $totalprice ]);
    }

public function updateOrder($order_id){

        $item = Product::find(1);
        $order = Order::find(81);
        $cart_items = array(unserialize($order->cart));
        $number = count(array(unserialize($order->cart)))+1;
        $product = array( $number => 
                   array("qty" => 1, "price" => 214143,"item" => $item));

        $array = $cart_items[0]->items + $product; 
        dd($array);

        $order->cart = serialize($array);
        $order->total_price = $cart->totalPrice;
        
        // dd($request->all());
        $order->update();  
               

        return redirect()->back();
    }

    public function postCheckout(Request $request){

        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart_array = array(
            'items' => $cart->items,
            'order' => null,
            'totalQty' => $cart->totalQty,
            'totalPrice'=> $cart->totalPrice  );

        if($cart->items != null)
            $item_quantity = count($cart->items);
        else
            return redirect()->route('shop.shopHome');

        $shipping = Session::has('shipping')?Session::get('shipping'): 0;
        $coupon_amount = Session::has('coupon_amount')?Session::get('coupon_amount'): 0;
        
        $order = new Order(); 
        $order->user_id = auth()->user() ? auth()->user()->id : 0; 
        $order->name = $request->input('name');
        $order->address = $request->input('address');
        $order->post_code = $request->input('post_code');
        $order->cart = serialize($cart_array);
        $order->total_price = $cart->totalPrice;
        $order->discount = $coupon_amount;
        $order->shipping_cost = $shipping;
        $order->payment_id = $request->stripeToken;
        $order->save();
        // dd($order->id);

        foreach ($cart->items as $item) {
            $order_items = new OrderItems();
            $order_items->order_id = $order->id;
            $order_items->product_id = $item["item"]["id"];
            $order_items->price = $item["item"]["price"];
            $order_items->quantity = $item["qty"];
            $order_items->item_total = $item["price"];
            $order_items->save();
        }

    // try{
    //     $token = $_POST['stripeToken'];
    //     \Stripe\Stripe::setApiKey("sk_test_RaYYtj53VjFU1TDNPaRgiCHb00qAmxWlfX");
    //     $charge = \Stripe\Charge::create([
    //         'amount' => 100,
    //         'currency' => 'usd',
    //         'description' => 'Example charge',
    //         'source' => $token,
    //     ]);
    //       // dd($request->all());
    //     }
    // catch(Exception $message){
    //     }

        if(Session::has('cart')) {
            Session::forget('cart'); }
        if(Session::has('shipping')) {
            Session::forget('shipping'); } 
        if(Session::has('coupon_amount')) {
            Session::forget('coupon_amount'); }  
            
        // Retrive order items and details
        // $order = Order::where('payment_id', $request->stripeToken)->get();         
        $order_ = Order::find($order->id);

        $item = $order->cart;
        $items = unserialize($item);

        return view('pages.paymentSuccess')->
            with([ 'order' => $order_, 
                    'items'=> $items, 
                    'message' => 'Your order placed successfully.']);
    }

    public function paymentSuccess(){
        $order = Order::find(101);

        // $order = Order::all()->last();
        $item = $order->cart;
        $items = unserialize($item);

        return view('pages.paymentSuccess')->
            with([  'order' => $order, 
                    'items'=> $items, 
                    'message' => 'Your order placed successfully.' ]); 
        }

    public function getAddToCart(Request $request,$id)
    {
        $product = Product::where('id',$id)->first()->toArray();
        // dd($product['price']);
        $quantity = $request->input('qty') ? $request->input('qty') : 1;
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $request->session()->put('cart',$cart);

        // dd($request->session()->get('cart'));

        return redirect()->back();
        // return  Redirect::to('admin.category');
    }
    public function updateCart(Request $request,$id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->update($product->id); 
        $request->session()->put('cart',$cart);

        // dd($request->session()->get('cart'));

        // return redirect()->route('shop.products');
        return redirect()->back();
    }
    public function removeFromCart($id)
    {
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->remove($id); 
        Session::put('cart',$cart);

        return redirect()->back();
    }

    public function deleteFromCart($id)
    {
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->delete($id); 
        Session::put('cart',$cart);

        return redirect()->back();
    }

    public function clearCart()
    {
        if(Session::has('cart')) {
            Session::forget('cart'); } 

        return redirect()->back();
    }

     public function index(Request $request)
    {
        $product = Product::find(1);
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $request->session()->put('cart',$cart);
        
        $Cart = $request->session()->get('cart');
        if ($Cart->totalPrice > 0)
            $Cart_ = $Cart;
        else
            $Cart_ = null;

        $totalprice = $Cart->totalPrice;  

        return view('pages.cart')->with([
        'product' => $product,
         'Cart' => $Cart_,
         'totalprice'=> $totalprice ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product)
    {
        // $duplicates = Cart::search(function ($cartItem, $rowId) use ($product) {
        //     return $cartItem->id === $product->id;
        // });

        // if ($duplicates->isNotEmpty()) {
        //     return redirect()->route('cart.index')->with('success_message', 'Item is already in your cart!');
        // }

        Cart::add($product->id, $product->name, 1, $product->price)
            ->associate('App\Product');

        return redirect()->route('shop.cart')->with('success_message', 'Item was added to your cart!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,5'
        ]);

        if ($validator->fails()) {
            session()->flash('errors', collect(['Quantity must be between 1 and 5.']));
            return response()->json(['success' => false], 400);
        }

        if ($request->quantity > $request->productQuantity) {
            session()->flash('errors', collect(['We currently do not have enough items in stock.']));
            return response()->json(['success' => false], 400);
        }

        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'Quantity was updated successfully!');
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success_message', 'Item has been removed!');
    }

    /**
     * Switch item for shopping cart to Save for Later.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToSaveForLater($id)
    {
        $item = Cart::get($id);

        Cart::remove($id);

        $duplicates = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Item is already Saved For Later!');
        }

        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)
            ->associate('App\Product');

        return redirect()->route('cart.index')->with('success_message', 'Item has been Saved For Later!');
    }
    

}
