<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class BetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $bettingOptions = [
            [
                "name" => "Match Winner",
                "description" => "Bet on the team that will win the match.",
                "value" => json_encode(["home","away"]),
                'requires_odd' => false
            ],
            [
                "name" => "Second Half Winner",
                "description" => "Bet on the team that will win the second half of the match.",
                "value" => json_encode(["home","away"]),
                'requires_odd' => false

            ],
            [
                "name" => "Asian Handicap",
                "description" => "Bet on a team with a virtual head start or deficit.",
                "value" => json_encode(["home","away"]),
                'requires_odd' => true
            ],
            [
                "name" => "Goals Over/Under",
                "description" => "Bet on the total number of goals scored to be over or under a specific value.",
                "value" => json_encode(["over","under"]),
                'requires_odd' => true
            ],
            [
                "name" => "Goals Over/Under First Half",
                "description" => "Bet on the total number of goals scored in the first half to be over or under a specific value.",
                "value" => json_encode(["over","under"]),
                'requires_odd' => true
            ],
            [
                // I will come back to you1
                "name" => "HT/FT Double",
                "description" => "Bet on both the half-time and full-time results of a match.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Both Teams Score",
                "description" => "Bet on whether both teams will score at least one goal each in the match.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "Handicap Result",
                "description" => "Bet on the team that will win after the handicap has been applied.",
                "value" => json_encode(["home","away"]),
                'requires_odd' => true
            ],
            [
                "name" => "Exact Score",
                "description" => "Bet on the exact final score of the match.",
                "value" => "open_choice",
                'requires_odd' => false
            ],
            [
                "name" => "Highest Scoring Half",
                "description" => "Bet on which half will have the most goals scored.",
                "value" => "First/Second",
                'requires_odd' => true
            ],
            [
                "name" => "Double Chance",
                "description" => "Bet on two possible outcomes of the match to increase winning chances.",
                "value" => json_encode(["home","away","draw"]),
                'requires_odd' => true
            ],
            [
                "name" => "First Half Winner",
                "description" => "Bet on the team that will win the first half of the match.",
                "value" => json_encode(["home","away"]),
                'requires_odd' => true

            ],
            [
                "name" => "Team To Score First",
                "description" => "Bet on the team that will score the first goal in the match.",
                "value" => json_encode(["home","away"]),
                'requires_odd' => true
            ],
            [
                "name" => "Team To Score Last",
                "description" => "Bet on the team that will score the last goal in the match.",
                "value" => json_encode(["home","away"]),
                'requires_odd' => true
            ],
            [
                "name" => "Total - Home",
                "description" => "Bet on the total number of goals scored by the home team.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Total - Away",
                "description" => "Bet on the total number of goals scored by the away team.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Handicap Result - First Half",
                "description" => "Bet on the team that will win the first half after the handicap has been applied.",
                "value" => json_encode(["home","away"]),
                'requires_odd' => true
            ],
            [
                "name" => "Asian Handicap First Half",
                "description" => "Bet on a team with a virtual head start or deficit in the first half.",
                "value" => json_encode(["home","away"]),
                'requires_odd' => true
            ],
            [
                "name" => "Double Chance - First Half",
                "description" => "Bet on two possible outcomes of the first half to increase winning chances.",
                "value" => json_encode(["home","away","draw"]),
                'requires_odd' => true
            ],
            [
                "name" => json_encode(["odd","even"]),
                "description" => "Bet on whether the total number of goals scored will be an odd or even number.",
                "value" => json_encode(["odd","even"]),
                'requires_odd' => true
            ],
            [
                "name" => "Odd/Even - First Half",
                "description" => "Bet on whether the total number of goals scored in the first half will be an odd or even number.",
                "value" => json_encode(["odd","even"]),
                'requires_odd' => true
            ],
            [
                "name" => "Home Odd/Even",
                "description" => "Bet on whether the total number of goals scored by the home team will be an odd or even number.",
                "value" => json_encode(["odd","even"]),
                'requires_odd' => true
            ],
            [
                "name" => "Results/Both Teams Score",
                "description" => "Bet on the result of the match and whether both teams will score.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Result/Total Goals",
                "description" => "Bet on the result of the match and the total number of goals scored.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Goals Over/Under - Second Half",
                "description" => "Bet on the total number of goals scored in the second half to be over or under a specific value.",
                "value" => json_encode(["over","under"]),
                'requires_odd' => true
            ],
            [
                "name" => "Clean Sheet - Home",
                "description" => "Bet on the home team to keep a clean sheet (not concede any goals).",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "Clean Sheet - Away",
                "description" => "Bet on the away team to keep a clean sheet (not concede any goals).",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "Win to Nil - Home",
                "description" => "Bet on the home team to win the match without conceding any goals.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "Win to Nil - Away",
                "description" => "Bet on the away team to win the match without conceding any goals.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "Correct Score - First Half",
                "description" => "Bet on the exact score of the match at half-time.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Win Both Halves",
                "description" => "Bet on a team to win both the first and second halves of the match.",
                "value" => json_encode(["home","away"]),
                'requires_odd' => true
            ],
            [
                "name" => "Double Chance - Second Half",
                "description" => "Bet on two possible outcomes of the second half to increase winning chances.",
                "value" => json_encode(["home","away","draw"]),
                'requires_odd' => true
            ],
            [
                "name" => "Both Teams Score - First Half",
                "description" => "Bet on whether both teams will score at least one goal each in the first half.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "Both Teams To Score - Second Half",
                "description" => "Bet on whether both teams will score at least one goal each in the second half.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "Win To Nil",
                "description" => "Bet on a team to win the match without conceding any goals.",
                "value" => json_encode(["home","away"]),
                'requires_odd' => true
            ],
            [
                "name" => "Home win both halves",
                "description" => "Bet on the home team to win both the first and second halves of the match.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "Exact Goals Number",
                "description" => "Bet on the exact total number of goals to be scored in the match.",
                "value" => "open_choice",
                'requires_odd' => false
            ],
            [
                "name" => "To Win Either Half",
                "description" => "Bet on a team to win at least one half of the match.",
                "value" => json_encode(["home","away"]),
                'requires_odd' => true
            ],
            [
                "name" => "Home Team Exact Goals Number",
                "description" => "Bet on the exact total number of goals to be scored by the home team.",
                "value" => "open_choice",
                'requires_odd' => false
            ],
            [
                "name" => "Away Team Exact Goals Number",
                "description" => "Bet on the exact total number of goals to be scored by the away team.",
                "value" => "open_choice",
                'requires_odd' => false
            ],
            [
                "name" => "Second Half Exact Goals Number",
                "description" => "Bet on the exact total number of goals to be scored in the second half.",
                "value" => "open_choice",
                'requires_odd' => false
            ],
            [
                "name" => "Home Team Score a Goal",
                "description" => "Bet on whether the home team will score at least one goal in the match.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "Away Team Score a Goal",
                "description" => "Bet on whether the away team will score at least one goal in the match.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "Corners Over Under",
                "description" => "Bet on the total number of corners to be over or under a specific value.",
                "value" => json_encode(["over","under"])
            ],
            [
                "name" => "Exact Goals Number - First Half",
                "description" => "Bet on the exact total number of goals to be scored in the first half.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Winning Margin",
                "description" => "Bet on the margin of victory for the winning team.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "To Score In Both Halves By Teams",
                "description" => "Bet on both teams to score at least one goal each in both the first and second halves.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "Total Goals/Both Teams To Score",
                "description" => "Bet on the total number of goals and whether both teams will score.",
                "value" => "open_choice",
                'requires_odd' => false
            ],
            [
                "name" => "Goal Line",
                "description" => "Bet on the total number of goals scored to be over or under a specific value.",
                "value" => json_encode(["over","under"]),
                'requires_odd' => true
            ],
            [
                "name" => "Halftime Result/Total Goals",
                "description" => "Bet on the half-time result and the total number of goals scored.",
                "value" => "open_choice",
                'requires_odd' => true

            ],
            [
                "name" => "Halftime Result/Both Teams Score",
                "description" => "Bet on the half-time result and whether both teams will score.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Away win both halves",
                "description" => "Bet on the away team to win both the first and second halves of the match.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "First 10mins Winner",
                "description" => "Bet on the team that will be leading at the end of the first 10 minutes.",
                "value" =>json_encode(["home","away","draw"]),
                'requires_odd' => true
            ],
            [
                "name" => "Corners 1x2",
                "description" => "Bet on the team that will have more corners in the match.",
                "value" => json_encode(["home","away"]),
                'requires_odd' => true
            ],
            [
                "name" => "Corners Asian Handicap",
                "description" => "Bet on a team with a handicap to overcome in terms of corners.",
                "value" => json_encode(["home","away"]),
                'requires_odd' => true
            ],
            [
                "name" => "Home Corners Over/Under",
                "description" => "Bet on the total number of corners taken by the home team to be over or under a specific value.",
                "value" => json_encode(["over","under"]),
                'requires_odd' => true
            ],
            [
                "name" => "Away Corners Over/Under",
                "description" => "Bet on the total number of corners taken by the away team to be over or under a specific value.",
                "value" => json_encode(["over","under"]),
                'requires_odd' => true
            ],
            [
                "name" => "Own Goal",
                "description" => "Bet on whether an own goal will be scored in the match.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "Away Odd/Even",
                "description" => "Bet on whether the total number of goals scored by the away team will be an odd or even number.",
                "value" => json_encode(["odd","even"]),
                'requires_odd' => false
            ],
            [
                "name" => "To Qualify",
                "description" => "Bet on a team to qualify for the next round or stage of a competition.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => false
            ],
            [
                "name" => "Correct Score - Second Half",
                "description" => "Bet on the exact score of the match in the second half.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Odd/Even - Second Half",
                "description" => "Bet on whether the total number of goals scored in the second half will be an odd or even number.",
                "value" => json_encode(["odd","even"]),
                'requires_odd' => true
            ],
            [
                "name" => "Goal Line (1st Half)",
                "description" => "Bet on the total number of goals scored in the first half to be over or under a specific value.",
                "value" => json_encode(["over","under"]),
                'requires_odd' => true
            ],
            [
                "name" => "Both Teams to Score 1st Half - 2nd Half",
                "description" => "Bet on both teams to score in both the first and second halves.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "10 Over/Under",
                "description" => "Bet on the total number of goals to be over or under 10.",
                "value" => json_encode(["over","under"]),
                'requires_odd' => false
            ],
            [
                "name" => "Last Corner",
                "description" => "Bet on which team will take the last corner in the match.",
                "value" => json_encode(["home","away","none"]),
                'requires_odd' => true
            ],
            [
                "name" => "First Corner",
                "description" => "Bet on which team will take the first corner in the match.",
                "value" => json_encode(["home","away"]),
                'requires_odd' => true
            ],
            [
                "name" => "Total Corners (1st Half)",
                "description" => "Bet on the total number of corners to be taken in the first half.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "RTG_H1",
                "description" => "Bet on the team that will be leading at half-time.",
                "value" =>json_encode(["home","away","draw"]),
                'requires_odd' => true
            ],
            [
                "name" => "Cards European Handicap",
                "description" => "Bet on a team with a handicap to overcome in terms of cards.",
                "value" => json_encode(["home","away"]),
                'requires_odd' => true
            ],
            [
                "name" => "Cards Over/Under",
                "description" => "Bet on the total number of cards shown to be over or under a specific value.",
                "value" => json_encode(["over","under"]),
                'requires_odd' => true
            ],
            [
                "name" => "Cards Asian Handicap",
                "description" => "Bet on a team with a handicap to overcome in terms of cards.",
                "value" => json_encode(["home","away"]),
                'requires_odd' => true
            ],
            [
                "name" => "Home Team Total Cards",
                "description" => "Bet on the total number of cards shown to the home team.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Away Team Total Cards",
                "description" => "Bet on the total number of cards shown to the away team.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Total Corners (3 way) (1st Half)",
                "description" => "Bet on the total number of corners to be taken in the first half in a 3-way market.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Total Corners (3 way)",
                "description" => "Bet on the total number of corners to be taken in a 3-way market.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "RCARD",
                "description" => "Bet on whether a red card will be shown in the match.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "Total ShotOnGoal",
                "description" => "Bet on the total number of shots on goal by both teams.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Home Total ShotOnGoal",
                "description" => "Bet on the total number of shots on goal by the home team.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Away Total ShotOnGoal",
                "description" => "Bet on the total number of shots on goal by the away team.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Total Goals (3 way)",
                "description" => "Bet on the total number of goals scored in a 3-way market.",
                "value" => "open_choice",
                'requires_odd' => false
            ],
            [
                "name" => "Anytime Goal Scorer",
                "description" => "Bet on a player to score a goal at any time during the match.",
                "value" => "open_choice",
                'requires_odd' => false
            ],
            [
                "name" => "First Goal Scorer",
                "description" => "Bet on a player to score the first goal of the match.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Last Goal Scorer",
                "description" => "Bet on a player to score the last goal of the match.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "To Score Two or More Goals",
                "description" => "Bet on a player to score two or more goals in the match.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "First Goal Method",
                "description" => "Bet on how the first goal of the match will be scored (e.g., header, penalty, etc.).",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "To Score A Penalty",
                "description" => "Bet on a team or player to score a penalty in the match.",
                "value" => json_encode(["home","away","player"]),
                'requires_odd' => true
            ],
            [
                "name" => "To Miss A Penalty",
                "description" => "Bet on a team or player to miss a penalty in the match.",
                "value" => json_encode(["home","away","player"]),
                'requires_odd' => true
            ],
            [
                "name" => "Player to be booked",
                "description" => "Bet on a player to receive a yellow or red card during the match.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
       /*      [
                "name" => "Player to be Sent Off",
                "description" => "Bet on a player to be shown a red card and be sent off during the match.",
                "value" => "open_choice",
                'requires_odd' => true
            ], */
            [
                "name" => "Asian Handicap (2nd Half)",
                "description" => "Bet on a team with a virtual head start or deficit in the second half.",
                "value" => json_encode(["home","away"]),
                'requires_odd' => true
            ],
            [
                "name" => "Home Team Total Goals(1st Half)",
                "description" => "Bet on the total number of goals to be scored by the home team in the first half.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Away Team Total Goals(1st Half)",
                "description" => "Bet on the total number of goals to be scored by the away team in the first half.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Home Team Total Goals(2nd Half)",
                "description" => "Bet on the total number of goals to be scored by the home team in the second half.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Away Team Total Goals(2nd Half)",
                "description" => "Bet on the total number of goals to be scored by the away team in the second half.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Draw No Bet (1st Half)",
                "description" => "Bet on the team that will win the first half, with a refund if the match ends in a draw.",
                "value" => json_encode(["home","away"]),
                'requires_odd' => true
            ],
            [
                "name" => "Scoring Draw",
                "description" => "Bet on the match to end in a draw with both teams scoring at least one goal.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "Home team will score in both halves",
                "description" => "Bet on the home team to score at least one goal in both the first and second halves.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "Away team will score in both halves",
                "description" => "Bet on the away team to score at least one goal in both the first and second halves.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "Both Teams To Score in Both Halves",
                "description" => "Bet on both teams to score at least one goal each in both the first and second halves.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "Home Team Score a Goal (1st Half)",
                "description" => "Bet on whether the home team will score at least one goal in the first half.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "Home Team Score a Goal (2nd Half)",
                "description" => "Bet on whether the home team will score at least one goal in the second half.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "Away Team Score a Goal (1st Half)",
                "description" => "Bet on whether the away team will score at least one goal in the first half.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "Away Team Score a Goal (2nd Half)",
                "description" => "Bet on whether the away team will score at least one goal in the second half.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "Home Win/Over",
                "description" => "Bet on the home team to win the match and the total number of goals to be over a specific value.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Home Win/Under",
                "description" => "Bet on the home team to win the match and the total number of goals to be under a specific value.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Away Win/Over",
                "description" => "Bet on the away team to win the match and the total number of goals to be over a specific value.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Away Win/Under",
                "description" => "Bet on the away team to win the match and the total number of goals to be under a specific value.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Home team will win either half",
                "description" => "Bet on the home team to win at least one half of the match.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "Away team will win either half",
                "description" => "Bet on the away team to win at least one half of the match.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "Home Come From Behind and Win",
                "description" => "Bet on the home team to come from behind and win the match.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "Corners Asian Handicap (1st Half)",
                "description" => "Bet on a team with a handicap to overcome in terms of corners in the first half.",
                "value" => json_encode(["home","away"]),
                'requires_odd' => true
            ],
            [
                "name" => "Corners Asian Handicap (2nd Half)",
                "description" => "Bet on a team with a handicap to overcome in terms of corners in the second half.",
                "value" => json_encode(["home","away"]),
                'requires_odd' => true
            ],
            [
                "name" => "Total Corners (2nd Half)",
                "description" => "Bet on the total number of corners to be taken in the second half.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Total Corners (3 way) (2nd Half)",
                "description" => "Bet on the total number of corners to be taken in the second half in a 3-way market.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Away Come From Behind and Win",
                "description" => "Bet on the away team to come from behind and win the match.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "Corners 1x2 (1st Half)",
                "description" => "Bet on the team that will have more corners in the first half.",
                "value" => json_encode(["home","away"]),
                'requires_odd' => true
            ],
            [
                "name" => "Corners 1x2 (2nd Half)",
                "description" => "Bet on the team that will have more corners in the second half.",
                "value" => json_encode(["home","away"]),
                'requires_odd' => true
            ],
            [
                "name" => "Home Total Corners (1st Half)",
                "description" => "Bet on the total number of corners taken by the home team in the first half.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Home Total Corners (2nd Half)",
                "description" => "Bet on the total number of corners taken by the home team in the second half.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Away Total Corners (1st Half)",
                "description" => "Bet on the total number of corners taken by the away team in the first half.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Away Total Corners (2nd Half)",
                "description" => "Bet on the total number of corners taken by the away team in the second half.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "1x2 - 15 minutes",
                "description" => "Bet on the team that will be leading at the end of the first 15 minutes.",
                "value" =>json_encode(["home","away","draw"]),
                'requires_odd' => true
            ],
            [
                "name" => "1x2 - 60 minutes",
                "description" => "Bet on the team that will be leading at the end of the first 60 minutes.",
                "value" =>json_encode(["home","away","draw"]),
                'requires_odd' => true
            ],
            [
                "name" => "1x2 - 75 minutes",
                "description" => "Bet on the team that will be leading at the end of the first 75 minutes.",
                "value" =>json_encode(["home","away","draw"]),
                'requires_odd' => true
            ],
            [
                "name" => "1x2 - 30 minutes",
                "description" => "Bet on the team that will be leading at the end of the first 30 minutes.",
                "value" =>json_encode(["home","away","draw"]),
                'requires_odd' => true
            ],
            [
                "name" => "DC - 30 minutes",
                "description" => "Bet on two possible outcomes at the end of the first 30 minutes.",
                "value" => json_encode(["home","away","draw"]),
                'requires_odd' => true
            ],
            [
                "name" => "DC - 15 minutes",
                "description" => "Bet on two possible outcomes at the end of the first 15 minutes.",
                "value" => json_encode(["home","away","draw"]),
                'requires_odd' => true
            ],
            [
                "name" => "DC - 60 minutes",
                "description" => "Bet on two possible outcomes at the end of the first 60 minutes.",
                "value" => json_encode(["home","away","draw"]),
                'requires_odd' => true
            ],
            [
                "name" => "DC - 75 minutes",
                "description" => "Bet on two possible outcomes at the end of the first 75 minutes.",
                "value" => json_encode(["home","away","draw"]),
                'requires_odd' => false
            ],
            [
                "name" => "Goal in 1-15 minutes",
                "description" => "Bet on whether a goal will be scored in the first 1-15 minutes of the match.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "Goal in 16-30 minutes",
                "description" => "Bet on whether a goal will be scored in the 16-30 minutes of the match.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "Goal in 31-45 minutes",
                "description" => "Bet on whether a goal will be scored in the 31-45 minutes of the match.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "Goal in 46-60 minutes",
                "description" => "Bet on whether a goal will be scored in the 46-60 minutes of the match.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "Goal in 61-75 minutes",
                "description" => "Bet on whether a goal will be scored in the 61-75 minutes of the match.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true
            ],
            [
                "name" => "Goal in 76-90 minutes",
                "description" => "Bet on whether a goal will be scored in the 76-90 minutes of the match.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => false
            ],
            [
                "name" => "Home Team Yellow Cards",
                "description" => "Bet on the total number of yellow cards shown to the home team.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Away Team Yellow Cards",
                "description" => "Bet on the total number of yellow cards shown to the away team.",
                "value" => "open_choice",
                'requires_odd' => false
            ],
            [
                "name" => "Yellow Asian Handicap",
                "description" => "Bet on a team with a handicap to overcome in terms of yellow cards.",
                "value" => json_encode(["home","away"]),
                'requires_odd' => true
            ],
            [
                "name" => "Yellow Over/Under",
                "description" => "Bet on the total number of yellow cards shown to be over or under a specific value.",
                "value" => json_encode(["over","under"]),
                'requires_odd' => true
            ],
            [
                "name" => "Yellow Double Chance",
                "description" => "Bet on two possible outcomes of yellow cards to increase winning chances.",
                "value" => json_encode(["home","away","draw"]),
                'requires_odd' => false
            ],
            [
                "name" => "Yellow Over/Under (1st Half)",
                "description" => "Bet on the total number of yellow cards shown in the first half to be over or under a specific value.",
                "value" => json_encode(["over","under"]),
                'requires_odd' => true
            ],
            [
                "name" => "Yellow Over/Under (2nd Half)",
                "description" => "Bet on the total number of yellow cards shown in the second half to be over or under a specific value.",
                "value" => json_encode(["over","under"]),
                'requires_odd' => true
            ],
            [
                "name" => "Yellow Odd/Even",
                "description" => "Bet on whether the total number of yellow cards shown will be an odd or even number.",
                "value" => json_encode(["odd","even"]),
                'requires_odd' => false
            ],
            [
                "name" => "Yellow Cards 1x2",
                "description" => "Bet on the team that will receive more yellow cards in the match.",
                "value" => json_encode(["home","away"]),
                'requires_odd' => false
            ],
            [
                "name" => "Yellow Asian Handicap (1st Half)",
                "description" => "Bet on a team with a handicap to overcome in terms of yellow cards in the first half.",
                "value" => json_encode(["home","away"]),
                'requires_odd' => false
            ],
            [
                "name" => "Yellow Asian Handicap (2nd Half)",
                "description" => "Bet on a team with a handicap to overcome in terms of yellow cards in the second half.",
                "value" => json_encode(["home","away"]),
                'requires_odd' => false
            ],
            [
                "name" => "Yellow Cards 1x2 (1st Half)",
                "description" => "Bet on the team that will receive more yellow cards in the first half.",
                "value" => json_encode(["home","away"]),

            ],
            [
                "name" => "Yellow Cards 1x2 (2nd Half)",
                "description" => "Bet on the team that will receive more yellow cards in the second half.",
                "value" => json_encode(["home","away"]),
                'requires_odd' => false
            ],
            [
                "name" => "Penalty Awarded",
                "description" => "Bet on whether a penalty will be awarded during the match.",
                "value" => json_encode(["yes","no"]),
                'requires_odd' => true

            ],
            [
                "name" => "Offsides Total",
                "description" => "Bet on the total number of offsides committed by both teams.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Home Team Offsides",
                "description" => "Bet on the total number of offsides committed by the home team.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Away Team Offsides",
                "description" => "Bet on the total number of offsides committed by the away team.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Offsides Asian Handicap",
                "description" => "Bet on a team with a handicap to overcome in terms of offsides.",
                "value" => json_encode(["home","away"]),
                'requires_odd' => true
            ],
            [
                "name" => "Offsides Over/Under",
                "description" => "Bet on the total number of offsides committed to be over or under a specific value.",
                "value" => json_encode(["over","under"]),
                'requires_odd' => true
            ],
            [
                "name" => "Offsides Asian Handicap (1st Half)",
                "description" => "Bet on a team with a handicap to overcome in terms of offsides in the first half.",
                "value" => json_encode(["home","away"]),
                'requires_odd' => true
            ],
            [
                "name" => "Offsides Asian Handicap (2nd Half)",
                "description" => "Bet on a team with a handicap to overcome in terms of offsides in the second half.",
                "value" => json_encode(["home","away"]),
                'requires_odd' => true

            ],
            [
                "name" => "Offsides Over/Under (1st Half)",
                "description" => "Bet on the total number of offsides committed to be over or under a specific value in the first half.",
                "value" => json_encode(["over","under"]),
                'requires_odd' => true
            ],
            [
                "name" => "Offsides Over/Under (2nd Half)",
                "description" => "Bet on the total number of offsides committed to be over or under a specific value in the second half.",
                "value" => json_encode(["over","under"]),
                'requires_odd' => true
            ],
            [
                "name" => "1x2 and Total",
                "description" => "Bet on the match result and the total number of goals scored.",
                "value" => "open_choice",
                'requires_odd' => false
            ],
            [
                "name" => "1x2 and Both Teams To Score",
                "description" => "Bet on the match result and whether both teams will score.",
                "value" => "open_choice",
                'requires_odd' => false
            ],
            [
                "name" => "Double Chance and Total",
                "description" => "Bet on two possible outcomes and the total number of goals scored.",
                "value" => "open_choice",
                'requires_odd' => false
            ],
            [
                "name" => "Double Chance and Both Teams To Score",
                "description" => "Bet on two possible outcomes and whether both teams will score.",
                "value" => "open_choice",
                'requires_odd' => true

            ],
            [
                "name" => "Correct Score and Total",
                "description" => "Bet on the exact score of the match and the total number of goals scored.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Correct Score and Both Teams To Score",
                "description" => "Bet on the exact score of the match and whether both teams will score.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "HT/FT and Total",
                "description" => "Bet on the half-time/full-time result and the total number of goals scored.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "HT/FT and Both Teams To Score",
                "description" => "Bet on the half-time/full-time result and whether both teams will score.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Total Goals (Exact) and Total",
                "description" => "Bet on the exact total number of goals and the total number of goals scored.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Total Goals (Exact) and Both Teams To Score",
                "description" => "Bet on the exact total number of goals and whether both teams will score.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "1x2 and Total (1st Half)",
                "description" => "Bet on the match result and the total number of goals scored in the first half.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "1x2 and Both Teams To Score (1st Half)",
                "description" => "Bet on the match result and whether both teams will score in the first half.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Double Chance and Total (1st Half)",
                "description" => "Bet on two possible outcomes and the total number of goals scored in the first half.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Double Chance and Both Teams To Score (1st Half)",
                "description" => "Bet on two possible outcomes and whether both teams will score in the first half.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Correct Score and Total (1st Half)",
                "description" => "Bet on the exact score of the match and the total number of goals scored in the first half.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Correct Score and Both Teams To Score (1st Half)",
                "description" => "Bet on the exact score of the match and whether both teams will score in the first half.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "HT/FT and Total (1st Half)",
                "description" => "Bet on the half-time/full-time result and the total number of goals scored in the first half.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "HT/FT and Both Teams To Score (1st Half)",
                "description" => "Bet on the half-time/full-time result and whether both teams will score in the first half.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Total Goals (Exact) and Total (1st Half)",
                "description" => "Bet on the exact total number of goals and the total number of goals scored in the first half.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Total Goals (Exact) and Both Teams To Score (1st Half)",
                "description" => "Bet on the exact total number of goals and whether both teams will score in the first half.",
                "value" => "open_choice",
                'requires_odd' => true
            ],

            [
                "name" => "1x2 and Total (2nd Half)",
                "description" => "Bet on the match result and the total number of goals scored in the second half.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "1x2 and Both Teams To Score (2nd Half)",
                "description" => "Bet on the match result and whether both teams will score in the second half.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Double Chance and Total (2nd Half)",
                "description" => "Bet on two possible outcomes and the total number of goals scored in the second half.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Double Chance and Both Teams To Score (2nd Half)",
                "description" => "Bet on two possible outcomes and whether both teams will score in the second half.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Correct Score and Total (2nd Half)",
                "description" => "Bet on the exact score of the match and the total number of goals scored in the second half.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Correct Score and Both Teams To Score (2nd Half)",
                "description" => "Bet on the exact score of the match and whether both teams will score in the second half.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "HT/FT and Total (2nd Half)",
                "description" => "Bet on the half-time/full-time result and the total number of goals scored in the second half.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "HT/FT and Both Teams To Score (2nd Half)",
                "description" => "Bet on the half-time/full-time result and whether both teams will score in the second half.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Total Goals (Exact) and Total (2nd Half)",
                "description" => "Bet on the exact total number of goals and the total number of goals scored in the second half.",
                "value" => "open_choice",
                'requires_odd' => true
            ],
            [
                "name" => "Total Goals (Exact) and Both Teams To Score (2nd Half)",
                "description" => "Bet on the exact total number of goals and whether both teams will score in the second half.",
                "value" => "open_choice",
                'requires_odd' => true
            ]
        ];

        foreach ($bettingOptions as $option) {

            DB::table('bets')->updateOrCreate(
                ['name' => $option['name']],
                [
                'name' => $option['name'],
                'description' => $option['description'],
                'value' => $option['value'],
                'requires_odd' => $option['requires_odd']
            ]);
        }


    }
}
