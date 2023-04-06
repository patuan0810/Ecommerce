<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;
    protected $table = 'tbl_category_product';
    protected $primaryKey = 'category_id';
    
    protected $fillable = ['category_id', 
        'category_name', 
        'category_status'];
}
