<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    use HasFactory;
    protected $table = 'inputs';
    protected $fillable =['id','sku','name','id_admin','price','quantity','total','created_at','updated_at'];
    public function admin(){
        return $this->hasOne(Admin::class,'id','id_admin');
    }
}
