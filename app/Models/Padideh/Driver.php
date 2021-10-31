<?php

namespace App\Models\Padideh;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table="drivers";
    protected $guarded=[];

    
    const ACTIVE = 1;
    const INACTIVE = 0;
    
    const UPLOAD_URL = 'drivers/images/';
    const SHOW_URL = '/storage/drivers/images/';



    public function waste_order()
    {
        return $this->hasOne(WasteOrderHead::class);
    }


    public function get_status()
    {
        try{
            if($this->is_active == true){
                return ('<span class="badge badge-success">فعال</span>');
            }else{
                return ('<span class="badge badge-danger">غیرفعال</span>');

            }
        }catch(Exception $e){
            return '#';
        }
    }

    function getImageSrc($image = '', $template = 'original')
    {
        if ($image) {
            return route('imagecache', ['template' => $template, 'filename' => $image]);
        }
        return null;
    }
    public function getImage()
    {
        return $this->image ? self::SHOW_URL.$this->image : 'previewImage.gif';
    }



}
