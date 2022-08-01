<?php

namespace App\Http\Controllers;


use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//public function __construct()
//{
//$this->middleware('frontLogin');
//}

    public function index()
    {

        $session_id=Session::get('frontSession');
        $cart_datas=Cart::where('session_id',$session_id)->get();

        $total_price=0;
        foreach ($cart_datas as $cart_data){
            $image_products = Product::where('id',$cart_data->products_id)->get();
            $total_price+=$cart_data->price*$cart_data->quantity;
        }
        return view('frontend.cart',compact('cart_datas','total_price','image_products'));
    }


    public function addToCart(Request $request)
    {

    $checkUser = auth()->user();
    if ($checkUser){

        $loggedInUser = auth()->user()->email;
        session::put('frontSession',$loggedInUser);
        $sessionId = session::get('frontSession',null);
        if ($sessionId!=null){
//            dd('success '.$sessionId);
            $inputToCart= new Cart();

            Session::forget('discount_amount_price');
            Session::forget('coupon_code');


            $inputToCart->product_id = request('product_id');
            $inputToCart->product_name = request('product_name');
            $inputToCart->product_code = request('product_code');
            $inputToCart->product_colour = request('product_colour');
            $inputToCart->price = request('price');
            $inputToCart->quantity = request('quantity');
            $inputToCart->size = request('size');
            $stock = request('stock');
            $inputToCart->image = request('image');
            $inputToCart->session_id = session::get('frontSession',null);
            $inputToCart->user_email=auth()->user()->email;



            if($inputToCart->size==""){
                $inputToCart->size=null;
            }



            if($stock>=$inputToCart->quantity){
                $count_duplicateItems=Cart::where(['product_id'=>$inputToCart->product_id,
                    'product_colour'=>$inputToCart->product_colour,
                    'size'=>$inputToCart->size,'session_id'=>$inputToCart->session_id])->count();
                if($count_duplicateItems>0){
                    return back()->with('message','This Item  already exists in your cart');
                }else{
                    $inputToCart->save();
                    return redirect('/viewcart')->with('message','Item Added To Cart Already');
                }
            }else{
                return redirect()->back()->with('message','Stock is not Available!');
            }


        }else{
            dd('no session set');
        }

    }else{

        $item = request('product_id');

        return view('/users.login',compact('item'));


//        $msg = 'Please <a href="'. route('user_login') . '"> login </a> to proceed!!';
//        return redirect()->back()->with('message',$msg);

//        $set = rand(1000,1000000);
//        session::put('cartdata',$set);
//        $sessionId = session::get('cartdata',null);
//        if ($sessionId!=null){
////            dd('success '.$sessionId);
//
//        }else{
//            dd('no session set');
//        }
    }



    }

    public function deleteItem($id=null)
    {
        $delete_item=Cart::findOrFail($id);

        Session::forget('discount_amount_price');
        Session::forget('coupon_code');
        $delete_item->delete();
        return back()->with('message','Deleted Success!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request, $id)
    {
        $update_item=Cart::findOrFail($id);
        $item_id = $update_item->id;
        $res = DB::table('carts')->where('id',$item_id)->increment('quantity',1);
        if ($res){
            return redirect()->back();
        }

    }
    public function remove(Request $request, $id)
    {
        $update_item=Cart::findOrFail($id);
        $item_id = $update_item->id;
        $res = DB::table('carts')->where('id',$item_id)->decrement('quantity',1);
        if ($res){
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
