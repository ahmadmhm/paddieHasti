<?php

namespace App\Http\Controllers\Padideh\Admin;

use App\Http\Controllers\Controller;
use App\Models\Padideh\WasteOrderHead;
use App\Repositories\Admin\OrderRepository;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $order_repo;

    public function __construct(OrderRepository $order_repo)
    {
        $this->order_repo = $order_repo;
    }

    public function index()
    {
        return $this->order_repo->all();
    }

    public function show(WasteOrderHead $waste_order)
    {
        return $this->order_repo->show($waste_order);
    }


    public function edit(WasteOrderHead $waste_order)
    {
        return $this->order_repo->edit($waste_order);
    }


    public function update(Request $request,WasteOrderHead $waste_order)
    {
        $waste_order = $this->order_repo->update($request,$waste_order);
        if($waste_order)
        {
            return \redirect()->route('panel.waste_orders.index')->with([
                'success' => 'با موفقیت ثبت شد'
            ]);
        }
    }

    public function watting_confirm()
    {
        $waste_orders = $this->order_repo->watting_confirm();
        return view('Padideh.orders.watting_confirm')->with([
            'waste_orders' => $waste_orders
        ]);
    }

    public function process()
    {
        $waste_orders = $this->order_repo->process();
        return view('Padideh.orders.process')->with([
            'waste_orders' => $waste_orders
        ]);
    }

    public function watting_driver()
    {
        $waste_orders = $this->order_repo->watting_driver();
        return view('Padideh.orders.watting_driver')->with([
            'waste_orders' => $waste_orders
        ]);
    }

    public function cancel(Request $request,WasteOrderHead $waste_order)
    {
        $waste_order =  $this->order_repo->cancel($request,$waste_order);

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
        $waste_order = $this->order_repo->cancelStatus($request,$waste_order);
        if($waste_order)
        {
            return \redirect()->back()->with([
                'success' => 'وضعیت سفارش تغییر کرد'
            ]);
        }
    }


}
