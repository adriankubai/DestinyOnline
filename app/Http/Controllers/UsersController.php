<?php

namespace App\Http\Controllers;

use App\Http\Middleware\FrontLogin;
use App\Profile_model;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
//    public function __construct(){
//        $this->middleware('guest')->except('logout');
//        return redirect('/');
//    }
    public function index(){
    return view('users.login_register');
}
    public function signin(){
        return view('users.login');
    }
    public function signup(){
        return view('users.register');
    }
    public function forgotpassword(){
        return view('users.forgot');
    }
    public function resetpassword(){


        return redirect('/');
    }
    public function register(Request $request){
        $this->validate($request,[
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|unique:users,email',
            'password'=>'required|min:6|confirmed',
        ]);
        $input_data= new User();
        $password=request('password');
        $input_data->password = Hash::make($password);
        $input_data->name=request('name');
        $input_data->email=request('email');
        $count = DB::table('users')->count('id');

        if ($count==0){
            $input_data['is_admin']=1;
        }
        $input_data->save();
        if ($input_data){

            Auth::login($input_data);
            Session::put('frontSession',$input_data['email']);
            return redirect('/')->with('message','Registered successfully!');
        }

    }
    public function login(Request $request){
        $input_data=$request->all();
        if(Auth::attempt(['email'=>$input_data['email'],'password'=>$input_data['password']])){
            Session::put('frontSession',$input_data['email']);
            return redirect('/');
        }else{
            return back()->with('message','Account is not Valid!');
        }
    }
    public function logout(){
        session::forget('session_id');
        Auth::logout();
        Session::forget('frontSession');
        return redirect('/');
    }
    public function account(){
        $countries=DB::table('countries')->get();
        $user_login=User::where('id',Auth::id())->first();
        return view('users.account',compact('countries','user_login'));
    }
    public function updateprofile(Request $request,$id){
        $this->validate($request,[
            'address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'mobile'=>'required',
        ]);
        $input_data=$request->all();
        DB::table('users')->where('id',$id)->update(['name'=>$input_data['name'],
            'address'=>$input_data['address'],
            'city'=>$input_data['city'],
            'state'=>$input_data['state'],
            'country'=>$input_data['country'],
            'pincode'=>$input_data['pincode'],
            'mobile'=>$input_data['mobile']]);
        return back()->with('message','Update Profile already!');

    }
    public function updatepassword(Request $request,$id){
        $oldPassword=User::where('id',$id)->first();
        $input_data=$request->all();
        if(Hash::check($input_data['password'],$oldPassword->password)){
            $this->validate($request,[
                'newPassword'=>'required|min:6|max:12|confirmed'
            ]);
            $new_pass=Hash::make($input_data['newPassword']);
            User::where('id',$id)->update(['password'=>$new_pass]);
            return back()->with('message','Password updated successfully!');
        }else{
            return back()->with('oldpassword','Old Password is Inconrrect!');
        }
    }


    public function customer(){

        return view('users.login');
    }

    public function customerloggedin(Request $request){
        $input_data=$request->all();


        if(Auth::attempt(['email'=>$input_data['email'],'password'=>$input_data['password']])){
            Session::put('frontSession',$input_data['email']);
            $item_id = request('item');
            return redirect('/product-detail/'.$item_id);
        }else{
            return back()->with('message','Account is not Valid!');
        }

    }
}
