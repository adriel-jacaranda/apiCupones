<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Comercio extends Model
{
    use HasFactory;

    protected $table = 'comercios';

    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'lat',
        'lng',
        'logo',
        'categoria_almacen_id',
        'activo',
    ];

    /**
     * Relación con la categoría de almacén.
     * Un almacén pertenece a una categoría.
     */
    public function categoria()
    {
        return $this->belongsTo(CategoriaAlmacen::class, 'categoria_almacen_id');
    }

    /**
     * Devuelve la URL completa del logo.
     */


        public function getLogoAttribute($value)
    {
    return $value ? asset('storage/' . $value) : null;
    }

    public function campanias()
{
    return $this->belongsToMany(Campania::class, 'campania_almacen', 'almacen_id', 'campania_id');
}
}
