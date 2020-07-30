<?php

namespace App\Http\Controllers;

use App\Product;
use App\Order;
use App\OrderItems;
use App\Purchase;
use App\PurchaseItems;
use App\Customer;
use App\Category;
use App\Brand;
use App\Supplier;
use App\Account;
use App\Coupon;
use App\Wishlist;
use App\ProductAttribute;
use App\OrderTrack;
use Illuminate\Http\Request;
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

class PagesController extends Controller
{
    public function accounts(){
        
        $accounts = Account::all();

        return view('pages.accounts')->with([
        'accounts' => $accounts ]);
    }


    public function printInvoiceConfirmed(Request $request, $id)    {
        $order = Order::find($id);    
        $order_items = DB::table('order_items')->where('order_id',$id)->get();
        $products = Product::all();

        $order_products = 
            DB::table('products')
            ->select('products.*','order_items.*')
            ->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->where('order_id',$id)
            ->get();


        return view('pages.printInvoice2')->with([
            'order' => $order, 
            'products'=>$products, 
            'order_items'=> $order_items,
            'order_products' => $order_products ]);
    }
    public function printPo(Request $request, $id)    {
        $purchase = Purchase::find($id);    
        $purchase_items = DB::table('purchase_items')->where('purchase_id',$id)->get();
        $products = Product::all();

        $purchase_products = 
            DB::table('products')
            ->select('products.*','purchase_items.*')
            ->join('purchase_items', 'products.id', '=', 'purchase_items.product_id')
            ->where('purchase_id',$id)
            ->get();


        return view('pages.printPo')->with([
            'order' => $purchase, 
            'products'=>$products, 
            'order_items'=> $purchase_items,
            'order_products' => $purchase_products ]);
    }
    
    public function printInvoice(Request $request, $id)    {
        $order = Order::find($id);    
        $order_items = DB::table('order_items')->where('order_id',$id)->get();
        $products = Product::all();

        $order_products = 
            DB::table('products')
            ->select('products.*','order_items.*')
            ->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->where('order_id',$id)
            ->get();


        return view('pages.printInvoice')->with([
            'order' => $order, 
            'products'=>$products, 
            'order_items'=> $order_items,
            'order_products' => $order_products ]);
    }

    public function test()    {
      $categories = Category::all();    

       return view('pages.test')->with([
        'categories'=>$categories ]);
    }
    public function suppliers(){
        $suppliers = Supplier::all();

        return view('pages.suppliers')->with([
        'suppliers' => $suppliers ]);
    }
    public function coupons(){
        $coupons = Coupon::all();

        return view('pages.coupons')->with([
        'coupons' => $coupons ]);
    }

    public function addPurchase(){
        $users = User::all();
        $products = Product::all();
        $categories = Category::all();    
        
        return view('pages.addPurchase')->with([
        'users' => $users, 'categories'=>$categories, 'products' => $products ]);
    }

    public function addSale(){
        $users = User::all();
        $products = Product::all();
        $categories = Category::all();
        $customers = Customer::all();
        $invoiceDate = date('d-m-Y');  
        $invoiceNumber = Order::latest()->first();
        $invoiceNumber = $invoiceNumber->id + 1;

        return view('pages.addSale')->with([
        'users' => $users, 'categories'=>$categories, 'products' => $products, 'invoiceDate'=>$invoiceDate, 
            'invoiceNumber'=> $invoiceNumber, 'customers'=>$customers ]);
    }
    
    public function postUserRoles(Request $request,$id){
        $users = User::find($id);
        $user_type = $request->input('user_type');
        $users->admin = $user_type;
        $users->update();

        // dd($user_type);

        return redirect()->back();
    }
    public function userRoles(){
        $users = User::all();
    
        return view('pages.userRoles')->with([
        'users' => $users ]);
    }

