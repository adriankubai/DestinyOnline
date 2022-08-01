<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderby('created_at','desc')->get();
        $categories = Category::all();
        $set = rand(0,10000);
        session::put('frontsession',$set);

        return view('frontend.index',compact('products','categories','set'));
    }
    public function productdetials($id)
    {

        $detail_product=Product::find($id);
        $customers_reviews = \App\Review::where('product_id',$id)->get();
        $relatedProducts=Product::where([['id','!=',$id],['categories_id',$detail_product->categories_id]])->get();

//        $total_Stock=Product::findOrFail($id);
        return view('frontend.product_details',compact('detail_product','relatedProducts','customers_reviews'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shop()
    {
        $products=Product::all();
        $byCate="";
        return view('frontend.products',compact('products','byCate'));
    }

    public function create()
    {
        //
    }
    public function listbycategory($id)
    {
        $categories = Category::all();
        $list_products = Product::where('categories_id',$id)->get();
        $by_category = Category::select('name')->where('id',$id)->first();
        return view('frontend.products',compact('list_products','by_category','categories'));
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
