<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    protected $table = 'categorias';

    protected $fillable=[
        'nombre'
    ];

    use HasFactory;

    public function ingresos (){
        return $this->hasMany(Ingreso::class, 'id_categoria');
    }

    public function egresos (){
        return $this->hasMany(Egreso::class, 'id_categoria');
    }
}
