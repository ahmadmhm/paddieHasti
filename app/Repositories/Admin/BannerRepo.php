<?php
namespace App\Repositories\Admin;

use App\Models\Banner;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class BannerRepo {

    public function all(){
        $banners = Banner::latest()->paginate(15);
        return view('admin.banners.index')->with([
            'banners' => $banners,
        ]);
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store($request)
    {
        $image = null;
        $cover_image = null;
        if(!empty($request->file('image')))
        {
            $image = $request->file('image')->store('images/banners/images','local');
        }
        if(!empty($request->file('image_cover')))
        {
            $cover_image = $request->file('image_cover')->store('images/banners/coverImage','local');
        }
        $product = Banner::create([
            'title' => $request->title,
            'link' => $request->link,
            'image_cover' => $cover_image,
            'image' => $image,
            'is_active' => $request->input('is_active') ? true : false,
        ]);
       
        return \redirect()->route('panel.banners.index')->with([
            'success' => 'با موفقیت ثبت شد'
        ]);
    }
    public function show($banner)
    {
        return view('admin.banners.show')->with([
            'banner' => $banner
        ]);
    }
    public function edit($banner)
    {
        return view('admin.banners.edit')->with([
            'banner' => $banner,
        ]);
    }

    public function update($request,$banner){
      
        if(!empty($request->file('image')))
        {
            $image = $request->file('image')->store('images/banners/images','local');
        }else{
            $image = $banner->image;
        }
        if(!empty($request->file('image_cover')))
        {
            $cover_image = $request->file('image_cover')->store('images/banners/coverImage','local');
        }else{
            $cover_image = $banner->image_cover;
        }
        $banner = $banner->update([
            'title' => $request->title,
            'link' => $request->link,
            'image_cover' => $cover_image,
            'image' => $image,
            'is_active' => $request->input('is_active') ? true : false,
        ]);
        return \redirect()->back()->with([
            'success' => 'با موفقیت ثبت شد'
        ]);
    }


    public function destroy($banner)
    {
        File::delete($banner->image);
        File::delete($banner->image_cover);
        $banner->delete();
        return \redirect()->back()->with([
            'success' => 'با موفقیت ثبت شد'
        ]);
    }


}