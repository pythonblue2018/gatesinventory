<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Order;
use App\OrderItems;
use App\Purchase;
use App\PurchaseItems;
use App\Customer;
use App\Category;
use App\Brand;
use App\Wishlist;
use App\ProductAttribute;
use App\OrderTrack;
use App\Coupon;
use App\Http\Requests;
use Illuminate\Support\Collection;
use Illuminate\Support\str;
use Illuminate\Support\helpers;
use Illuminate\Support\Facades\DB;
use App\Cart;
use Session;
use Auth;
use App\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Response;

class AjaxController extends Controller
{
   public function sendEmail(Request $request){
        $email = $_GET['email'];
        $subject = $_GET['subject'];
        $message = $_GET['message'];
        $order_id = $_GET['order_id'];
        # send_mail(
        #     'Subject: Order update for Order no. '+str(order_id),
        #     'Hi Mr. '+email+'. Thanks for your order. '+message,
        #     settings.EMAIL_HOST_USER,
        #     [email],
        #     fail_silently=False,
        #     )
        return Response::json('success');

    } 
   public function confirmPurchase(Request $request){
    $purchase_items = $_GET['purchase_items'];
    $total_quantity = $_GET['total_quantity']; 
    $order_total = $_GET['order_total']; 
    $items = ($purchase_items);

    $shipping = Session::has('shipping')?Session::get('shipping'): 0;
    $coupon_amount = Session::has('coupon_amount')?Session::get('coupon_amount'): 0;
    
    $purchase = new Purchase(); 
    $purchase->user_id = auth()->user() ? auth()->user()->id : 0; 
    $purchase->supplier = $request->input('supplier');
    $purchase->reference = $request->input('reference');
    $purchase->purchase_status = $request->input('status');
    $purchase->total_price = $order_total;
    $purchase->paid = $order_total;
    $purchase->balance = 0;
    $purchase->save();
    // dd($items);

    foreach($items as $item) {
        $product = Product::where('name',$item["item"])->first();
        // dd($product->id);   
        $purchase_items = new PurchaseItems();
            $purchase_items->purchase_id = $purchase->id;
            $purchase_items->product_id =$product->id;
            $purchase_items->price = $item["price"];
            $purchase_items->quantity = $item["qty"];
            $purchase_items->item_total = $item["item_total"];
        $purchase_items->save();
        }
   
    return Response::json('success');

    }

    public function addToPurchase(Request $request){
        $product_id = $_GET['product_id'];
        $product =  Product::find($product_id);
        
        $p = [$product->name, $product->price, $product->quantity];

    return Response::json( array('product' => $p ));
    }
   public function getProductPrice(Request $request){
    $product_id = $_GET['id'];
    $product =  Product::find($product_id);

    return Response::json($product->purchase_price);
    }

   public function confirmSale(Request $request){
    $sale_items = $_GET['sale_items'];
    $total_quantity = $_GET['total_quantity']; 
    $order_total = $_GET['order_total']; 
    $items = ($sale_items);
    $purchase_price = 0;

    $shipping = Session::has('shipping')?Session::get('shipping'): 0;
    $coupon_amount = Session::has('coupon_amount')?Session::get('coupon_amount'): 0;
    
    $order = new Order(); 
    $order->user_id = auth()->user() ? auth()->user()->id : 0; 
    $order->name = $request->input('name');
    $order->address = $request->input('address');
    $order->post_code = $request->input('post_code');
    $order->purchase_price = $purchase_price;
    $order->total_price = $order_total;
    $order->discount = 0;
    $order->shipping_cost = 10;
    $order->payment_id = 001;
    $order->save();
    // dd($items);

    foreach($items as $item) {
        $product = Product::where('name',$item["item"])->first();
        // dd($product->id);   
        $order_items = new OrderItems();
            $order_items->order_id = $order->id;
            $order_items->product_id =$product->id;
            $order_items->price = $item["price"];
            $order_items->quantity = $item["qty"];
            $order_items->item_total = $item["item_total"];
        $order_items->save();
        }
   
    return Response::json('success');

    }

    public function addToSale(Request $request){
        $product_id = $_GET['product_id'];
        $product =  Product::find($product_id);
        
        $p = [$product->name, $product->price, $product->quantity];

    return Response::json( array('product' => $p ));
}

    public function createPurchaseCat(Request $request){ 
         $id = $_GET['id'] ?? 0;
            $products = DB::table('products')->where('category',$id)->get();
            // dd($products);

            return view('pages.createPurchaseCat', compact('products'));

    }     

