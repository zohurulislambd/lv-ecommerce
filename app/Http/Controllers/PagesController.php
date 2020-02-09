<?php

namespace App\Http\Controllers;


use App\ProductItem;
use Illuminate\Http\Request;
use Validator;
use App\Http;

class PagesController extends Controller
{


    public function index()
    {
        return view('frontend.pages.index');
    }

    public function contact()
    {
        return view('frontend.pages/contact');
    }

    public function about()
    {
        return view('frontend.pages/about');
    }

// products ///this portion helped from Asif
  /*  public function products(products $products)
    {
        // return Products::findorfail($products)->with('ProductImages')->get();
        // return $products->id;
        $data['allProducts'] = Products::with('productImages')
            ->where('id', $products->id)
            ->get();
//        return $data;
        return view('pages.products.index',$data);
    }*/
  //get all products
public function products(){
    $products = ProductItem::orderBy('id', 'desc')->get();
    return view('frontend.pages.products.index')->with('ProductItem',$products);
}

//get a signle product
public function shop()
    {
        return view('frontend.pages/shop');

    }
//============================================================================================
    //basic pactice code
    public function basic(){
        $data = [];
        $data['day'] = "Friday";
        return view('frontend.pages.basic',$data);
    }
//    register / signup form /file uploading system
public function registerForm(){
    return view('frontend.pages.register');
}
public function processRegistration(Request $request){
    /*$this->validate($request,[
     'email'=>'required|email',
     'password'=>'required|min:6'
    ]);*/
   $validator= validator::make($request-> all(),[
       'email'=>'required|email',
       'password'=>'required|min:6',
        'photo' => 'required|image|max:10240',
       ]);
    if ($validator->fails()){
        return redirect()->back()->withErrors($validator)->withInput();
    }
  $photo = $request->file('photo');//var_dump;die()
    $file_name = uniqid('photo_',true).str_random(10).'.'.$photo->getClientOriginalExtension();

    if ($photo->isValid()){
        $photo->storeAs('images',$file_name);
    }
    session()->flash('message','Registration successful!');
   return redirect()->back();
}

}
