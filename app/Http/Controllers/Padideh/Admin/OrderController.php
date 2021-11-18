<?php

namespace App\Http\Controllers\Padideh\Admin;

use App\Http\Controllers\Controller;
use App\Models\Padideh\WasteOrderHead;
use App\Repositories\Admin\OrderRepository;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        return $this->orderRepository->all();
    }

    public function show(WasteOrderHead $orderHead)
    {
        return $this->orderRepository->show($orderHead);
    }


    public function edit(WasteOrderHead $orderHead)
    {
        return $this->orderRepository->edit($orderHead);
    }


    public function update(Request $request,WasteOrderHead $waste_order)
    {
        $waste_order = $this->orderRepository->update($request,$waste_order);
        if($waste_order)
        {
            return \redirect()->route('panel.waste_orders.index')->with([
                'success' => 'با موفقیت ثبت شد'
            ]);
        }
    }

    public function watting_confirm()
    {
        $waste_orders = $this->orderRepository->watting_confirm();
        return view('Padideh.orders.watting_confirm')->with([
            'waste_orders' => $waste_orders
        ]);
    }

    public function process()
    {
        $waste_orders = $this->orderRepository->process();
        return view('Padideh.orders.process')->with([
            'waste_orders' => $waste_orders
        ]);
    }

    public function watting_driver()
    {
        $waste_orders = $this->orderRepository->watting_driver();
        return view('Padideh.orders.watting_driver')->with([
            'waste_orders' => $waste_orders
        ]);
    }

    public function cancel(Request $request,WasteOrderHead $waste_order)
    {
        $waste_order =  $this->orderRepository->cancel($request,$waste_order);

        if($waste_order)
        {
            return \redirect()->back()->with([
                'success' => 'وضعیت سفارش تغییر کرد'
            ]);
        }
    }

    public function cancelStatus(Request $request,WasteOrderHead $waste_order)
    {
        // dd($request->all());
        $waste_order = $this->orderRepository->cancelStatus($request,$waste_order);
        if($waste_order)
        {
            return \redirect()->back()->with([
                'success' => 'وضعیت سفارش تغییر کرد'
            ]);
        }
    }


}