    public function editProduct( $id){
        $products = Product::all();
        $product = Product::find($id);
        $category = Category::find($product->category);
        // dd($category->name);

        $categories = Category::all();

        return view('pages.editProduct')->with([
        'product' => $product, 'products' => $products,
        'categories'=> $categories,
        'catName' =>  $category->name ?? '' ]);        
    }
    public function categoryEdit(Request $request, $id){
        $category = Category::find($id);
        $categories = Category::all();
        
        if ($request->isMethod('post')) {
            $parent_id = $request->categories_id ?? 0;
            $category->parent_id = $parent_id; 
            $category->name = $request->input('name');
            $category->details = $request->input('details');        
            $category->update();

            return redirect()->route('admin.categories');
        }
        return view('pages.categoryEdit')->with([
        'categories'=> $categories,
        'category'=> $category,
        'catName' =>  $category->name ?? '' ]);        
    }

    public function postEditProduct(Request $request,$id){
        $categories = Category::all();
        $product = Product::find($id);

        $product->name = $request->input('product_name');
        if($request->input('product_category')!==null){
            $product->category = $request->input('product_category');}
        $product->details = $request->input('product_details');
        $product->description = $request->input('product_description');
        $product->slug = $request->input('product_name');
        $product->price = $request->input('product_price');
        $product->quantity = $request->input('product_quantity');
        $product->brand = $request->input('product_brand');  
        
        if($request->input('product_image')!==null){
        $product->image = 'products/'.$request->input('product_image');}
        if($request->input('product_image2')!==null){
            $product->image2 = 'products/'.$request->input('product_image2');}
        if($request->input('product_image3')!==null){
            $product->image3 = 'products/'.$request->input('product_image3');}
        if($request->input('product_image4')!==null){
            $product->image4 = 'products/'.$request->input('product_image4');}

        // dd($product);      
        $product->update();

        return redirect()->route('admin.products')->with([
            'product' => $product,
            'categories'=> $categories,
            'catName' =>  $catName = 'all' ]);
    }

    public function postAddNewProduct(Request $request){
        $categories = Category::all();
        $products = DB::table('products')->paginate(10);    

        $product = new Product(); 
        $product->name = $request->input('product_name');
        $product->category = $request->input('product_category');
        $product->details = $request->input('product_details');
        $product->description = $request->input('product_description');
        $product->slug = $request->input('product_name');
        $product->price = $request->input('product_price');
        $product->quantity = $request->input('product_quantity');
        $product->image = 'products/'.$request->input('product_image');
        if($request->input('product_image2')!==null){
            $product->image2 = 'products/'.$request->input('product_image');}
        if($request->input('product_image3')!==null){
            $product->image3 = 'products/'.$request->input('product_image');}
        if($request->input('product_image4')!==null){
            $product->image4 = 'products/'.$request->input('product_image');}

        $product->brand = $request->input('product_brand');  

        // dd($product);      
        $product->save();

        return redirect()->route('admin.products')->with([
            'products' => $products,'categories'=> $categories,
            'catName' =>  $catName = 'all' ]);
    }
    
    public function removeFromOrder($order_id, $product_id){
        $product = Product::where('id',$product_id)->first()->toArray();
        $order = Order::find($order_id);
        $cart_items = unserialize($order->cart);
        // dd($product);
        
       foreach ($cart_items['items'] as $item) {
          if($item['item']['id'] == $product_id){
            $index = array_search($item, $cart_items['items']);
            }         
        }    

       if(isset($index)){
        $quantity = $cart_items['items'][$index]['qty'];
        unset($cart_items['items'][$index]);
        
        $cart_items['totalQty'] -= $quantity; 
        $cart_items['totalPrice'] -= $product['price'] * $quantity; 

        $updated_items = $cart_items;
        $new_order_total = $order->total_price - $product['price'] * $quantity;
                
        DB::table('orders')
                ->where('id', $order_id)
                ->update(['cart' => serialize($updated_items)]);
        DB::table('orders')
                ->where('id', $order_id)
                ->update(['total_price' => $new_order_total ]);

        return redirect()->back();
        } //END IF

        // dd('DOESNT EXISTS !');  
        return redirect()->back();

    }

