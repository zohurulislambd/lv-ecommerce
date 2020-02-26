<?php

namespace App\Http\Controllers;

use App\ProductImage;
use App\ProductItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\New_;


class ProductItemController extends Controller
{
    /* public function index(){
    return view('backend/pages/product/index');
    }*/
    public function create()
    {
        return view('backend/pages/product/create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $this->validate($request, [
            'title' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
//            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $data['image'] = md5(time()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path("images"), $data['image']);
        }

      /*multiple image upload to Product_Image table*/
//        $productItem = ProductItem::create($data);
       /* $product_image =  new ProductImage;
        if (count($request->$product_image) > 0){
              foreach ($request->$product_image as $image){
                  $image = $request->file('image');
                  $data['image'] = md5(time()) . '.' . $image->getClientOriginalExtension();
                  $image->move(public_path("images"), $data['image']);
                  $productItem = ProductItem::create($data);
              }
          }*/
        $productItem = ProductItem::create($data);
        //    image insert to product_image
     // --ProductImage Model
        ProductImage::create([
            'image' =>   $data['image'],
            'products_id' => $productItem->id,
        ]);

        return redirect('admin/productItem')->with('success', 'Image upload successfully');
    }

    public function edit(ProductItem $item)
    {
        $data['product'] = $item;
//        dd($data);
        return view('backend/pages/product/edit', $data);

    }

    public function update(ProductItem $item, Request $request)
    {
        $data = $request->all();
        $this->validate($request, [
            'title' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $data['image'] = md5(time()) . '.' . $image->getClientOriginalExtension();
            @unlink(public_path("images/") . $item->image);
            $image->move(public_path("images"), $data['image']);
        }
        $item->update($data);

        return redirect()->route('productItem')->with('success', 'Updated Successfull');
    }

    function list()
    {
        $data['allProductItms'] =ProductItem::with('productPhotos')->orderBy('id','Desc')->get();
//        return $data;
        return view('backend/pages/product/index', $data);
    }

    public function delete(ProductItem $item)
    {
        @unlink(public_path("images/") . $item->image);
        $item->delete();

        return redirect('admin/productItem');
    }

}
