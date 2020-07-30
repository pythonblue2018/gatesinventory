<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Order;
use App\Customer;
use App\Category;
use App\Brand;
use App\Wishlist;
use App\ProductAttribute;
use App\OrderTrack;
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

class AdminController extends Controller
{
    public function createOrder(){
        $products = Product::all();
        $categories = Category::all();

        return view('pages.createOrder')->with([
            'products' => $products,
            'categories'=> $categories ]);
    }
}
