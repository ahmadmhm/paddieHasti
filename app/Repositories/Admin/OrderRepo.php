<?php
namespace App\Repositories\Admin;

use App\Models\Padideh\WasteOrderHead;

class OrderRepo {

    public function all(){
        $orders = WasteOrderHead::all();
        return view('Padideh.orders.index')->with([
            'orders' => $orders
        ]);
    }


    public function show($waste_order)
    {
        return view('Padideh.orders.show')->with([
            'waste_order' => $waste_order
        ]);
    }





}
