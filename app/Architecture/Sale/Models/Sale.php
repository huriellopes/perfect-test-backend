<?php

namespace App\Architecture\Sale\Models;

use App\Architecture\Product\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';

    protected $primaryKey = 'id_sale';

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