    // ADD TO ORDER
    public function addToOrder(Request $request, $order_id){
        $product_id = $request->input('product_id');
        $q = $request->input('quantity');
        $item = Product::where('id',$product_id)->first()->toArray();
        $order = Order::find($order_id);
        $cart_items = unserialize($order->cart);
        // dd($cart_items['items']);

        $number = count($cart_items['items'])+1;
        $product = array( $number => 
                   array("qty" => $q, "price" => $item['price'], "item" => $item));
        
       foreach ($cart_items['items'] as $cart_i) {
          if($cart_i['item']['id'] == $product_id){
            $index = array_search($cart_i, $cart_items['items']);
            }         
        }    
        // dd(isset($index));  

       if(isset($index)){       
        $cart_items['totalQty'] += $q; 
        $cart_items['totalPrice'] += ($item['price']*$q); 
        $cart_items['items'][$index]['qty'] +=$q;
        
        $updated_items = $cart_items;
        $new_order_total = $order->total_price + ($item['price']*$q);
        // dd($$cart_items['items'][$index]);
                
        DB::table('orders')
                ->where('id', $order_id)
                ->update(['cart' => serialize($updated_items)]);
        DB::table('orders')
                ->where('id', $order_id)
                ->update(['total_price' => $new_order_total ]);

        return redirect()->back();
        } 
        //END IF
        
        $cart_items['items'] = array_merge($cart_items['items'],$product); 
        $cart_items['totalQty'] += $q; 
        $cart_items['totalPrice'] += ($item['price']*$q); 
        
        $updated_items = $cart_items;
        $new_order_total = $order->total_price + ($item['price']*$q);

        // dd($updated_items);
                
        DB::table('orders')
                ->where('id', $order_id)
                ->update(['cart' => serialize($updated_items)]);
        DB::table('orders')
                ->where('id', $order_id)
                ->update(['total_price' => $new_order_total ]);

        return redirect()->back();

    }
    public function orderEdit($id){
        $order_items = DB::table('order_items')->where('order_id',$id)->get();
        // dd($order_items);
        $order_products = 
            DB::table('products')
            ->select('products.*','order_items.*')
            ->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->where('order_id',$id)
            ->get();

        $products = Product::all();
        $order = Order::find($id);
        $item = $order->cart;
        $items = unserialize($item);
        // dd($items['items']);

        return view('pages.orderEdit')->with([
            'order' => $order, 'items'=> $items,
            'products'=>$products, 
            'order_items'=> $order_items,
            'order_products' => $order_products ]);
    }    
    
     public function orderView($id){
        $order_items = DB::table('order_items')->where('order_id',$id)->get();
        // dd($order_items);
        $order_products = 
            DB::table('products')
            ->select('products.*','order_items.*')
            ->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->where('order_id',$id)
            ->get();

        $products = Product::all();
        $order = Order::find($id);

        return view('pages.orderView')->with([
            'order' => $order, 
            'products'=>$products, 
            'order_items'=> $order_items,
            'order_products' => $order_products ]);
    }

    public function orderTrack(Request $request){
        
        $order_track = new OrderTrack(); 

        $order_track->order_id = $request->input('order_id');
        $order_track->status = $request->input('order_status');       
        $order_track->comments = $request->input('comments');       
        $order_track->save();

        return redirect()->back();
    }

    public function myOrders(){
        $orders = Order::where('user_id',auth()->user()->id)->get();
        $order_count = Order::where('user_id',auth()->user()->id)->count();
    
        return view('user.myOrders')->with([
        'orders' => $orders,'order_count'=>$order_count ]);
    }
    public function myWishlist(){
        $wishlist_items = 
        
        DB::table('products')
            ->join('wishlists', 'products.id', '=', 'wishlists.product_id')
            ->where('user_id',auth()->user()->id)
            ->get();

        // Wishlist::where('user_id',auth()->user()->id)->lists('id');
        // dd($wishlist_items);
        // $products = Product::where('id',$wishlist_items)->get();
        // dd($products);
        $categories = Category::where('parent_id',0)->get();
        $orders = Order::where('user_id',auth()->user()->id)->get();
        $order_count = Order::where('user_id',auth()->user()->id)->count();
    
        return view('user.myWishlist')->with([
        'categories'=> $categories,
        'orders' => $orders,
        'order_count'=>$order_count,
        'products'=> $wishlist_items ]);
    }
public function shopAddToWishlist($add_id){
        $wishlist_all = DB::table('wishlists')
            ->where('product_id',$add_id)
            ->where('user_id', auth()->user()->id)
            ->exists();
            
        if($wishlist_all==true){
            dd("Exists",$add_id);
        }
        else{
        $wishlist = new Wishlist(); 
        $wishlist->user_id = auth()->user() ? auth()->user()->id : 0;
        $wishlist->product_id = $add_id;       
        $wishlist->save();
        }

        return redirect()->back();
    }
    public function deleteFromWishlist($del_id){
        // dd($del_id);
        $wishlist_all = DB::table('wishlists')
            ->where('user_id', auth()->user()->id)
            ->where('product_id',$del_id)
            ->delete();
        

        return redirect()->back();
    }

