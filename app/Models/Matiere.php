<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;
    protected $guarded = ['nom_mat_fr','nom_mat_ar'];
    public function groupes()
    {
        return $this->hasMany(Groupe::class);
    }

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }
}
