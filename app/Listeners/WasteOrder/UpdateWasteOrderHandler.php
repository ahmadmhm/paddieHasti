<?php

namespace App\Listeners\WasteOrder;

use App\Events\WasteOrder\WasteOrderUpdated;
use App\Notifications\UpdateWasteOrder;
use Illuminate\Support\Facades\Notification;

class UpdateWasteOrderHandler
{
    
    public function handle(WasteOrderUpdated $event)
    {
        $waste_order = $event->waste_order;
        $status = $event->status;

        if($waste_order->status_id != $status)
        {
            $waste_order->update([
                'status_id' => $status
            ]);

          Notification::send(
                $waste_order->user,
                new UpdateWasteOrder(
                    $waste_order,
                    "وضعیت سفارش $waste_order->code تغییر کرد",
                )
            );
        }
       

    }
}
