<?php

namespace App\Http\Controllers\Padideh\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Padideh\Admin\OrderStatusRequest;
use App\Models\Padideh\OrderStatus;
use App\Repositories\Admin\OrderStatusRepo;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    private $order_status_repo;

    public function __construct(OrderStatusRepo $order_status_repo){
        $this->order_status_repo = $order_status_repo;
    }
    public function index()
    {
        return $this->order_status_repo->all();
    }

    
    public function create()
    {
        return $this->order_status_repo->create();
    }

    
    public function store(OrderStatusRequest $request)
    {
        $order_status = $this->order_status_repo->store($request);
        if($order_status)
        {
            return redirect()->route('panel.order_status.index')->with([
                'success' => 'با موفقیت ثبت شد'
            ]);
        }
    }



   
    public function destroy(OrderStatus $order_status)
    {
        $result =  $this->order_status_repo->destroy($order_status);
        if ($result) {
            return \redirect()->back()->with([
                'success' => 'با موفقیت ثبت شد'
            ]);
        }
    }
}
