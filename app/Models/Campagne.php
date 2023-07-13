<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campagne extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date_debut',
        'date_fin',
        'nom',
        'reduction',
    ];

    //nom au pluriel car plusieurs articles peuvent être dans plusieurs commandes
    // cardinalité 1,n
    public function articles()
    {
        return $this->belongsToMany(Article::class,'campagnes_articles');
    }
}
