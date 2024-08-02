<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 *
 * @property $id
 * @property $identificacion
 * @property $nombre
 * @property $password
 * @property $rol
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @property Visita[] $visitas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Authenticatable
{/**
     * Determine if the user is an admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->rol === 'admin';
    }

    /**
     * Determine if the user is a guard.
     *
     * @return bool
     */
    public function isGuard()
    {
        return $this->rol === 'guardia';
    }
    use Notifiable;

    protected $perPage = 20;
   
   

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'identificacion',
        'nombre',
        'password',
        'rol',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function visitas()
    {
        return $this->hasMany(Visita::class, 'guardia_id', 'id');
    }
}
