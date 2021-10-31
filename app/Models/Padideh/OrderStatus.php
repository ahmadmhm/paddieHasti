<?php

namespace App\Models\Padideh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;
    protected $table="order_statuses";
    protected $guarded=[];

    public function waste_order()
    {
        return $this->hasOne(WasteOrderHead::class);
    }
}
