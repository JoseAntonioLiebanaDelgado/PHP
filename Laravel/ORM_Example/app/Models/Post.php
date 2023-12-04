<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Taula associada al model
    protected $table = 'posts'; // Per defecte, la taula es diu igual que el model en minúscules i plural

    // Primary key associada al model
    protected $primaryKey = 'postId'; // Per defecte, busca el nom "id"

    // Indicar si és autoincremental
    public $incrementing = false; // Per defecte és true

    // Tipus de primery key
    protected $keyType = 'string'; // Per defecte és integer

    // Indicar si té timestamps
    public $timestamps = false; // Per defecte és true, ja que espera que hi hagi els camps created_at i updated_at

    // Els atributs que volem que es puguin canviar en massa.
    protected $fillable = [
        'postId',
        'message',
    ];
}