    public function chartData(Request $request){ 
    $pops = [22,33,44,55,30,56];
    $labels = [];
    $buy_sell = [];
    // $last_month = datetime.now() - timedelta(days=30)
    # orders_monthly = Order.objects.filter(created_at__gt=last_month).
    $orders = Order::all();
    $orders_total =45000;
    $purchases_total = 40000;
    $buy_sell = 6700;
    # print('buy sell', buy_sell)
    
    // foreach ($orders as $order){
        // $pops.append($order->total_price);
    // }
    
    $labels= ["January", "February", "March", "April", "May", "June"];
        # pops = [2478,1267,2934,1784,433]
   
    return Response::json( array('pops' => $pops, 'labels'=> $labels,
                'buy_sell'=> $buy_sell ));
    }

    public function ajaxRemoveOneFromCart(Request $request){
        $id = $_POST['id'];
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->remove($id); 
        Session::put('cart',$cart);

        $cart = Session::get('cart');
        $totalprice = $cart->totalPrice ?? 0;  
        
        $cart_qty = 0;
        $item_qty = $cart->items[$id]['qty'] ?? 0;


        if($cart->items == null){
            $returnHTML = 'Cart cleared by Ajax!';
            return Response::json( array('cart_qty' => $cart_qty, 'item_qty'=> $item_qty,
                'html'=> $returnHTML ));
        }
        else{
            foreach($cart->items as $item)
                    $cart_qty += $item["qty"];        

            $item_qty = $cart->items[$id]['qty'] ?? 0;
            // $cart_details = array('cart_qty' => $cart_qty, 'item_qty'=> $item_qty);           
            $returnHTML = view('pages.cartContent', compact('cart','totalprice'))->render();

            return Response::json( array('cart_qty' => $cart_qty, 'item_qty'=> $item_qty,
                'html'=> $returnHTML ));
            // return Response::json($cart_details);
        }            
    }

    public function ajaxDeleteFromCart(Request $request){
        $id = $_POST['id'];
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->delete($id); 
        Session::put('cart',$cart);

        $cart = Session::get('cart');
        $totalprice = $cart->totalPrice ?? 0;

        $cart_qty = 0;
        if($cart->items != null){    
            foreach($cart->items as $item)
                $cart_qty += $item["qty"];        
        }
        $returnHTML = view('pages.cartContent', compact('cart','totalprice'))->render();

        if($cart->items == null){
            $returnHTML = 'Cart cleared by Ajax!';
            return Response::json( array('cart_qty' => $cart_qty, 
                'html'=> $returnHTML ));}
        else
            return Response::json( array('cart_qty' => $cart_qty, 
                'html'=> $returnHTML ));
            // return view('pages.cartContent', compact('cart','totalprice')::json($cart_qty);
    }

    public function ajaxAddToCart(Request $request)
    {   
        $id = $_POST['id'] ?? 0;
        $product = Product::where('id',$id)->first()->toArray();
        // dd($product['price']);
        $quantity = $request->input('qty') ? $request->input('qty') : 1;
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $request->session()->put('cart',$cart);

        $cart = Session::has('cart') ? Session::get('cart') : null;
        $totalprice = $cart->totalPrice ?? 0;
        // dd($cart->totalQty);
        $cart_qty = 0;

        if($cart->items != null){    
            foreach($cart->items as $item)
                $cart_qty += $item["qty"];        
        }
        $item_qty = $cart->items[$id]['qty'] ?? 0;
        $returnHTML = view('pages.cartContent', compact('cart','totalprice'))->render();
        // $cart_details = array('cart_qty' => $cart_qty, 'item_qty'=> $item_qty);           
        
        return Response::json( array('cart_qty' => $cart_qty, 'item_qty'=> $item_qty,
                'html'=> $returnHTML ));
    }

    public function shippingInfo(Request $request){
       if(Session::has('customer')) {
            Session::forget('customer'); }
        $shipping_info = $_POST['shipping_info'];

        $name = $shipping_info[0]['value'];
        $address = $shipping_info[1]['value'];
        $post_code = $shipping_info[2]['value'];
        $customer = array('name' => $name , 'address'=>$address, 'post_code'=>$post_code);
        Session::put('customer',$customer);

        $coupon_amount = Session::get('coupon_amount') ?? 0;    
        $coupon_name = Session::get('coupon_name') ?? '';    
        $shipping = Session::get('shipping') ?? 0;

        return Response::json($customer);       
    }

public function couponValue(Request $request){

        $coup = $_POST['coupon_value'] ?? 0;
        $coupon_a = Coupon::where('name',$coup)->exists() ? Coupon::where('name',$coup)->get() : null;

        if($coupon_a == null){
            $coupon_name = "unknown"; 
            $coupon_amount= 0;
            return Response::json($coupon_amount);
        }    
        else {
            $coupon_name = $coupon_a[0]->name; 
            $coupon_amount=$coupon_a[0]->amount; 
            Session::put('coupon_amount',$coupon_amount); 
        
            $Cart = Session::get('cart');
            $total_price = $Cart->totalPrice;
            $shipping_cost = Session::get('shipping') ?? 0;    
            
            $coupon_plus = array('coupon_amount' => $coupon_amount, 
                               'total_price'=> ($total_price + $shipping_cost) - $coupon_amount);

            return Response::json($coupon_plus);
        }
    
    }

