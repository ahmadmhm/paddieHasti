<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Repositories\Admin\BannerRepo;
use Illuminate\Http\Request;

class bannerController extends Controller
{
    public $bannerRepo;
    public function __construct(BannerRepo $bannerRepo)
    {
        $this->BannerRepo = $bannerRepo;
    }
    public function index()
    {
        return $this->BannerRepo->all();

    }

    
    public function create()
    {
        return $this->BannerRepo->create();
    }


    public function store(Request $request)
    {
        return $this->BannerRepo->store($request);
    }

   
    public function show(Banner $banner)
    {
        return $this->BannerRepo->show($banner);
    }

    
    public function edit(Banner $banner)
    {
        return $this->BannerRepo->edit($banner);

    }

    
    public function update(Request $request,Banner $banner)
    {
        return $this->BannerRepo->update($request,$banner);

    }

    
    public function destroy(Banner $banner)
    {
        return $this->BannerRepo->destroy($banner);

    }
}
