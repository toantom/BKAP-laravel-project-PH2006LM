<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable =['id','name','image','sku','stock','status','id_cate','id_attr','discount','des','price'];
    //join table category, attribute
    public function category(){
        return $this->hasOne(Category::class,'id','id_cate');
    }
    public function show($id){
        return $this::where('id_cate', '=', $id)->get();
    }
    public function attribute(){
        return $this->hasOne(Attribute::class,'id','id_attr');
    }

}
