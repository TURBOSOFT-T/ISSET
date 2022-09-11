<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Rapport extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'rapports';
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = [
        'date',
        'matricule',
        'id_agent',
        'id_user',
        'nomcomplet',
        'nbre_tf_impactes',
        'nbre_inscription',
        'nbre_tf_crees',
        'date_save'
    ];

    /*public function agent()
    {
        return $this->belongsTo(Agent::class,'id_agent','id');
    }*/
}
