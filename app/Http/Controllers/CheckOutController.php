<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $countries=DB::table('countries')->get();
        $user_login=User::where('id',Auth::id())->first();
        return view('frontend.checkout.index',compact('user_login','countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function submitcheckout(Request $request)
    {
        $this->validate($request,[
            'billing_name'=>'required',
            'billing_address'=>'required',
            'billing_city'=>'required',
            'billing_state'=>'required',
            'billing_pincode'=>'required',
            'billing_mobile'=>'required',
            'shipping_name'=>'required',
            'shipping_address'=>'required',
            'shipping_city'=>'required',
            'shipping_state'=>'required',
            'shipping_pincode'=>'required',
            'shipping_mobile'=>'required',
        ]);
        $input_data=$request->all();
        $count_shippingaddress=DB::table('delivery_address')->where('users_id',Auth::id())->count();
        if($count_shippingaddress==1){
            DB::table('delivery_address')->where('users_id',Auth::id())->update(['name'=>$input_data['shipping_name'],
                'address'=>$input_data['shipping_address'],
                'city'=>$input_data['shipping_city'],
                'state'=>$input_data['shipping_state'],
                'country'=>$input_data['shipping_country'],
                'pincode'=>$input_data['shipping_pincode'],
                'mobile'=>$input_data['shipping_mobile']]);
        }else{
            DB::table('delivery_address')->insert(['users_id'=>Auth::id(),
                'users_email'=>Session::get('frontSession'),
                'name'=>$input_data['shipping_name'],
                'address'=>$input_data['shipping_address'],
                'city'=>$input_data['shipping_city'],
                'state'=>$input_data['shipping_state'],
                'country'=>$input_data['shipping_country'],
                'pincode'=>$input_data['shipping_pincode'],
                'mobile'=>$input_data['shipping_mobile'],]);
        }
        DB::table('users')->where('id',Auth::id())->update(['name'=>$input_data['billing_name'],
            'address'=>$input_data['billing_address'],
            'city'=>$input_data['billing_city'],
            'state'=>$input_data['billing_state'],
            'country'=>$input_data['billing_country'],
            'pincode'=>$input_data['billing_pincode'],
            'mobile'=>$input_data['billing_mobile']]);
        return redirect('/order-review');
    }
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
