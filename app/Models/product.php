<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';

    protected $primaryKey = 'id_product';

    protected $fillable = [
        'sku',
        'name_product',
        'stock_product',
        'price_product',
        'desc_product',
        'id_category'
    ];
}
