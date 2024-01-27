<?php

namespace App\Actions;

use App\Enums\BetOdds;

class BettingOdds
 {
    public static function oddCheck(mixed $odds, mixed $soccer_record, string $team)
    {
        // if odd is +1.5  or -1.5 then check if the $odds in the odds array, then
        $home_team = $soccer_record['goals']['home'];
        $away_team = $soccer_record['goals']['away'];

        // check if the $odds is in the odds array
        // if it is then check if the $team is the home team or away team
        // check if $odd is positive or negative
        // check if $home_team team can either win the match, draw, or lose by a margin of 1 goal.
        // If the underdog team loses by 2 goals or more, the bet is not successful

        switch ($odds) {
            case BetOdds::NEGATIVE_ZERO_POINT_FIVE->value:
                # code...
                if ($team == 'home') {
                    if (($home_team >= 1)  && ($home_team > $away_team)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 1)  && ($away_team > $home_team)) {
                        return true;
                    }
                    return false;
                }
                break;
            case BetOdds::NEGATIVE_ONE_POINT_ZERO->value || BetOdds::NEGATIVE_ONE_POINT_FIVE->value ||
                BetOdds::NEGATIVE_TWO_POINT_ZERO->value:
                # code...

                /**
                 * Handicap: -1.0
                 *Outcome: Favored team needs to win by at least two goals.
                 *If you place a bet on a team with a -1.0 handicap, here's what it means:

                 *The favored team needs to win the match by a margin of at least two goals for your bet to be successful.
                 *If the favored team wins by exactly one goal, your bet is considered a push, and your stake is returned (neither a win nor a loss).
                 *If the favored team draws or loses the match, your bet is not successful.
                 */
                if ($team == 'home') {
                    if (($home_team >= 2)  && ($home_team > $away_team)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 2)  && ($away_team > $home_team)) {
                        return true;
                    }
                    return false;
                }
                break;
            case BetOdds::NEGATIVE_TWO_POINT_FIVE->value || BetOdds::NEGATIVE_THREE_POINT_ZERO->value:
                # code...
                /**
                 * Handicap: -2.5
                 *Outcome: Favored team needs to win by at least three goals.
                 *If you place a bet on a team with a -2.5 handicap, here's what it means:

                 *The favored team needs to win the match by a margin of at least three goals for your bet to be successful.
                 *If the favored team wins by exactly two goals, your bet is considered a push, and your stake is returned (neither a win nor a loss).
                 *If the favored team wins by exactly one goal, draws, or loses the match, your bet is not successful.
                 */
                if ($team == 'home') {
                    if (($home_team >= 3)  && ($home_team > $away_team)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 3)  && ($away_team > $home_team)) {
                        return true;
                    }
                    return false;
                }
                break;

            case BetOdds::NEGATIVE_THREE_POINT_FIVE->value || BetOdds::NEGATIVE_FOUR_POINT_ZERO->value:

                /**
                 * Handicap: -3.5
                 *Outcome: Favored team needs to win by at least four goals.
                 *If you place a bet on a team with a -3.5 handicap, here's what it means:

                 *The favored team needs to win the match by a margin of at least four goals for your bet to be successful.
                 *If the favored team wins by exactly three goals, your bet is considered a push, and your stake is returned (neither a win nor a loss).
                 *If the favored team wins by exactly two goals, one goal, draws, or loses the match, your bet is not successful.
                 */
                # code...
                if ($team == 'home') {
                    if (($home_team >= 4)  && ($home_team > $away_team)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 4)  && ($away_team > $home_team)) {
                        return true;
                    }
                    return false;
                }
                break;
            case BetOdds::NEGATIVE_FOUR_POINT_FIVE->value || BetOdds::NEGATIVE_FIVE_POINT_ZERO->value:

                /**
                 * Handicap: -4.5
                 *Outcome: Favored team needs to win by at least five goals.
                 *If you place a bet on a team with a -4.5 handicap, here's what it means:

                 *The favored team needs to win the match by a margin of at least five goals for your bet to be successful.
                 *If the favored team wins by exactly four goals, your bet is considered a push, and your stake is returned (neither a win nor a loss).
                 *If the favored team wins by exactly three goals, two goals, one goal, draws, or loses the match, your bet is not successful.
                 */
                # code...
                if ($team == 'home') {
                    if (($home_team >= 5)  && ($home_team > $away_team)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 5)  && ($away_team > $home_team)) {
                        return true;
                    }
                    return false;
                }
                break;
            case BetOdds::NEGATIVE_FIVE_POINT_FIVE->value:

                /**
                 * Handicap: -5.5
                 *Outcome: Favored team needs to win by at least six goals.
                 *If you place a bet on a team with a -5.5 handicap, here's what it means:

                 *The favored team needs to win the match by a margin of at least six goals for your bet to be successful.
                 *If the favored team wins by exactly five goals, your bet is considered a push, and your stake is returned (neither a win nor a loss).
                 *If the favored team wins by exactly four goals, three goals, two goals, one goal, draws, or loses the match, your bet is not successful.
                 */
                # code...
                if ($team == 'home') {
                    if (($home_team >= 6)  && ($home_team > $away_team)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 6)  && ($away_team > $home_team)) {
                        return true;
                    }
                    return false;
                }
                break;
            case BetOdds::NEGATIVE_SIX_POINT_FIVE->value || BetOdds::NEGATIVE_SIX_POINT_ZERO->value:

                /**
                 * Handicap: -6.5
                 *Outcome: Favored team needs to win by at least seven goals.
                 *If you place a bet on a team with a -6.5 handicap, here's what it means:

                 *The favored team needs to win the match by a margin of at least seven goals for your bet to be successful.
                 *If the favored team wins by exactly six goals, your bet is considered a push, and your stake is returned (neither a win nor a loss).
                 *If the favored team wins by exactly five goals, four goals, three goals, two goals, one goal, draws, or loses the match, your bet is not successful.
                 */
                # code...
                if ($team == 'home') {
                    if (($home_team >= 7)  && ($home_team > $away_team)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 7)  && ($away_team > $home_team)) {
                        return true;
                    }
                    return false;
                }
                break;
            case BetOdds::NEGATIVE_SEVEN_POINT_ZERO->value || BetOdds::NEGATIVE_SEVEN_POINT_FIVE->value:

                if ($team == 'home') {
                    if (($home_team >= 8)  && ($home_team > $away_team)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 8)  && ($away_team > $home_team)) {
                        return true;
                    }
                    return false;
                }
                break;

            case BetOdds::NEGATIVE_EIGHT_POINT_ZERO->value || BetOdds::NEGATIVE_EIGHT_POINT_FIVE->value:

                if ($team == 'home') {
                    if (($home_team >= 9)  && ($home_team > $away_team)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 9)  && ($away_team > $home_team)) {
                        return true;
                    }
                    return false;
                }
                break;
            case BetOdds::NEGATIVE_NINE_POINT_ZERO->value ||
                BetOdds::NEGATIVE_NINE_POINT_FIVE->value:
                if ($team == 'home') {
                    if (($home_team >= 10)  && ($home_team > $away_team)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 10)  && ($away_team > $home_team)) {
                        return true;
                    }
                    return false;
                }
                break;

            case BetOdds::NEGATIVE_TEN_POINT_ZERO->value || BetOdds::NEGATIVE_TEN_POINT_FIVE->value:
                if ($team == 'home') {
                    if (($home_team >= 11)  && ($home_team > $away_team)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 11)  && ($away_team > $home_team)) {
                        return true;
                    }
                    return false;
                }
                break;

            case BetOdds::NEGATIVE_ELEVEN_POINT_ZERO->value || BetOdds::NEGATIVE_ELEVEN_POINT_FIVE->value:
                if ($team == 'home') {
                    if (($home_team >= 12)  && ($home_team > $away_team)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 12)  && ($away_team > $home_team)) {
                        return true;
                    }
                    return false;
                }
                break;

            case BetOdds::NEGATIVE_TWELVE_POINT_ZERO->value || BetOdds::NEGATIVE_TWELVE_POINT_FIVE->value:
                if ($team == 'home') {
                    if (($home_team >= 13)  && ($home_team > $away_team)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 13)  && ($away_team > $home_team)) {
                        return true;
                    }
                    return false;
                }
                break;

            case BetOdds::NEGATIVE_THIRTEEN_POINT_ZERO->value || BetOdds::NEGATIVE_THIRTEEN_POINT_FIVE->value:
                if ($team == 'home') {
                    if (($home_team >= 14)  && ($home_team > $away_team)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 14)  && ($away_team > $home_team)) {
                        return true;
                    }
                    return false;
                }
                break;

            case BetOdds::NEGATIVE_FOURTEEN_POINT_ZERO->value || BetOdds::NEGATIVE_FOURTEEN_POINT_FIVE->value:
                if ($team == 'home') {
                    if (($home_team >= 15)  && ($home_team > $away_team)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 15)  && ($away_team > $home_team)) {
                        return true;
                    }
                    return false;
                }
                break;

            case BetOdds::NEGATIVE_FIFTEEN_POINT_ZERO->value || BetOdds::NEGATIVE_FIFTEEN_POINT_FIVE->value:
                if ($team == 'home') {
                    if (($home_team >= 16)  && ($home_team > $away_team)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 16)  && ($away_team > $home_team)) {
                        return true;
                    }
                    return false;
                }
                break;

            case BetOdds::POSITIVE_ZERO_POINT_FIVE->value:
                if ($team == 'home') {
                    if (($home_team >= 1) || ($home_team == $away_team) || ($away_team - $home_team == 1)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 1) || ($away_team == $home_team) || ($home_team - $away_team == 1)) {
                        return true;
                    }
                    return false;
                }
                break;

            case BetOdds::POSITIVE_ONE_POINT_ZERO->value || BetOdds::POSITIVE_ONE_POINT_FIVE->value:
                if ($team == 'home') {
                    if (($home_team >= 1) || ($home_team == $away_team) || ($away_team - $home_team == 1)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 1) || ($away_team == $home_team) || ($home_team - $away_team == 1)) {
                        return true;
                    }
                    return false;
                }
                break;

            case BetOdds::POSITIVE_TWO_POINT_FIVE->value:
                if ($team == 'home') {
                    if (($home_team >= 2) || ($home_team == $away_team) || ($away_team - $home_team == 2)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 2) || ($away_team == $home_team) || ($home_team - $away_team == 2)) {
                        return true;
                    }
                    return false;
                }
                break;

            case BetOdds::POSITIVE_THREE_POINT_ZERO->value || BetOdds::POSITIVE_THREE_POINT_FIVE->value:
                if ($team == 'home') {
                    if (($home_team >= 3) || ($home_team == $away_team) || ($away_team - $home_team == 3)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 3) || ($away_team == $home_team) || ($home_team - $away_team == 3)) {
                        return true;
                    }
                    return false;
                }
                break;

            case BetOdds::POSITIVE_FOUR_POINT_ZERO->value || BetOdds::POSITIVE_FOUR_POINT_FIVE->value:
                if ($team == 'home') {
                    if (($home_team >= 4) || ($home_team == $away_team) || ($away_team - $home_team == 4)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 4) || ($away_team == $home_team) || ($home_team - $away_team == 4)) {
                        return true;
                    }
                    return false;
                }
                break;

            case BetOdds::POSITIVE_FIVE_POINT_ZERO->value || BetOdds::POSITIVE_FIVE_POINT_FIVE->value:
                if ($team == 'home') {
                    if (($home_team >= 5) || ($home_team == $away_team) || ($away_team - $home_team == 5)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 5) || ($away_team == $home_team) || ($home_team - $away_team == 5)) {
                        return true;
                    }
                    return false;
                }
                break;

            case BetOdds::POSITIVE_SIX_POINT_ZERO->value || BetOdds::POSITIVE_SIX_POINT_FIVE->value:
                if ($team == 'home') {
                    if (($home_team >= 6) || ($home_team == $away_team) || ($away_team - $home_team == 6)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 6) || ($away_team == $home_team) || ($home_team - $away_team == 6)) {
                        return true;
                    }
                    return false;
                }
                break;

            case BetOdds::POSITIVE_SEVEN_POINT_ZERO->value || BetOdds::POSITIVE_SEVEN_POINT_FIVE->value:
                if ($team == 'home') {
                    if (($home_team >= 7) || ($home_team == $away_team) || ($away_team - $home_team == 7)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 7) || ($away_team == $home_team) || ($home_team - $away_team == 7)) {
                        return true;
                    }
                    return false;
                }
                break;

            case BetOdds::POSITIVE_EIGHT_POINT_ZERO->value || BetOdds::POSITIVE_EIGHT_POINT_FIVE->value:
                if ($team == 'home') {
                    if (($home_team >= 8) || ($home_team == $away_team) || ($away_team - $home_team == 8)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 8) || ($away_team == $home_team) || ($home_team - $away_team == 8)) {
                        return true;
                    }
                    return false;
                }
                break;

            case BetOdds::POSITIVE_NINE_POINT_ZERO->value || BetOdds::POSITIVE_NINE_POINT_FIVE->value:
                if ($team == 'home') {
                    if (($home_team >= 9) || ($home_team == $away_team) || ($away_team - $home_team == 9)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 9) || ($away_team == $home_team) || ($home_team - $away_team == 9)) {
                        return true;
                    }
                    return false;
                }
                break;

            case BetOdds::POSITIVE_TEN_POINT_ZERO->value || BetOdds::POSITIVE_TEN_POINT_FIVE->value:
                if ($team == 'home') {
                    if (($home_team >= 10) || ($home_team == $away_team) || ($away_team - $home_team == 10)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 10) || ($away_team == $home_team) || ($home_team - $away_team == 10)) {
                        return true;
                    }
                    return false;
                }
                break;

            case BetOdds::POSITIVE_ELEVEN_POINT_ZERO->value || BetOdds::POSITIVE_ELEVEN_POINT_FIVE->value:

                if ($team == 'home') {
                    if (($home_team >= 11) || ($home_team == $away_team) || ($away_team - $home_team == 11)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 11) || ($away_team == $home_team) || ($home_team - $away_team == 11)) {
                        return true;
                    }
                    return false;
                }
                break;

            case BetOdds::POSITIVE_TWELVE_POINT_ZERO->value || BetOdds::POSITIVE_TWELVE_POINT_FIVE->value:
                if ($team == 'home') {
                    if (($home_team >= 12) || ($home_team == $away_team) || ($away_team - $home_team == 12)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 12) || ($away_team == $home_team) || ($home_team - $away_team == 12)) {
                        return true;
                    }
                    return false;
                }
                break;

            case BetOdds::POSITIVE_THIRTEEN_POINT_ZERO->value || BetOdds::POSITIVE_THIRTEEN_POINT_FIVE->value:
                if ($team == 'home') {
                    if (($home_team >= 13) || ($home_team == $away_team) || ($away_team - $home_team == 13)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 13) || ($away_team == $home_team) || ($home_team - $away_team == 13)) {
                        return true;
                    }
                    return false;
                }
                break;

            case BetOdds::POSITIVE_FOURTEEN_POINT_ZERO->value || BetOdds::POSITIVE_FOURTEEN_POINT_FIVE->value:
                if ($team == 'home') {
                    if (($home_team >= 14) || ($home_team == $away_team) || ($away_team - $home_team == 14)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 14) || ($away_team == $home_team) || ($home_team - $away_team == 14)) {
                        return true;
                    }
                    return false;
                }
                break;

            case BetOdds::POSITIVE_FIFTEEN_POINT_ZERO->value || BetOdds::POSITIVE_FIFTEEN_POINT_FIVE->value:
                if ($team == 'home') {
                    if (($home_team >= 15) || ($home_team == $away_team) || ($away_team - $home_team == 15)) {
                        return true;
                    }
                    return false;
                }
                if ($team == 'away') {
                    if (($away_team >= 15) || ($away_team == $home_team) || ($home_team - $away_team == 15)) {
                        return true;
                    }
                    return false;
                }
                break;

            default:
                # code...
                break;
        }
    }
 }
