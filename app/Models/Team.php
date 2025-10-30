<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Arr;

class Team extends Model
{

    protected $fillable = ['reaction', 'character', 'element'];

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
