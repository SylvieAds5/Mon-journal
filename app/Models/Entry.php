<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entree extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'contenu',
        'resume',
        'date_ecriture',
        'chemin_image',
        'user_id',
    ];

    // Une entrée appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
