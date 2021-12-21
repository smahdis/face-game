<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Score extends Model
{
    use HasFactory;
    protected $fillable = [

        'player_id',
        'score'
    ];
}
