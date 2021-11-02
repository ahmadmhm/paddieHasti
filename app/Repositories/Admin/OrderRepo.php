<?php
namespace App\Repositories\Admin;

use App\Models\Padideh\WasteOrderHead;
use Carbon\Carbon;

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

    //api

    public function getIndex($user)
    {
        return $user->waste_orders()->orderByDesc('created_at')->get();
    }

    public function store($request, $user)
    {
        $code =  random_int(100000, 999999);
        return $order = WasteOrderHead::create([
            'user_id' => $user->id,
            'code' => $code,
            'address_id' => $request->address_id,
            'delivery_date' => $request->delivery_date,
        ]);

        $order->waste_orders()->create([
            'user_id' => $user->id,
            'pasmand_id'=> $request->pasmand_id,
            'vahed'=> $request->vahed,
            'weight'=> $request->weight,
            'price'=> $request->price,
        ]);

    }





}
