<?php

namespace App\Http\Controllers\Padideh\Admin;

use App\Http\Controllers\Controller;
use App\Models\Padideh\DriverStatus;
use App\Repositories\Admin\DriverStatusRepository;
use Illuminate\Http\Request;

class DriverStatusController extends Controller
{
    private $driverStatusRepository;
   
    public function __construct(DriverStatusRepository $driverStatusRepository)
    {
        $this->driverStatusRepository = $driverStatusRepository;
    }


    public function index()
    {
        $driver_statuses =  $this->driverStatusRepository->index();
        return view('Padideh.driver_statuses.index')->with([
            'driver_statuses' => $driver_statuses
        ]);
    }

    

    
    public function store(Request $request)
    {
        $driver_status = $this->driverStatusRepository->store($request);
        if($driver_status)
        {
            return \redirect()->back()->with([
                'success' => 'با موفقیت ثبت شد'
            ]);
        }

    }

    

  
    public function destroy(DriverStatus $driver_status)
    {
        $result =  $this->driverStatusRepository->destroy($driver_status);

        if($result)
        {
            return \redirect()->back()->with([
                'success' => 'با موفقیت ثبت شد'
            ]);
        }

    }
}
