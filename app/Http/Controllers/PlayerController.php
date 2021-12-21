<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    /*
     * This will list top 10 players with heighest scores
     */
    public function index()
    {
        $players = new Player();
        $players = $players->orderBy('highest_score', 'desc')->take(10)->get();
        return $players;
    }

    /*
     * Stores a new player
     */
    public function store(Request $request)
    {
        $player = new Player();
        $player = $player->create($request->all());
        return response()->json($player, 201);
    }

    /*
     * This will store player's score once the game is finished
     */
    public function submitScore(Request $request, $player_id)
    {
        $score = new Score();
        $score->player_id = $player_id;
        $score->score = $request->score;
        $score = $score->save();

        $max_score = Score::all()->where('player_id', $player_id)->max('score');

        error_log('max scores is: ' );
        error_log($max_score);
        error_log($player_id);

        $affected = DB::table('players')
            ->where('id', $player_id)
            ->update(['highest_score' => $max_score]);
        return response()->json($score, 201);


    }

    public function show($player_id)
    {
        $player = new Player();
        $player = $player->findOrFail($player_id);
        return $player;
    }

    /**
     * Update the specified player in storage.
     *
     */
    public function update(Request $request, Player $player)
    {
        $player = new Player();
        $player->update($request->all());
        return response()->json($player, 200);
    }

    /**
     * Remove the specified player from storage.
     *
     */
    public function destroy(Player $player)
    {
        $player->delete();

        return response()->json(null, 204);
    }
}
