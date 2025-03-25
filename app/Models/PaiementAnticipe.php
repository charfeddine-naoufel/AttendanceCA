<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaiementAnticipe extends Model
{
    use HasFactory;
    
        protected $fillable = ['eleve_id','groupe_id', 'montant', 'date_paiement', 'mois', 'utilise'];
    
        protected $casts = [
            'mois' => 'array', 
        ];
    
        public function eleve()
        {
            return $this->belongsTo(Eleve::class);
        }

        public function groupe()
        {
            return $this->belongsTo(Groupe::class);
        }
    
}
