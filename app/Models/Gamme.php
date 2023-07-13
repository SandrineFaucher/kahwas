<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gamme extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
    ];

    //nom au pluriel car plusieurs articles peuvent être associés à une gamme
    // cardinalité 1,n
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
