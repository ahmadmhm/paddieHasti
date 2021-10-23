<?php
namespace App\Repositories\Admin;

use App\Models\ArticleCategory;

class ArticleCategoryRepo {

    public function all(){
        $article_categories = ArticleCategory::latest()->paginate(15);
        return view('admin.article_categories.index')->with([
            'article_categories' => $article_categories,
        ]);
    }

    public function create()
    {
        $categories = ArticleCategory::all();
        return view('admin.article_categories.create')->with([
            'categories' => $categories
        ]);
    }

    public function store($request)
    {
        $image=null;
        if(!empty($request->file('image'))){
            $image =  $request->file('image')->store('Images/article_category','local');
        }
        ArticleCategory::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'image' => $image
        ]);
       
        return \redirect()->route('panel.article_categories.index')->with([
            'success' => 'با موفقیت ثبت شد'
        ]);
    }
  
    public function destroy($article_category)
    {
        $article_category->delete();
        return \redirect()->back()->with([
            'success' => 'با موفقیت ثبت شد'
        ]);
    }


}