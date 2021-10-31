<?php
namespace App\Repositories\Admin;

use App\Http\Traits\FileUploadTrait;
use App\Models\Padideh\Driver;
use App\Models\Padideh\User;
use Illuminate\Support\Facades\Hash;

class DriverRepo {
    use FileUploadTrait;

    public function all(){
        $drivers =Driver::latest()->paginate(15);
        return view('Padideh.drivers.index')->with([
            'drivers' => $drivers
        ]);
    }

    public function create()
    {
        return view('Padideh.drivers.create');
    }

    public function store($request)
    {
        $image = null;
        if ($request->hasFile('image')) {
            $image = $this->uploadFile($request->image, Driver::UPLOAD_URL, 'driver_image_', 'storage', ['png','jpeg', 'jpg', 'svg']);
        }
        return Driver::create([
            'name' => $request->input('name'),
            'family' => $request->input('family'),
            'mobile' => $request->input('mobile'),
            'car_id' => $request->input('car_id'),
            'lat' => $request->input('lat'),
            'lng' => $request->input('lng'),
            'car_pelak' => $request->input('car_pelak'),
            'car_name' => $request->input('car_name'),
            'shaba_number' => $request->input('shaba_number'),
            'card_number' => $request->input('card_number'),
            'image' => $image,
            'is_active' => $request->input('is_active') ? true : false,
        ]);
    }

    public function show($driver)
    {
        return view('Padideh.drivers.show')->with([
            'driver' => $driver
        ]);
    }

    public function edit($driver)
    {
        return view('Padideh.drivers.edit')->with([
            'driver' => $driver
        ]);
    }
   

    public function update($request,$driver){
        $image = null;
        if ($request->hasFile('image')) {
            $this->removeFile('storage', Driver::SHOW_URL.$driver->image);
            $image = $this->uploadFile($request->image, Driver::UPLOAD_URL, 'driver_image_', 'storage', ['png','jpeg', 'jpg', 'svg']);
        }
        return $driver->update([
            'name' => $request->input('name'),
            'family' => $request->input('family'),
            'mobile' => $request->input('mobile'),
            'car_id' => $request->input('car_id'),
            'lat' => $request->input('lat'),
            'lng' => $request->input('lng'),
            'car_pelak' => $request->input('car_pelak'),
            'car_name' => $request->input('car_name'),
            'shaba_number' => $request->input('shaba_number'),
            'card_number' => $request->input('card_number'),
            'image' => $image ?? $driver->image,
            'is_active' => $request->input('is_active') ? true : false,
        ]);
    }


    public function destroy($driver)
    {
        $this->removeFile('storage', Driver::SHOW_URL.$driver->image);
        return $driver->delete();
    }


}
