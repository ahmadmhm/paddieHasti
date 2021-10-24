<?php
namespace App\Repositories\Admin;

use App\Http\Traits\FileUploadTrait;
use App\Models\Padideh\Banner;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class BannerRepo {
    use FileUploadTrait;

    public function all(){
        $banners = Banner::latest()->paginate(15);
        return view('Padideh.banners.index')->with([
            'banners' => $banners,
        ]);
    }

    public function create()
    {
        return view('Padideh.banners.create');
    }

    public function store($request)
    {
        $image = null;
        if ($request->hasFile('image')) {
            $image = $this->uploadFile($request->image, Banner::UPLOAD_URL, 'banner_image_', 'storage', ['png','jpeg', 'jpg', 'svg']);
        }

        $cover_image = null;
        if ($request->hasFile('cover_image')) {
            $image = $this->uploadFile($request->cover_image, Banner::UPLOAD_URL, 'banner_cover_image_', 'storage', ['png','jpeg', 'jpg', 'svg']);
        }

        return Banner::create([
            'title' => $request->title,
            'link' => $request->link,
            'image_cover' => $cover_image,
            'image' => $image,
            'is_active' => $request->input('is_active') ? true : false,
        ]);

       
    }
    public function show($banner)
    {
        return view('Padideh.banners.show')->with([
            'banner' => $banner
        ]);
    }
    public function edit($banner)
    {
        return view('Padideh.banners.edit')->with([
            'banner' => $banner,
        ]);
    }

    public function update($request,$banner){
        $image = null;
        if ($request->hasFile('image')) {
            $this->removeFile('storage', Banner::SHOW_URL.$banner->image);
            $image = $this->uploadFile($request->image, Banner::UPLOAD_URL, 'banner_image_', 'storage', ['png','jpeg', 'jpg', 'svg']);
        }
        $cover_image = null;
        if ($request->hasFile('cover_image')) {
            $this->removeFile('storage', Banner::SHOW_URL.$banner->cover_image);
            $cover_image = $this->uploadFile($request->cover_image, Banner::UPLOAD_URL, 'banner_cover_image_', 'storage', ['png','jpeg', 'jpg', 'svg']);
        }

        return $banner->update([
            'title' => $request->title,
            'link' => $request->link,
            'image_cover' => $cover_image ?? $banner->cover_image,
            'image' => $image ?? $banner->image,
            'is_active' => $request->input('is_active') ? true : false,
        ]);
        
    }


    public function destroy($banner)
    {
        $this->removeFile('storage', Banner::SHOW_URL.$banner->image);
        $this->removeFile('storage', Banner::SHOW_URL.$banner->cover_image);
        return $banner->delete();
        
    }


}
