<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Visita
 *
 * @property $id
 * @property $prisionero_id
 * @property $visitante_id
 * @property $fecha_hora_inicio
 * @property $fecha_hora_fin
 * @property $guardia_id
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @property Prisionero $prisionero
 * @property Visitante $visitante
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Visita extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['prisionero_id', 'visitante_id', 'fecha_hora_inicio', 'fecha_hora_fin', 'guardia_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'guardia_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prisionero()
    {
        return $this->belongsTo(\App\Models\Prisionero::class, 'prisionero_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function visitante()
    {
        return $this->belongsTo(\App\Models\Visitante::class, 'visitante_id', 'id');
    }
    
}
