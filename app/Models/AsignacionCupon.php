<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignacionCupon extends Model
{
    use HasFactory;

    protected $table = 'asignaciones_cupones';

    protected $fillable = [
        'cupon_id',
        'user_id',
        'comercio_id',
        'fecha_canje',
        'userId'
    ];

    public function cupon()
    {
        return $this->belongsTo(Cupon::class, 'cupon_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
        public function almacen()
    {
        return $this->belongsTo(Comercio::class, 'comercio_id');
    }
    
}
