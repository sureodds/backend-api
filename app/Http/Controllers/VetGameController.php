<?php

namespace App\Http\Controllers;

use App\Helpers\CompareForcast;
use App\Helpers\Formular;
use App\Models\gameMatch;
use App\Models\Game;

class VetGameController extends Controller
{
    //
    public function rategame() : \Illuminate\Http\JsonResponse
    {
        $games = Game::whereNull('result')->get();

        $games->each(function($game){
            static::validategame($game);
        });

        return $this->success(
            message: "game rated successfully",
            status: 200
        );
    }


    public static function validategame(mixed $game) : void
    {

        $compare_game = new CompareForcast();
        $result =  $compare_game($game);
        $game->update(['result' => $result]);

      /*   if(!empty($result)){
            Formular::combineUserPoints($result, $game->user_id);
        } */

    }

}
