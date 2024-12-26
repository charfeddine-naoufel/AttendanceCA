<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    use HasFactory;
    protected $guarded = ['nom_niv_fr','nom_niv_ar'];

    public function groupes()
    {
        return $this->hasMany(Groupe::class);
    }
}
