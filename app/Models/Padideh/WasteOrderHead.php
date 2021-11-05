<?php

namespace App\Models\Padideh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WasteOrderHead extends Model
{
    use SoftDeletes;

    protected $guarded=[];
    protected $table="waste_orderheads";

    const BASE_CODE = 'PDH';

    //relations

    public function orders(){
        return $this->hasMany(WasteOrder::class,'waste_orderhead_id');
    }

    public function admin(){
        return $this->belongsTo(Admin::class , 'admin_id');
    }
    public function user(){
        return $this->belongsTo(User::class , 'user_id','id');
    }

    public function driver(){
        return $this->belongsTo(Driver::class , 'driver_id');
    }

    public function status(){
        return $this->belongsTo(OrderStatus::class ,'status_id');
    }

    public function address(){
        return $this->belongsTo(Address::class,'address_id');
    }

    //functions
    public function getFinalPrice()
    {
        $price = 0;
        $price += $this->waste_orders()->sum('price');
        return $price;
    }

    public function generateCode()
    {
        return self::BASE_CODE.'-'.now()->format('Ymd').'-'.$this->id;
    }
}
