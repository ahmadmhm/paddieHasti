<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use App\Repositories\Admin\ArticleCategoryRepo;
use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{
   public $articleCategoryRepo;
   public function __construct(ArticleCategoryRepo $articleCategoryRepo)
   {
       $this->ArticleCategoryRepo = $articleCategoryRepo;
   }
    public function index()
    {
        return $this->ArticleCategoryRepo->all();
    }

    
    public function create()
    {
        return $this->ArticleCategoryRepo->create();

    }

    
    public function store(Request $request)
    {
        return $this->ArticleCategoryRepo->store($request);

    }


    public function destroy(ArticleCategory $article_category)
    {
        return $this->ArticleCategoryRepo->destroy($article_category);

    }
}
