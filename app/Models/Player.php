<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Player extends Model
{
    use HasFactory;

    protected $fillable = [

        'player_first_name',
        'player_last_name',
        'player_cellphone',
        'player_email'

    ];
}
