<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
     protected $fillable = ['category_id','sub_category_name', 'is_deleted','created_by','created_at','updated_by','updated_at'];
}
