<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = 'wishlists';
    protected $fillable =['id','id_user','id_product','status'];
    public function product(){
        return $this->hasOne(Product::class,'id','id_product');
    }

}