    public function shopLogin(){
         $products = Product::all();
        // $categories = Category::all();
        $categories = Category::where('parent_id',0)->get();
        $categoriesSub = Category::where('parent_id','>',0)->get();
        $products3 = Product::where('category',3)->limit(3)->get();

        return view('pages.shopLogin')->with([
            'products' => $products,
            'products3' => $products3,
            'categories' => $categories,
            'categoriesSub'=> $categoriesSub ]);
    }
    
    public function shopHome(){
        // $products = Product::all();
        $products = DB::table('products')->paginate(6);
        // $categories = Category::all();
        $categories = Category::where('parent_id',0)->get();
        $categoriesSub = Category::where('parent_id','>',0)->get();
        $products3 = Product::where('category',3)->limit(3)->get();
        $brands = Brand::all();
        // dd($brands);

        return view('pages.shopHome')->with([
            'products' => $products,
            'products3' => $products3,
            'categories' => $categories,
            'categoriesSub'=> $categoriesSub,
            'brands'=> $brands ]);
    }
        
    public function shopCategories(Request $request){
        
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
            $products = DB::table('products')->orderBy($sortBy,$sortOrder)->paginate(12);
            return view('pages.shopProductsSorted', compact('products'));
      }
      else {
            $products = DB::table('products')->paginate(12);
      }
        // Product::all();
        // $categories = Category::all();
        $categories = Category::where('parent_id',0)->get();
        $categoriesSub = Category::where('parent_id','>',0)->get();
        $products3 = Product::where('category',3)->limit(3)->get();
        $brands = Brand::all();

