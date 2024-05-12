<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule',
        'nomPost',
        'pi',
        'pa',
        'dis',
        'ln',
        'ln1',
        'ln2',
        'ln3',
        'lna',
        'lna1',
        'lna2',
        'lna3',
        'tension'
    ];


    public function clients()
    {
        return $this->hasMany(Client::class, 'matricule_id');
    }
}
