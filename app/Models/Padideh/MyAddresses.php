<?php

namespace App\Models\Padideh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MyAddresses extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="my_addresses";

    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
