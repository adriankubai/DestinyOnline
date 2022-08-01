<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $session_id=Session::get('frontSession');
        $cart_datas=Cart::where('session_id',$session_id)->get();
        $total_price=0;
        foreach ($cart_datas as $cart_data){
            $total_price+=$cart_data->price*$cart_data->quantity;
        }
        $shipping_address=DB::table('delivery_address')->where('users_id',Auth::id())->first();
        return view('frontend.checkout.review_order',compact('shipping_address','cart_datas','total_price'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function order(Request $request)
    {
        $input_data = new Order();

        $input_data->user_id = Auth::user()->id;
        $input_data->user_email = Auth::user()->email;
        $input_data->name = request('name');
        $input_data->address = request('address');
        $input_data->city = request('city');
        $input_data->country = request('country');
        $input_data->mobile = request('mobile');
        $input_data->coupon_code = request('coupon_code');
        $input_data->coupon_amount = request('coupon_amount');
        $input_data->order_status = request('order_status');
        $input_data->payment_method = request('payment_method');
        $input_data->grand_total = request('grand_total');
        $payment_method=$input_data->payment_method;


        $input_data->save();

        Session::put('new_order_total',request('grand_total'));
        Session::put('order_payment_method',request('payment_method'));
        if($payment_method=="COD"){
            return redirect('/cod');
        }else{
            return redirect('/paypal');
        }
    }
    public function cod()
    {
        $user_order=Order::where('user_id',Auth::id())->first();
        return view('frontend.payment.cod',compact('user_order'));
        Session::forget('frontsession');
    }
    public function paypal()
    {
        $order_totals = Session::get('new_order_total');
        $order_payment_method = Session::get('order_payment_method');

//        $who_buying = DB::table('orders')->where(['grand_total',$order_totals],['payment_method',$order_payment_method])->get();
        $who_buying = Order::where('grand_total',$order_totals && 'payment_method',$order_payment_method)->get();
        return view('frontend.payment.paypal',compact('who_buying'));
    }
    public function create()
    {
        //

//            export PATH="$PATH:/home/adrian/Development/flutter/bin"


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
    public function update(Request $request, $id)
    {
        //
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
