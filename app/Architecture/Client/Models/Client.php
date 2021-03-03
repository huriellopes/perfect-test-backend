<?php

namespace App\Architecture\Client\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $primaryKey = 'id_client';
}
