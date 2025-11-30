<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Arr;

class Team extends Model
{

    protected $fillable = ['TeamName',
        'PrimaryReaction',
        'MainCharacterID',
        'SupportCharacter1ID',
        'SupportCharacter2ID',
        'SupportCharacter3ID',];
    protected $primaryKey = 'TeamID';

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);

    }
}
