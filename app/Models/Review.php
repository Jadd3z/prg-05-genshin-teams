<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    protected $fillable = ['user_id', 'team_id', 'body', 'rating'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id', 'TeamID');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
