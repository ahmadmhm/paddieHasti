<?php

namespace App\Http\Controllers\Padideh\Admin;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Repositories\Admin\StoryRepo;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public $storyRepo;
    public function __construct(StoryRepo $storyRepo)
    {
        $this->StoryRepo = $storyRepo;
    }
    public function index()
    {
        return $this->StoryRepo->all();

    }


    public function create()
    {
        return $this->StoryRepo->create();

    }


    public function store(Request $request)
    {
        return $this->StoryRepo->store($request);

    }

    public function show(Story $story)
    {
        return $this->StoryRepo->show($story);

    }


    public function edit(Story $story)
    {
        return $this->StoryRepo->edit($story);

    }

    public function update(Request $request,Story $story)
    {
        return $this->StoryRepo->update($request,$story);

    }


    public function destroy(Story $story)
    {
        return $this->StoryRepo->destroy($story);

    }
}
