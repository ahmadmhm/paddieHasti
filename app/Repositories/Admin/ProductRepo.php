<?php
namespace App\Repositories\Admin;

use App\Models\Padideh\Product;
use App\Models\Padideh\ProductCategory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProductRepo {

    public function all(){
        $products = Product::latest()->paginate(15);
        return view('Padideh.products.index')->with([
            'products' => $products,
        ]);
    }

    public function create()
    {
        $categories = ProductCategory::all();
        return view('Padideh.products.create')->with([
            'categories' => $categories
        ]);
    }

    public function store($request)
    {
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'link' => $request->link,
            'description' => $request->description,
            'image' => $request->file('image')->store('images/products','local'),
            'is_active' => $request->input('is_active') ? true : false,
        ]);
        $product->categories()->attach(
            $request->category_id
        );

        return \redirect()->route('panel.products.index')->with([
            'success' => 'با موفقیت ثبت شد'
        ]);
    }
    public function show($product)
    {
        return view('Padideh.products.show')->with([
            'product' => $product
        ]);
    }
    public function edit($product)
    {
        $categories = ProductCategory::all();
        return view('Padideh.products.edit')->with([
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function update($request,$product){
        if(!empty($request->file('image'))){
            $image =$request->file('image')->store('images/products','local');
        }else{
            $image = $product->image;
        }
        $product = $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'link' => $request->link,
            'description' => $request->description,
            'image' =>  $image,
            'is_active' => $request->input('is_active') ? true : false,
        ]);
        return \redirect()->back()->with([
            'success' => 'با موفقیت ثبت شد'
        ]);
    }


    public function destroy($product)
    {
        File::delete($product->image);
        $product->delete();
        return \redirect()->back()->with([
            'success' => 'با موفقیت ثبت شد'
        ]);
    }


}
