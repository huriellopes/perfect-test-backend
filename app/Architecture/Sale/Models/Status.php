<?php

namespace App\Architecture\Sale\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'sales_status';

    protected $primaryKey = 'id_sales_status';
}
