<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Verta;
class Pasmand extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];
    protected $table="pasmands";
    
    public static $types = [
        'rial' => 'ریال',
        'toman' => 'تومان'
    ];

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

    public function getjalaliCreatedAtAttribute()
    {
        $v = new Verta($this->created_at);
        return $v->formatJalaliDate();
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
        return $this->icon ?: 'previewImage.gif';
    }

    public function getTypeTitle(){
        try{
            return Self::$types[$this->type];
        }catch(Exception $e){
            return '#';
        }
    }

}
