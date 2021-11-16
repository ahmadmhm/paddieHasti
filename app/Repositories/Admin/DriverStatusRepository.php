<?php

namespace App\Repositories\Admin;

use App\Models\Padideh\DriverStatus;

class DriverStatusRepository{

    public function index()
    {
        return $driver_statues = DriverStatus::latest()->paginate(20);
    }

    public function store($request)
    {
        return $driver_status = DriverStatus::create([
            'title' => $request->title,
            'step' => $request->step,
            'description' => $request->description,
        ]);
    }

    public function destroy($driver_status)
    {
        return $driver_status->delete();

    }

}