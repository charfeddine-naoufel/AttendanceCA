<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;
    protected $casts = [
        'date' => 'datetime:Y-m-d',
        'eleves_presents' => 'array',
        'eleves_absentss' => 'array'
    ];

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }

    public function prof()
    {
        return $this->belongsTo(Prof::class);
    }
    
    public function getProfSeances($id)
    {
        return Seance::where('id', $id)->first();
    }
    
}
