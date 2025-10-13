<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuponRedimido extends Model
{
    use HasFactory;

    protected $table = 'cupones_redimidos';

    protected $fillable = [
        'id_usuario',
        'userId',
        'couponId',
        'comercioId',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function usuarioExterno()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function cupon()
    {
        return $this->belongsTo(Cupon::class, 'couponId');
    }

    public function comercio()
    {
        return $this->belongsTo(Comercio::class, 'comercioId');
    }
}
