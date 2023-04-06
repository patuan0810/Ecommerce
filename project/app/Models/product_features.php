<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_features extends Model
{
    protected $table = 'tbl_product_features';
    protected $primaryKey = 'product_id';
    
    protected $fillable = [
        'product_id', 
        'product_feature_1', 
        'product_feature_2',
        'product_feature_3',
        'product_feature_4',
        'product_feature_5',
        'product_feature_6'];
}
