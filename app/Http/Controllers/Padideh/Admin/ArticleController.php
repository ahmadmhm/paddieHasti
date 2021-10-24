<?php

namespace App\Http\Controllers\Padideh\Admin;

use App\Http\Controllers\Controller;
use App\Models\Padideh\Article;
use App\Repositories\Admin\ArticleRepo;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

public $articleCategoryRepo;
   public function __construct(ArticleRepo $articleRepo)
   {
       $this->articleRepo = $articleRepo;
   }

    public function index()
    {
        return $this->articleRepo->all();
    }


    public function create()
    {
        return $this->articleRepo->create();

    }


    public function store(Request $request)
    {
        return $this->articleRepo->store($request);

    }


    public function show(Article $article)
    {
        return $this->articleRepo->show($article);

    }


    public function edit(Article $article)
    {
        return $this->articleRepo->edit($article);

    }


    public function update(Request $request,Article $article)
    {
        return $this->articleRepo->update($request,$article);
    }


    public function destroy(Article $article)
    {
        return $this->articleRepo->destroy($article);

    }
}
