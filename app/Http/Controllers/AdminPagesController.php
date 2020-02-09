<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Product;

class AdminPagesController extends Controller
{
    public function index()
    {
       return view('backend.index');
    }

    public function product()
    {
        return view('backend.pages.product.index');
    }

    public function create()
    {
        return view('backend.pages.product.create');
    }

    public function store(Request $request)
    {
        //$product  = new Products();
        $product_name = $request->title;
        $product_price = $request->price;
        $product_quantity = $request->qty;
        Product::insert([
            'title' => $product_name,
            'price' => $product_price,
            'quantity' => $product_quantity
        ]);
        return back()->with('success', 'Insert success');

//        $product->description = $request->description;
//        $product->offer_price=$request->offer_price;
//        $product->slug = str_slug($request->title);
//        $product->category_id = 1;
//        $product->brnad_id= 1;
//        $product->admin_id= 1;
//        $product->save();
//        return redirect()->route('admin.product.create');
//        print_r($request->input());
//        redirect('admin.pages.product.create');
    }

}
