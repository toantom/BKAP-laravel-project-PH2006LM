<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable =['id','name','image','sku','slug','star','stock','status','type','id_cate','id_attr','discount','des','price'];
    //join table category, attribute, product_imgs
    public function category(){
        return $this->hasOne(Category::class,'id','id_cate');
    }
    public function show($id){
        return $this::where('id_cate', '=', $id)->get();
    }
    public function product_imgs(){
        return $this->hasMany(Product_img::class,'id','id_product');
    }
    public function attribute(){
        return $this->hasOne(Attribute::class,'id','id_attr');
    }
    public function order(){
        return $this->hasMany(Order_detail::class,'id_product','id');
    }
    public function feedback(){
        return $this->hasMany(Feedback::class,'id_product','id');
    }

}
