<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description', 'description_detaillee', 'image', 'prix', 'stock', 'note', 'gamme_id'];

    public function commandes(){
        return $this->belongsToMany(Commande::class, 'commande_articles')->withPivot('quantite', 'reduction');
    }

    public function campagnes(){
        return $this->belongsToMany(Campagne::class, 'campagne_articles');
    }

    // relation avec les utilisateurs qui mettent l'article en favori
    // on précise le nom table intermédiaire : favoris (= users_articles)
    
    public function users(){           
        return $this->belongsToMany(User::class, 'favoris');
    }

    public function avis() 
    {
        return $this->hasMany(Avis::class);
    }

    public function gamme() 
    {
        return $this->belongsTo(Gamme::class);
    }  
}