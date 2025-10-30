<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Team extends Model
{
    protected $table = 'genshin_teams';
    protected $fillable = ['reaction', 'character', 'element'];
}
