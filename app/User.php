<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     *
     *  Categoria  de Usuários
     *  0 - Usuário comum
     *  1 - Parceiro
     *  2 - Usuário pago
     *  3 - Administrador
     */
    
    protected $fillable = [
        'name', 'email', 'password', 'category'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
