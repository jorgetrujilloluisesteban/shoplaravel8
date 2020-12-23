<?php

namespace App\Models;

use App\Catalog;
use Session;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'orders2';

    protected $fillable = [
        'name', 'email', 'address', 'ordercontent', 'fecharegistro' , 'estado',
    ];
}