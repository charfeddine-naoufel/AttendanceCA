<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;
    protected $casts = [
        'montant' => 'array',
        'paidseances' => 'array',
    ];
    public function groupes()
    {
        return $this->belongsToMany(Groupe::class, 'eleve_groupe', 'eleve_id', 'groupe_id')->withTimestamps();
    }
}
