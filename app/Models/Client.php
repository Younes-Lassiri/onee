<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    protected $fillable = [
        'firstName',
        'lastName',
        'cin',
        'address',
        'telephone',
        'type_activite',
        'puissance_demande',
        'matricule_id',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'matricule_id');
    }
}
