<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedbacks';
    protected $fillable = ['id','id_product','id_user','star','name','image','content','updated_at'];
    public function user(){
        return $this->hasOne(User::class,'id','id_user');
    }
}
