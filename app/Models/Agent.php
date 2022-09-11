<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Agent extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'agents';
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = [
        'name',
        'matricule',
        'prenom',
        'fonction',
        'email',
        'id_user'
    ];

    /*public function rapports()
    {
        return $this->hasMany(Rapport::class,'id_agent','id');
    }*/


}
