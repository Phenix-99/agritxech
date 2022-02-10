<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agriculteur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'sexe', 'age', 'email', 'telephone', 'whatsapp', 'source', 'biographie', 'possede_agrix'
    ];
}
