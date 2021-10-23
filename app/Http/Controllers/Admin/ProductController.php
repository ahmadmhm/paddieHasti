<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Admin\ProductRepo;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $productRepo;
    public function __construct(ProductRepo $productRepo)
    {
        $this->ProductRepo = $productRepo;
    }
    public function index()
    {
        return $this->ProductRepo->all();
    }

    
    public function create()
    {
        return $this->ProductRepo->create();
    }

   
    public function store(Request $request)
    {
        return $this->ProductRepo->store($request);
    }

    
    public function show(Product $product)
    {
        return $this->ProductRepo->show($product);
    }

    public function edit(Product $product)
    {
        return $this->ProductRepo->edit($product);

    }

    
    public function update(Request $request,Product $product)
    {
        return $this->ProductRepo->update($request,$product);

    }

    
    public function destroy(Product $product)
    {
        return $this->ProductRepo->destroy($product);
    }
}
