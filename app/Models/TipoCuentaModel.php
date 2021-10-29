<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCuentaModel extends Model
{
    use HasFactory;
    protected $table = 'tipo_cuenta';
    protected $guarded = ['id','created_at','updated_at'];
}
