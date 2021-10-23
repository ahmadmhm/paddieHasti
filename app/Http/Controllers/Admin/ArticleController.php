<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Repositories\Admin\ArticleRepo;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

public $articleCategoryRepo;
   public function __construct(ArticleRepo $articleRepo)
   {
       $this->ArticleRepo = $articleRepo;
   }
    
    public function index()
    {
        return $this->ArticleRepo->all();
    }

  
    public function create()
    {
        return $this->ArticleRepo->create();

    }

    
    public function store(Request $request)
    {
        return $this->ArticleRepo->store($request);

    }

    
    public function show(Article $article)
    {
        return $this->ArticleRepo->show($article);

    }

    
    public function edit(Article $article)
    {
        return $this->ArticleRepo->edit($article);

    }

    
    public function update(Request $request,Article $article)
    {
        return $this->ArticleRepo->update($request,$article);
    }

    
    public function destroy(Article $article)
    {
        return $this->ArticleRepo->destroy($article);

    }
}
