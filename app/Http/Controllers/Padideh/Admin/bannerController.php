<?php

namespace App\Http\Controllers\Padideh\Admin;

use App\Http\Controllers\Controller;
use App\Models\Padideh\Banner;
use App\Repositories\Admin\BannerRepo;
use Illuminate\Http\Request;

class bannerController extends Controller
{
    public $bannerRepo;
    public function __construct(BannerRepo $bannerRepo)
    {
        $this->bannerRepo = $bannerRepo;
    }
    public function index()
    {
        return $this->bannerRepo->all();

    }


    public function create()
    {
        return $this->bannerRepo->create();
    }


    public function store(Request $request)
    {
        return $this->bannerRepo->store($request);
    }


    public function show(Banner $banner)
    {
        return $this->bannerRepo->show($banner);
    }


    public function edit(Banner $banner)
    {
        return $this->bannerRepo->edit($banner);

    }


    public function update(Request $request,Banner $banner)
    {
        return $this->bannerRepo->update($request,$banner);

    }


    public function destroy(Banner $banner)
    {
        return $this->bannerRepo->destroy($banner);

    }
}
