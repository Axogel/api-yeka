<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursillo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
    ];

    /**
     * The users that belong to the cursillo.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'cursillo_user', 'cursillo_id', 'user_id')
            ->withTimestamps();
    }
}