    public function shippingMethod(Request $request){
        $Cart = Session::get('cart');
        $total_price =$Cart->totalPrice;
        $coupon_amount = Session::get('coupon_amount') ?? 0;    

        $shipping_cost = $_POST['shipping_cost'] ?? 0;
        Session::put('shipping',$shipping_cost);
        
        $shipping_plus = array('shipping_cost' => $shipping_cost, 
                               'total_price'=> ($total_price + $shipping_cost) - $coupon_amount);           
        return Response::json($shipping_plus);
    }

    public function ajaxPlaceOrder(Request $request){

        $cart = $_POST['cart'] ?? 0;
        $total_quantity = $_POST['total_quantity'] ?? 0; 
        $order_total = $_POST['order_total'] ?? 0; 
        $cart_array = array(
            'items' => $cart,
            'order' => null,
            'totalQty' => $total_quantity,
            'totalPrice'=> $order_total  );

        $order = new Order(); 
        $order->user_id = auth()->user() ? auth()->user()->id : 0; 
        $order->name = $_POST['name'] ?? 0;
        $order->address = $_POST['address'] ?? 0;
        $order->post_code = $_POST['post_code'] ?? 0;
        $order->cart = serialize($cart_array);
        $order->total_price = $order_total;
        $order->discount = 0;
        $order->shipping_cost = 0;
        $order->payment_id = 0;
        $order->save();

        foreach ($cart as $item) {
            $order_items = new OrderItems();
            $order_items->order_id = $order->id;
            $order_items->product_id = $item["item"]["id"];
            $order_items->price = $item["item"]["price"];
            $order_items->quantity = $item["qty"];
            $order_items->item_total = $item["item_total"];
            $order_items->save();
        }

        $message = 'Order Success';
        return Response::json($message);

    }

    public function addToCartProduct(Request $request, $id){
       
        $product = DB::table('products')->where('id',$id)->first();

        return Response::json($product);
    
    }
    
    public function createOrderCat(Request $request){
       
        if ($request->isMethod('post')) {
            $id = $_POST['id'] ?? 0;
            $products = DB::table('products')->where('category',$id)->get();
            // dd($products);

            return view('pages.createOrderCat', compact('products'));
      }
        
    }

    public function customerDetails(Request $request, $id){
        $customer= Customer::find($id);
        
        if($request->ajax()){
            return view('pages.customerDetails', compact('customer'));
        }

        return view('pages.customerDetails', compact('customer'));
    }

    public function shopProductsSorted(Request $request){
        $sortBy = null;
        $sortOrder = 'asc';
        $filter_sort = $_POST['filter_sort'] ?? '';
        $filterArr = [
            'sort_desc' => ['name', 'desc'],
            'sort_asc' => ['name', 'asc'],
            'price_asc' => ['price', 'asc'],
            'price_desc' => ['price', 'desc'],
            'id_desc' => ['id', 'desc'],
            'id_asc' => ['id', 'asc'],
        ];
        if (array_key_exists($filter_sort, $filterArr)) {
            $sortBy = $filterArr[$filter_sort][0];
            $sortOrder = $filterArr[$filter_sort][1];
        }

        if ($request->isMethod('post')) {
                $products = DB::table('products')->orderBy($sortBy,$sortOrder)->paginate(9);
                return view('pages.shopProductsSorted', compact('products'));
        }
        else {
                $products = DB::table('products')->paginate(9);
        }
           
        return view('pages.shopProductsSorted', compact('products'));
    }

    public function shopProductsByBrand(Request $request){
       
        if ($request->isMethod('post')) {
            $id = $_POST['id'] ?? 0;
            $products = DB::table('products')->where('brand',$id)->paginate(9);
            $brand = DB::table('brands')->where('id',$id)->first();
            // dd($brand->name);

            return view('pages.shopProductsByBrand', compact('products','brand'));
      }
        
        return view('pages.shopProductsByBrand', compact('products'));
    }
    public function shopProductsByCat(Request $request){
       
        if ($request->isMethod('post')) {
            $id = $_POST['id'] ?? 0;
            $products = DB::table('products')->where('category',$id)->paginate(9);
            $category = DB::table('categories')->where('id',$id)->first();

            return view('pages.shopProductsByCat', compact('products','category'));
      }
        
        return view('pages.shopProductsByCat', compact('products'));
    }

    public function ajaxRequest(){
      $id = $_POST['id'];
      $product = Customer::find($id);
      $msg = "This is a simple message.";

      return response()->json(array('product'=> $product), 200);
   }
}
