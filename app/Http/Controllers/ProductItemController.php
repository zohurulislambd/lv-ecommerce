<?php

namespace App\Http\Controllers;
use App\ProductImage;
use App\ProductItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Echo_;

class ProductItemController extends Controller
{
  /* public function index(){
        return view('backend/pages/product/index');
    }*/
    public function create(){
        return view('backend/pages/product/create');
    }
    public function store(Request $request){
       $this->validate($request,[
           'title'=>'required',
           'price'=>'required',
           'quantity'=>'required',
           'description'=>'required',
           'image'=>'required|mimes:jpeg,png,jpg,gif|max:2048',
       ]);
       $image = $request->file('image');
       $new_name = md5(time()).'.'. $image->getClientOriginalExtension();
       $image->move(public_path("images"), $new_name);
       ProductItem::create([
           'title' => $request->title,
           'price' => $request->price,
           'quantity' => $request->quantity,
           'description' => $request->description,
           'image' => $new_name
       ]);
       return back()->with('success', 'Image upload successfully');
    }


    /*public function edit(ProductItem $productItem){
       $data['edit'] = $productItem;
       return view('backend/pages/product/edit', $data);
    }*/
    public function edit(Request $id){
       $products = ProductItem:: find($id);
       return view('backend/pages/product/edit', compact('products', 'id'));
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'title'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'description'=>'required',
//            'image'=>'required'
        ]);
        $products = ProductItem::find($id);
        $products->title = $request->get('title');
        $products->price = $request->get('price');
        $products->quantity = $request->get('quantity');
        $products->description = $request->get('description');

        $products->save();
        /*$data =$request->all();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $data['image'] = md5(time().time().rand()).'.'.$image->getClientOriginalExtension();
            $destination = public_path('uploads/').$data['image'] ;
            @unlink(public_path('uploads/').$productItem->image);
            $image->move($destination, $data['image']);*/
//        $productItem->update($data);

        return redirect()->route('productItem')->with('success','Updated Successfull');
        }


    public function list(){
        $data['allProductItms'] =  ProductItem::all();
        return view('backend/pages/product/index',$data) ;
   /*  $data = ProductItem::all();
     echo "$data"*/;
    }

    public function delete(ProductItem $productItem){
        $productItem->delete;
        return view('',$data);
    }




}
