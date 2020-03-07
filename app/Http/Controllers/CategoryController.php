<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('backend/pages/categories/index', compact('categories'));
    }
    public function create()
    {
        $main_categories = Category::orderBy('id','desc')->where('parent_id',NULL)->get();
        return view('backend/pages/categories/create',compact('main_categories'));
    }

    public function store(Request $request)
    {
//        $data = $request->all();
        $this->validate($request, [
            'name' => 'required',
            'image' => 'nullable'|'required'//|mimes:jpeg,png,jpg,gif|max:2048',
        ],
        [
            'name.required' => 'Please provide category name',
            'image.required' => 'Please provide a valid image with .jpg, .jpeg, .png, .gif extention......',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->save();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $data['image'] = md5(time()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path("images"), $data['image']);
        }
        session()->flash('success','A new category hass added successful');
        return redirect('admin/categories');
    }
    // store method ENDS

    public function edit(Category $item)
    {
        $data['category'] = $item;
        return view('backend/pages/categories/edit', $data);
    }

    public function update(Category $item, Request $request)
    {
        $data = $request->all();
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
//            'image' => 'required',
        ]);

//        single image update
         if ($request->hasFile('image')) {
             $image = $request->file('image');
             $data['image'] = md5(time()) . '.' . $image->getClientOriginalExtension();
             @unlink(public_path("images/") . $item->image);
             $image->move(public_path("images"), $data['image']);
         }
        $item->update($data);

        return redirect()->route('category')->with('success', 'Updated Successfull');
    }

    /*
     * update method END
     * */

    function list()
    {
        $data['allProductItms'] =ProductItem::with('productPhotos')->orderBy('id','Desc')->get();
//        return $data;
        return view('backend/pages/product/index', $data);
    }
    /*
     * list method end
     * */
    public function delete(ProductItem $item)
    {
        @unlink(public_path("images/") . $item->image);
        $item->delete();
        return redirect('admin/productItem');
    }


}
