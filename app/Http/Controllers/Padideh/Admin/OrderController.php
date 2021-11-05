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
}
