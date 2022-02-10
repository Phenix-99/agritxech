<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;
    protected $fillable = [
        'pays', 'region', 'superficie', 'localisation_champ', 'date_semis', 'date_anticipe_recolte', 'date_prise_contact', 'plante_id', 'agriculteur_id'
    ];
}