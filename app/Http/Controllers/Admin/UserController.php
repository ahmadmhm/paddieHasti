<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admins\UpdateUserRequest;
use App\Http\Requests\Admin\Admins\UserRequest;
use App\Models\User;
use App\Repositories\Admin\UserRepo;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $UserRepo;
    public function __construct(UserRepo $UserRepo)
    {
        $this->UserRepo = $UserRepo;
    }
    
    public function index()
    {
        $users = $this->UserRepo->all();
        return view('admin.users.index')->with([
            'users' => $users
        ]);
    }

    
    public function create()
    {
        return $this->UserRepo->create();

    }

   
    public function store(UserRequest $request)
    {
        $this->UserRepo->store($request);
        return \redirect()->route('panel.users.index')->with([
            'success' => 'با موفقیت ثبت شد'
        ]);
    }

    
    public function show(User $user)
    {
        return $this->UserRepo->show($user);

    }

    
    public function edit(User $user)
    {
        return $this->UserRepo->edit($user);

    }

    
    public function update(UpdateUserRequest $request,User $user)
    {
        $this->UserRepo->update($request,$user);
        return \redirect()->route('panel.users.index')->with([
            'success' => 'با موفقیت ثبت شد'
        ]);
    }

    
    public function destroy(User $user)
    {
        $this->UserRepo->destroy($user);
       return back()->with([
           'success' => 'با موفقیت حذف شذ',
       ]);
    }
}
