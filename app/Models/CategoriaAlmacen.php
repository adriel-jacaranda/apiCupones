<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaAlmacen extends Model
{
    use HasFactory;

    protected $table = 'categoria_almacen';

    protected $fillable = [
        'nombre',
        'descripcion',
        'icono',
        'activo',
    ];

    /**
     * Relación con almacenes.
     * Una categoría puede tener muchos almacenes.
     */
    public function almacenes()
    {
        return $this->hasMany(Comercio::class, 'categoria_almacen_id');
    }

     public function getIconoAttribute($value)
    {
    return $value ? asset('storage/' . $value) : null;
    }

    protected $casts = [
        'activo' => 'boolean',
    ];
}
