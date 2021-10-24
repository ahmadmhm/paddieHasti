<?php
namespace App\Repositories\Admin;
use App\Models\Padideh\Admin;
use Illuminate\Support\Facades\Hash;

class AdminRepo {

    public function all(){
        return Admin::latest()->paginate(20);
    }

    public function create()
    {
        return view('Padideh.admins.create');
    }

    public function store($request)
    {
        return Admin::create([
            'name' => $request->name,
            'family' => $request->family,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'access_status' => $request->access_status ? true : false,
        ]);
    }

    public function show($admin)
    {
        return view('Padideh.admins.show')->with([
            'admin' => $admin
        ]);
    }
    public function edit($admin)
    {
        return view('Padideh.admins.edit')->with([
            'admin' => $admin
        ]);
    }

    public function update($request,$admin){
        return $admin->update([
            'name' => $request->name,
            'family' => $request->family,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'password' => Hash::make($request->password) ?: $admin->password,
            'access_status' => $request->access_status ? true : false,
        ]);
    }

    public function destroy($admin)
    {
       $admin->delete();
    }


}
