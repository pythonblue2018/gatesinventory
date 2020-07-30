<?php

namespace App\Http\Controllers;
use Session;
use App\User;
use App\Order;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

class UserController extends Controller
{	
	public function getSignin(){
                $categories = Category::where('parent_id',0)->get();

		return view('user.signin')->with([
        'categories' => $categories ]);
    }

	public function postSignin(Request $request){
 	    
    	if (Auth::attempt([
    		'email'=> $request->input('email'),
    		'password'=> $request->input('password')])){
            if (Session::has('oldUrl')){
                $oldUrl = Session::get('oldUrl');
                Session::forget('oldUrl');
                return redirect()->to($oldUrl);
                } 
            else{
			     return view('user.profile')->with(['user'=>auth()->user() ]);
                }
    		}
		return redirect()->route('user.signin');
	}

   public function getSignup(){

		return view('user.signup');
    }

    public function postSignup(Request $request){
 	    	// $this->validate($request, ['password'=>'required|min:4']);
    	$user = new User([
    		'name'=> $request->input('name'),
    		'email'=> $request->input('email'),
    		'password'=> bcrypt($request->input('password'))]);
    	$user->save();
		Auth::login($user);

		return redirect()->route('user.profile');
    }

    public function profile(){
        $order_count = Order::where('user_id',auth()->user()->id)->count();

		return view('user.profile')->with(['user'=>auth()->user(), 
            'order_count'=>$order_count ]);
    }

    public function logout(){
		Auth::logout();
		
		return view('user.signin');
    }

 }