        return view('pages.shopCategories')->with([
            'products' => $products,
            'products3' => $products3,
            'categories' => $categories,
            'categoriesSub'=> $categoriesSub,
            'filter_sort' => $filter_sort,
            'brands'=> $brands ]);

    }
    public function shopProducts(Request $request){
        
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
            $products = DB::table('products')->orderBy($sortBy,$sortOrder)->paginate(12);
            return view('pages.shopProductsSorted', compact('products'));
      }
      else {
            $products = DB::table('products')->paginate(12);
      }
        // Product::all();
        // $categories = Category::all();
        $categories = Category::where('parent_id',0)->get();
        $categoriesSub = Category::where('parent_id','>',0)->get();
        $products3 = Product::where('category',3)->limit(3)->get();
        $brands = Brand::all();

        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart_qty = 0;

        if($cart->items != null){
            $cart_item_quantity = count($cart->items) ?? 0;
     
        foreach($cart->items as $item)
            $cart_qty += $item["qty"];        
        // dd($cart_qty);
        }
        return view('pages.shopProducts')->with([
            'products' => $products,
            'products3' => $products3,
            'categories' => $categories,
            'categoriesSub'=> $categoriesSub,
            'filter_sort' => $filter_sort,
            'brands'=> $brands,
            'cart_qty'=>$cart_qty ]);

    }
    public function shopProductView(Request $request, $id){
        $product= Product::find($id);
        $product->view += 1;
        // $product->date_lastview = date('Y-m-d H:i:s');
        $product->save();

        $category = Category::find($product->category);
        $products = Product::where('category',$category->id)->limit(4)->get();
        $categories = Category::where('parent_id',0)->get();
        $categoriesSub = Category::where('parent_id','>',0)->get();
        $products3 = Product::where('category',3)->limit(3)->get();

        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);

        if(Session::has('cart') and isset( $cart->items)){
            if(array_key_exists($id, $cart->items)){
                    $cart_item_qty = $cart->items[$id]['qty'];}
            else {
                $cart_item_qty = 0; }
            }
        else {  $cart_item_qty = 0; 
        }
        $product_attribute = ProductAttribute::select('name','attribute_group')->where('product_id',$id)->get();

        $cart_qty = 0;

        if($cart->items != null){
            $cart_item_quantity = count($cart->items) ?? 0;
     
        foreach($cart->items as $item)
            $cart_qty += $item["qty"];        
        }

        return view('pages.shopProductView')->with([
        'product' => $product, 'category'=>$category,
        'products3' => $products3,
        'products'=> $products, 'cart_item_qty' => $cart_item_qty,
        'categories' => $categories,'categoriesSub'=> $categoriesSub,
        'product_attribute'=>$product_attribute,
        'cart_qty'=>$cart_qty  ]);
    }

    public function brands(){
        $products = Product::all();    
        $brands = Brand::all();

        return view('pages.brands')->with([
            'products' => $products,'brands'=> $brands ]);
    }
    public function categories(){
        $products = Product::all();    
        $categories = Category::all();

        return view('pages.categories')->with([
            'products' => $products,'categories'=> $categories,
            'catName' =>  $catName = 'all' ]);
    }

    public function addNewCategory(){       

        $categories = Category::all();

        return view('pages.addNewCategory')->with([
            'categories'=> $categories,
            'catName' =>  $catName = 'all']);
    }



    public function postAddNewCategory(Request $request){
        $categories = Category::all();

        $parent_id = $request->categories_id;
         // ? $request->categories_id : 0;
        // dd($parent_id);
        $category = new Category(); 
        $category->parent_id = $parent_id ?? 0; 
        $category->name = $request->input('name');
        $category->details = $request->input('details');        
        $category->save();

        return redirect()->route('admin.category');
    }

    public function deleteOrder($id){
        $orders = Order::all();
        $order = Order::find($id);
        $order->active = 0;
        $order->update();

        return redirect()->back()->with([
            'orders' => $orders ]);
    }

    public function index(){
        $orders = Order::where('order_status', 'New Order')->count(); 
        $users = User::all()->count();
        $orders_total = Order::all()->sum('total_price');
        $order_monthly = Order::where('created_at','>', \Carbon\Carbon::now()->subDays(14))->sum('total_price'); 

        return view('index')->with([
            'orders' => $orders,
            'orders_total' => $orders_total,
            'users'=> $users,
            'order_monthly' => $order_monthly ]);
    }
    public function emptydashboard(){
        return view('layouts.base');
    }

    public function home(){
        $products = Product::all();

        return view('pages.home')->with([
            'products' => $products ]);
    }
    public function shop(){
        $products = Product::all();
        $products = Product::all();
    
        $categories = Category::all();

     
        return view('pages.shop')->with([
            'products' => $products,'categories'=> $categories,
            'catName' =>  $catName = 'all' ]);

    }
    public function products(){
        $products = DB::table('products')->paginate(10);    
        $categories = Category::all();

        return view('pages.products')->with([
            'products' => $products,'categories'=> $categories,
            'catName' =>  $catName = 'all' ]);
    }


    public function productsCat(Request $request){
        $categories = Category::all();
        $categories_id = $request->categories_id;
        if($categories_id !== null){ 
            $request->session()->put('cat_id',$categories_id); }

        $catName = 'all';
        if($categories_id==100){
            $products = DB::table('products')->paginate(10);  
        }
        else{
            $cat_id = $request->session()->get('cat_id');
            $products = DB::table('products')
                    ->where('category',$cat_id)->paginate(5);
            $cat = Category::where('id',$cat_id)->first();
            $catName = $cat->name;
        } 
        return view('pages.products')->with([
            'products' => $products,
            'categories'=> $categories, 
            'catName'=>$catName ]);
    }

     public function shopProductCat($id){
        $filter_sort = request('filter_sort') ?? '';

        $cat = Category::where('parent_id',$id)->get();
        // dd($cat);                      
        $products = DB::table('products')->where('category',$id)->paginate(9);
      

        // for ($x = 0; $x < $count; $x++) 
        $categories = Category::where('parent_id',0)->get();
        $categoriesSub = Category::where('parent_id','>',0)->get();
        $products3 = Product::where('category',$id)->limit(3)->get();
        $brands = Brand::all();
        
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart_qty = 0;

        if($cart->items != null){
            $cart_item_quantity = count($cart->items) ?? 0;
                
        foreach($cart->items as $item)
            $cart_qty += $item["qty"];    
        }
        return view('pages.shopProducts')->with([
            'products' => $products,
            'products3' => $products3,
            'categories' => $categories,
            'categoriesSub'=> $categoriesSub,
            'filter_sort'=> $filter_sort,
            'brands'=> $brands,
            'cart_qty'=> $cart_qty ]);            
     }

    public function shopCat(Request $request){
        $categories = Category::all();
        $categories_id = $request->categories_id;
        $catName = 'all';
        if($categories_id==100){
            $products = Product::all();   
        }
        else{
            $products = Product::where('category',$categories_id)->get();
            $catName = Category::find($categories_id)->name;
        } 

        return view('pages.shop')->with([
        'products' => $products,
        'categories'=> $categories, 
        'catName'=>$catName ]);
    }
    public function productView(Request $request, $id){
        $product= Product::find($id);
        $product->view += 1;
        $product->save();
        $category = Category::find($product->category);
        $products = Product::where('category',$category->id)->limit(4)->get();

        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        // dd($cart->items);
        if(isset($cart->items)){
            if(array_key_exists($id, $cart->items)){
                    $cart_item_qty = $cart->items[$id]['qty'];}
            else {
                $cart_item_qty = 0; }
        }
        else {
            $cart_item_qty = 0; }

        return view('pages.productView')->with([
        'product' => $product, 'category'=>$category, 
        'products'=> $products, 'cart_item_qty' => $cart_item_qty  ]);
    }
    
    public function productEdit($id){
        $product= Product::find($id);
        $category = Category::find($product->category);
        $products = Product::where('category',$category->id)->limit(4)->get();


        return view('pages.productEdit')->with([
        'product' => $product, 'category'=>$category, 
        'products'=> $products ]);
    }

    public function addNewProduct(){
        $products = Product::all();
        $categories = Category::all();
        return view('pages.addNewProduct')->with([
        'products' => $products,
        'categories'=> $categories,
        'catName' =>  $catName = 'all' ]);
    }
    public function purchases(){
        $purchases = Purchase::all()->where('active', 1)->sortByDesc('id');
    
        return view('pages.purchases')->with([
        'purchases' => $purchases ]);
    }
