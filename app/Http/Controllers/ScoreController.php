<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScoreController extends Controller
{

    /*
     * Not used anymore...
     */
    public function store(Request $request)
    {
        $score = new Score();
        $score->create($request->all());
        error_log($request);
        $max_score = $score->where('player_id', $request->player_id)->max('score');
        DB::table('players')
            ->where('id', $request->player_id)
            ->update(['highest_score', $max_score]);
        return response()->json($score, 201);
    }

}
