<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;
    protected $table = 'tbl_product';
    protected $primaryKey = 'product_id';
    
    protected $fillable = ['product_id', 
        'product_name', 
        'product_details', 
        'category_id', 
        'product_price', 
        'product_image', 
        'product_image_1', 
        'product_image_2', 
        'product_image_3', 
        'product_status'];
}