public function purchaseView($id){
        $order_items = DB::table('purchase_items')->where('purchase_id',$id)->get();
        // dd($order_items);
        $order_products = 
            DB::table('products')
            ->select('products.*','purchase_items.*')
            ->join('purchase_items', 'products.id', '=', 'purchase_items.product_id')
            ->where('purchase_id',$id)
            ->get();

        $products = Product::all();
        $order = Purchase::find($id);

        return view('pages.purchaseView')->with([
            'order' => $order, 
            'products'=>$products, 
            'order_items'=> $order_items,
            'order_products' => $order_products ]);
    }
    public function orders(){
        $orders = Order::all()->where('active', 1)->sortByDesc('id');
        $customers = Customer::all();

        return view('pages.orders')->with([
        'orders' => $orders, 'customers'=>$customers ]);
    }

    
    public function customers(){
        $customers = Customer::all();
    
        return view('pages.customers')->with([
        'customers' => $customers ]);
    }

    public function customerView(Request $request, $id){
        $customer= Customer::find($id);
                
        return view('pages.customerView')->with(['customer' => $customer ]);
    }
    public function customerEdit($id){
        $customer= Customer::find($id);
    
    return view('pages.editCustomer')->with([
        'customer' => $customer ]);
    }

    public function about(){


        return view('pages.about');
    }
    public function contact(){
        return view('pages.contact');
    }
}
