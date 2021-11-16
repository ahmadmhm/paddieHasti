<?php
namespace App\Repositories\Admin;

use App\Http\Requests\Padideh\Admin\OrderStatusRequest;
use App\Models\Padideh\OrderStatus;

class OrderStatusRepo {

    public function all(){
        $order_statuses = OrderStatus::all();
        return view('Padideh.order_statuses.index')->with([
            'order_statuses' => $order_statuses
        ]);
    }


    public function show($order_status)
    {
        return view('Padideh.order_statuses.show')->with([
            'order_status' => $order_status
        ]);
    }


    public function create()
    {
        return view('Padideh.order_statuses.create');
    }

    public function store($request)
    {
        return $order_status = OrderStatus::create([
            'title' => $request->input('title'),
            'step' => $request->input('step'),
            'description' => $request->input('description'),
        ]);
    }

    public function destroy($order_status)
    {
        return $order_status->delete();
    }





}
