<?php

namespace App\Http\Controllers;
use App\ProductItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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
       $request->validate([
           'title'=>'required',
           'price'=>'required',
           'quantity'=>'required',
           'description'=>'required',
           'image'=> 'required'
       ]);
       $data = $request->all();

      /* $product_title = $request->input('title');
       $product_price = $request->input('price');
       $product_qty = $request->input('qty');
       $product_desc = $request->input('description');
       ProductItem::insert([
           'title'=> $product_title,
           'price' => $product_price,
           'quantity' =>$product_qty,
           'description' =>$product_desc,
           'created_at' =>Carbon::now()
       ]);*/
    if ($request->hasFile('image')){
        $image = $request->file('image');
        $data['image'] = md5(time().rand()).'.'.$image->getClientOriginalExtension();
        $destination = public_path('uploads/').$data['image'];
        $image->move($destination,$data['image']);
    }
//    dd($request->all());
    ProductItem::create($data);
       return redirect::to(route('productItem'))->with('success', "insert successfully");
    }


    public function edit(ProductItem $productItem){
       $data['edit'] = $productItem;
       return view('', $data);
    }
    public function update(ProductItem $productItem){
        $request->validate([
            'title'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'description'=>'required',
            'image'=>'required'
        ]);

        $data =$request->all();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $data['image'] = md5(time().time().rand()).'.'.$image->getClientOriginalExtension();
            $destination = public_path('uploads/').$data['image'] ;
            @unlink(public_path('uploads/').$productItem->image);
            $image->move($destination, $data['image']);
        }

        $productItem->update($data);

        return back()->with('success', "insert successfully");
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
