<?php

namespace App\Models\Padideh;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Verta;
class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=[];
    protected $table="products";

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class,'product_category','product_id','category_id');
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
        return $this->image ?: 'previewImage.gif';
    }

    public function get_category(){
        foreach($this->categories as $category){
            return "<span class='badge badge-light'>$category->name</span>";
        }
    }
}