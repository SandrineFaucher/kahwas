<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

          /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'numero',
        'adresse_livraison_id',
        'adresse_facturation_id',
        'prix',
    ];

    //nom au singulier car une commande peut être associée qu'à un user
    // cardinalité 1,1
    public function user()
    {
        return $this->belongsTo(User::class);
    }

     //nom au pluriel car plusieurs articles peuvent être associés à plusieurs commandes
    // cardinalité 1,n
    public function articles()
    {
        //withPivot(array('quantite','reduction')) = car on rajoute 2 champs supplémentaires : quantite et reduction
        return $this->belongsToMany(Article::class,'commandes_articles')->withPivot(array('quantite','reduction'));
    }
}
