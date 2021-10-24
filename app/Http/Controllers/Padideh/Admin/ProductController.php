<?php

namespace App\Http\Controllers\Padideh\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Admin\ProductRepo;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $productRepo;
    public function __construct(ProductRepo $productRepo)
    {
        $this->productRepo = $productRepo;
    }
    public function index()
    {
        return $this->productRepo->all();
    }


    public function create()
    {
        return $this->productRepo->create();
    }


    public function store(Request $request)
    {
        return $this->productRepo->store($request);
    }


    public function show(Product $product)
    {
        return $this->productRepo->show($product);
    }

    public function edit(Product $product)
    {
        return $this->productRepo->edit($product);

    }


    public function update(Request $request,Product $product)
    {
        return $this->productRepo->update($request,$product);

    }


    public function destroy(Product $product)
    {
        return $this->productRepo->destroy($product);
    }
}
