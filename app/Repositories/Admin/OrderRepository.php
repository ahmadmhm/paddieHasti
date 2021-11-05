<?php
namespace App\Repositories\Admin;

use App\Models\Padideh\OrderStatus;
use App\Models\Padideh\Waste;
use App\Models\Padideh\WasteOrderHead;
use Carbon\Carbon;

class OrderRepository {

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
        return $user->wasteOrders()->latest('updated_at')->get();
    }

    public function storeUserOrder($data, $user)
    {
        $status = OrderStatus::where('step', 1)->first();
        $orderHead = WasteOrderHead::create([
            'status_id' => $status->id,
            'user_id' => $user->id,
            'address_id' => $data['address_id'],
            'delivery_date' => $data['delivery_date'],
        ]);
        $totalPrice = 0;
        $inserts = [];
        if ($orderHead and count($data['orders'])) {
            $orders = $data['orders'];
            $wastes = Waste::active()->whereIn('id', array_column($orders, 'waste_id'))->get();
            foreach ($orders as $order) {
                $waste = $wastes->where('id', $order['waste_id'])->first();
                if ($waste) {
                    $inserts [] = [
                        'waste_id' => $waste->id,
                        'weight' => $order['weight'],
                        'waste_orderhead_id' => $orderHead->id,
                        'price' => $waste->buy_price,
                        'unit' => $waste->unit,
                        'name' => $waste->name,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                    $totalPrice += $waste->buy_price * $order['weight'];
                }
            }
        }

        $orderHead->update([
            'code' => $orderHead->generateCode(),
            'total_price' => $totalPrice
        ]);

        $orderHead->orders()->insert($inserts);
        return $orderHead;
    }
}
