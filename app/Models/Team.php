<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Arr;

class Team extends Model
{

    protected $fillable = [
        'TeamName',
        'image_url',
        'PrimaryReaction',
        'MainCharacterID',
        'SupportCharacter1ID',
        'SupportCharacter2ID',
        'SupportCharacter3ID',
        'is_active',
        'user_id',
    ];
    protected $primaryKey = 'TeamID';

    public function reviews(): HasMany
    {

        return $this->hasMany(Review::class, 'team_id', 'TeamID');
    }


    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function mainCharacter(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Character::class, 'MainCharacterID');
    }

    public function supportCharacter1(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Character::class, 'SupportCharacter1ID');
    }

    public function supportCharacter2(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Character::class, 'SupportCharacter2ID');
    }

    public function supportCharacter3(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Character::class, 'SupportCharacter3ID');
    }


}
