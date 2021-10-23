<?php
namespace App\Repositories\Admin;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ArticleRepo {

    public function all(){
        $articles = Article::latest()->paginate(15);
        return view('admin.articles.index')->with([
            'articles' => $articles,
        ]);
    }

    public function create()
    {
        $categories = ArticleCategory::all();
        return view('admin.articles.create')->with([
            'categories' => $categories
        ]);
    }

    public function store($request)
    {
        $image=null;
        if(!empty($request->file('image'))){
            $image =  $request->file('image')->store('Images/articles','local');
        }
        $article = Article::create([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'full_description' => $request->full_description,
            'published' => $request->published ? true : false,
            'can_comment' => $request->can_comment ? true : false,
            'user_id' => Auth::id(),
            'image' => $image,
        ]);

        $article->article_categories()->attach(
            $request->category_id
        );
       
        return \redirect()->route('panel.articles.index')->with([
            'success' => 'با موفقیت ثبت شد'
        ]);
    }
  
    public function show($article)
    {
        return view('admin.articles.show')->with([
            'article' => $article
        ]);
    }

    public function edit($article)
    {
        $categories = ArticleCategory::all();
        return view('admin.articles.edit')->with([
            'article' => $article,
            'categories' => $categories
        ]);
    }

    public function update($request,$article){
        if(!empty($request->file('image'))){
            $image =$request->file('image')->store('images/articles','local');
        }else{
            $image = $article->image;
        }
        $article->update([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'full_description' => $request->full_description,
            'published' => $request->published,
            'image' =>  $image,
            'can_comment' =>  $request->can_comment,
            'can_rate' => $request->can_rate,
            'user_id' => Auth::id(),
        ]);

        $article->article_categories()->sync(
            $request->category_id
        );
        return \redirect()->back()->with([
            'success' => 'با موفقیت ثبت شد'
        ]);
    }


    public function destroy($article)
    {
        File::delete($article->image);
        $article->delete();
        return \redirect()->back()->with([
            'success' => 'با موفقیت حذف شد'
        ]);
    }


}