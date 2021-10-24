<?php
namespace App\Repositories\Admin;

use App\Models\Padideh\Story;
use Illuminate\Support\Facades\File;

class StoryRepo {

    public function all(){
        $stories = Story::latest()->paginate(15);
        return view('Padideh.stories.index')->with([
            'stories' => $stories,
        ]);
    }

    public function create()
    {
        return view('Padideh.stories.create');
    }

    public function store($request)
    {
        Story::create([
            'title' => $request->title,
            'image' => $request->file('image')->store('images/story','local'),
            'is_active' => $request->input('is_active') ? true : false,
        ]);

        return \redirect()->route('panel.stories.index')->with([
            'success' => 'با موفقیت ثبت شد'
        ]);
    }
    public function show($story)
    {
        return view('Padideh.stories.show')->with([
            'story' => $story
        ]);
    }
    public function edit($story)
    {
        return view('Padideh.stories.edit')->with([
            'story' => $story,
        ]);
    }

    public function update($request,$story){
        if(!empty($request->file('image'))){
            $image =$request->file('image')->store('images/products','local');
        }else{
            $image = $story->image;
        }
        $product = $story->update([
            'title' => $request->title,
            'image' =>  $image,
            'is_active' => $request->input('is_active') ? true : false,
        ]);
        return \redirect()->back()->with([
            'success' => 'با موفقیت ثبت شد'
        ]);
    }


    public function destroy($story)
    {
        File::delete($story->image);
        $story->delete();
        return \redirect()->back()->with([
            'success' => 'با موفقیت حذف شد'
        ]);
    }


}
