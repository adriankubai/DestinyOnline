<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Review;
use Faker\Provider\Image;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $menu_active=3;
        $i=0;
        $products=Product::orderBy('created_at','desc')->get();
        return view('backend.products.index',compact('menu_active','products','i'));
//        return view('frontend.layouts.category_menu',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu_active=3;
        $categories=Category::all()->pluck('name','id');
        return view('backend.products.create',compact('menu_active','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'p_name'=>'required',
            'p_code'=>'required',
            'p_colour'=>'required',
            'description'=>'required',
            'price'=>'required|numeric',
            'image'=>'required|image|mimes:png,jpg,jpeg|max:1000',
            'stock'=>'required|min:1',
        ]);
//dd($request->all());
        $product = new Product();
        $product->p_name = request('p_name');
        $product->categories_id = request('categories_id');
//        dd($product->categories_id);
        $product->p_code = request('p_code');
        $product->p_colour = request('p_colour');
        $product->description = request('description');
        $product->price = request('price');
        $product->stock = request('stock');
        $product->size = request('size');
        if($request->file('image')) {

            $image = $request->file('image');
            if ($image->isValid()){
                $fileName = $image->getClientOriginalName();


//                $image_resize = Image::make($image->getRealPath());
//                $image_resize->resize(300, 300);
//                $image_resize->move('products/small',$fileName);
                $image->move('products/images',$fileName);





                $product->image = $fileName;
            }
        }
        $product->save();
        return redirect()->route('products_index')->with('message','Product added successfully');
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
    public function reviews(Request $request)
    {
        //validating the request
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required | email',
            'review'=>'required | min:5'
        ]);
        //create the request
        $customer_review = new Review();

        $customer_review->product_id = request('product_id');
        $customer_review->name = request('name');
        $customer_review->email = request('email');
        $customer_review->review = request('review');
        //save

        $customer_review->save();
        //redirect
        return redirect()->back()->with('message','Thanks for your review we appreciate you for being a good customer');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu_active=3;
        $categories = Category::all()->pluck('name','id');
        $product = Product::findOrFail($id);
        $category=Category::findOrFail($product->categories_id);
        return view('backend.products.edit',compact('product','menu_active','categories','category'));
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



        $updated_product = Product::where('id',$id);
        $this->validate($request,[
            'p_name'=>'required|min:5',
            'p_code'=>'required',
            'p_color'=>'required',
            'description'=>'required',
            'price'=>'required|numeric',
            'image'=>'image|mimes:png,jpg,jpeg|max:1000',
        ]);
//        dd('asdfghjkl;');
        $updated_product->p_name = request('p_name');
        $updated_product->p_colour = request('p_colour');
        $updated_product->p_code = request('p_code');
        $updated_product->price = request('price');
        $updated_product->description = request('description');
        $updated_product->categories_id = request('categories_id');

        if ($request->file('image')){

            $image = $request->file('image');
            if($image->isValid()){
                $file_name = $image->getClientOriginalName();
                dd($file_name);
            }

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
