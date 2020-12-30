<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    protected $table = 'attributes';
    protected $fillable = ['id','length_face','waterproof','material_face','use_energy','material_strap','material_coat','type','origin','guarantee'];    
}

