<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campania extends Model
{
    use HasFactory;

    protected $table = 'campanias';

    protected $fillable = [
        'nombre',
        'descripcion',
        'descuento_porcentaje',
        'compra_minima',
        'compra_maxima',
        'fecha_caducidad',
        'cantidad_maxima',
        'id_tipo_cliente',
        'activo',
        'banner'
    ];

    public function tipoCliente()
    {
        return $this->belongsTo(TipoCliente::class, 'id_tipo_cliente');
    }

    public function cupones()
    {
        return $this->hasMany(Cupon::class, 'campania_id');
    }

    public function almacenes()
    {
        return $this->belongsToMany(Comercio::class, 'campania_almacen', 'campania_id', 'almacen_id');
    }
    public function getBannerAttribute($value)
    {
        return $value ? asset('storage/' . $value) : null;
    }
}
