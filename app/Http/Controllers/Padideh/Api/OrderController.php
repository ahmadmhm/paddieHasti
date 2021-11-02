<?php

namespace App\Http\Controllers\Padideh\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Padideh\Api\StoreWasteOrderHead;
use App\Http\Resources\Padideh\WasteOrderHeadResource;
use App\Repositories\Admin\OrderRepo;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $order_repo;
    public function __construct(OrderRepo $order_repo)
    {
        $this->order_repo = $order_repo;
    }
    
    public function index(Request $request)
    {
        $orders = WasteOrderHeadResource::collection($this->order_repo->getIndex($request->user()));
        return $this->successResponse('لیست سفارشات', $orders);

    }

    public function store(StoreWasteOrderHead $request)
    {
        $user = $request->user();
        $order= $this->order_repo->store($request , $user);
        if($order)
        {
            $orders = WasteOrderHeadResource::collection($this->order_repo->getIndex($request->user()));

            return $this->successResponse('سفارش شما با موفقیت ثبت شد', $orders);
        }

        return $this->failedResponse('w', 'سفارش ثبت نشد دوباره تلاش کنید');

    }


}

