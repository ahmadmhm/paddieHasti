<?php

namespace App\Http\Controllers\Padideh\Admin;

use App\Http\Controllers\Controller;
use App\Models\Padideh\ArticleCategory;
use App\Repositories\Admin\ArticleCategoryRepo;
use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{
   public $articleCategoryRepo;
   public function __construct(ArticleCategoryRepo $articleCategoryRepo)
   {
       $this->articleCategoryRepo = $articleCategoryRepo;
   }
    public function index()
    {
        return $this->articleCategoryRepo->all();
    }


    public function create()
    {
        return $this->articleCategoryRepo->create();

    }


    public function store(Request $request)
    {
        return $this->articleCategoryRepo->store($request);

    }


    public function destroy(ArticleCategory $article_category)
    {
        return $this->articleCategoryRepo->destroy($article_category);

    }
}
