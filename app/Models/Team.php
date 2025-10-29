<?php

namespace App\Models;


use Illuminate\Support\Arr;

class Team
{
    public static function all(): array
    {
        return [
            [
                'id' => 1,
                'reaction' => 'bloom',
                'elements' => 'Hydro and Dendro'
            ],
            [
                'id' => 2,
                'reaction' => 'vape',
                'elements' => 'Hydro and Pyro'
            ],

            [
                'id' => 3,
                'reaction' => 'Freeze',
                'elements' => 'Hydro and Cryo'
            ]

        ];
    }


    public static function find(int $id): array
    {
        $team = Arr::first(static::all(), fn($team) => $team['id'] == $id);

        if (!$team) {
            abort(404);
        }
    }
}
