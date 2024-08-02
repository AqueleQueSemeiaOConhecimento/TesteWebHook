<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $table = 'pessoas';

    public function followers()
    {
        return $this->belongsToMany(Pessoa::class, 'pessoas_followers', 'pessoa_id', 'follower_id');
    }

    public function following()
    {
        return $this->belongsToMany(Pessoa::class, 'pessoas_followers', 'follower_id', 'pessoa_id');
    }
}
