<?php

namespace App\Http\Controllers\Padideh\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admins\AdminRequest;
use App\Http\Requests\Admin\Admins\UpdateAdminRequest;
use App\Models\Admin;
use App\Repositories\Admin\AdminRepo;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public $adminRepo;
    public function __construct(AdminRepo $adminRepo)
    {
        $this->AdminRepo = $adminRepo;
    }
    public function index()
    {
        $admins = $this->AdminRepo->all();
        return view('admin.admins.index')->with([
            'admins' => $admins
        ]);
    }

    public function create()
    {
        return $this->AdminRepo->create();
    }

    public function store(AdminRequest $request)
    {
        $this->AdminRepo->store($request);
        return \redirect()->route('panel.admins.index')->with([
            'success' => 'با موفقیت ثبت شد'
        ]);
    }

    public function show(Admin $admin)
    {
        return $this->AdminRepo->show($admin);

    }

    public function edit(Admin $admin)
    {
        return $this->AdminRepo->edit($admin);
    }

    public function update(UpdateAdminRequest $request,Admin $admin)
    {
        $this->AdminRepo->update($request,$admin);
        return \redirect()->route('panel.admins.index')->with([
            'success' => 'با موفقیت ثبت شد'
        ]);
    }

    public function destroy(Admin $admin)
    {
       $this->AdminRepo->destroy($admin);
       return back()->with([
           'success' => 'با موفقیت حذف شذ',
       ]);
    }
}
