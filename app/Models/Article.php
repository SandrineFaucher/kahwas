<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'gamme_id',
        'nom',
        'description',
        'description_detaillee',
        'image',
        'prix',
        'stock',
        'note',
    ];

    public function commandes(){
        return $this->belongsToMany(Commande::class, 'commande_articles')->withPivot('quantite', 'reduction');
    }

     //nom au pluriel car plusieurs articles peuvent être mis dans les favoris
    // cardinalité 0,n
    public function users()
    {
        return $this->belongsToMany(User::class,'favoris');

    }
    
    //nom au pluriel car plusieurs articles peuvent avoir un avis
    // cardinalité 0,n

    public function campagnes(){
        return $this->belongsToMany(Campagne::class, 'campagne_articles');
    }

    // relation avec les utilisateurs qui mettent l'article en favori
    // on précise le nom table intermédiaire : favoris (= users_articles)
    

    public function avis() 
    {
        return $this->hasMany(Avis::class);
    }

    public function gamme() 
    {
        return $this->belongsTo(Gamme::class);
    }  
}