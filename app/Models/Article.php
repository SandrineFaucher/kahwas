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

     //nom au singulier car un article peut être associé qu'à une seule gamme
    // cardinalité 1,1
    public function gamme()
    {
        return $this->belongsTo(Gamme::class);
    }

     //nom au pluriel car plusieurs articles peuvent être mis dans les favoris
    // cardinalité 0,n
    public function favoris()
    {
        return $this->belongsToMany(User::class,'favoris');
    }

    //nom au pluriel car plusieurs articles peuvent avoir un avis
    // cardinalité 0,n
    public function avis()
    {
        return $this->hasMany(Avis::class);
    }

    //nom au pluriel car plusieurs articles peuvent être dans plusieurs commandes
    // cardinalité 0,n
    public function commandes()
    {
        //withPivot(array('quantite','reduction')) = car on rajoute 2 champs supplémentaires : quantite et reduction
        return $this->belongsToMany(Commande::class,'commandes_articles')->withPivot(array('quantite','reduction'));
    }

    //nom au pluriel car plusieurs articles peuvent être dans plusieurs campagnes
    // cardinalité 0,n
    public function campagnes()
    {
        return $this->belongsToMany(Campagne::class,'campagnes_articles');
    }

}
