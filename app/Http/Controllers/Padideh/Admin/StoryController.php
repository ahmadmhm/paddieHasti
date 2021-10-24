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
        $this->storyRepo = $storyRepo;
    }
    public function index()
    {
        return $this->storyRepo->all();

    }


    public function create()
    {
        return $this->storyRepo->create();

    }


    public function store(Request $request)
    {
        return $this->storyRepo->store($request);

    }

    public function show(Story $story)
    {
        return $this->storyRepo->show($story);

    }


    public function edit(Story $story)
    {
        return $this->storyRepo->edit($story);

    }

    public function update(Request $request,Story $story)
    {
        return $this->storyRepo->update($request,$story);

    }


    public function destroy(Story $story)
    {
        return $this->storyRepo->destroy($story);

    }
}
