<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $primaryKey = 'CharacterID';

    public function show(Character $character): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {

        return view('character', [
            'character' => $character
        ]);
    }
}
