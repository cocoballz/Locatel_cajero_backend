<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuentaModel extends Model
{
    use HasFactory;
    protected $table = 'user_cuentas';
    protected $guarded = ['id','created_at','updated_at'];


}
