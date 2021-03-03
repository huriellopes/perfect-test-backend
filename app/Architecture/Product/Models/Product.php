<?php

namespace App\Architecture\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';

    protected $primaryKey = 'id_product';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'description',
        'price',
        'deleted_at',
        'created_at',
        'updated_at'
    ];
}
