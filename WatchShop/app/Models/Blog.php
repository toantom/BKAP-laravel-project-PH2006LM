<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $fillable = ['id','slug','name','id_cate','id_admin','content','image','status','created_at','updated_at'];
    //join with admin, categories table
    public function category(){
        return $this->hasOne(Category::class,'id','id_cate');
    }
    public function admin(){
        return $this->hasOne(Admin::class,'id','id_admin');
    }


}
