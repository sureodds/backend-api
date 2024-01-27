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
                "value" => "Home/Away"
            ],
            [
                "name" => "Second Half Winner",
                "description" => "Bet on the team that will win the second half of the match.",
                "value" => "Home/Away"
            ],
            [
                "name" => "Asian Handicap",
                "description" => "Bet on a team with a virtual head start or deficit.",
                "value" => "Home/Away"
            ],
            [
                "name" => "Goals Over/Under",
                "description" => "Bet on the total number of goals scored to be over or under a specific value.",
                "value" => "Over/Under"
            ],
            [
                "name" => "Goals Over/Under First Half",
                "description" => "Bet on the total number of goals scored in the first half to be over or under a specific value.",
                "value" => "Over/Under"
            ],
            [
                "name" => "HT/FT Double",
                "description" => "Bet on both the half-time and full-time results of a match.",
                "value" => "Various"
            ],
            [
                "name" => "Both Teams Score",
                "description" => "Bet on whether both teams will score at least one goal each in the match.",
                "value" => "Yes/No"
            ],
            [
                "name" => "Handicap Result",
                "description" => "Bet on the team that will win after the handicap has been applied.",
                "value" => "Home/Away"
            ],
            [
                "name" => "Exact Score",
                "description" => "Bet on the exact final score of the match.",
                "value" => "Various"
            ],
            [
                "name" => "Highest Scoring Half",
                "description" => "Bet on which half will have the most goals scored.",
                "value" => "First/Second"
            ],
            [
                "name" => "Double Chance",
                "description" => "Bet on two possible outcomes of the match to increase winning chances.",
                "value" => "Home/Away or Draw"
            ],
            [
                "name" => "First Half Winner",
                "description" => "Bet on the team that will win the first half of the match.",
                "value" => "Home/Away"
            ],
            [
                "name" => "Team To Score First",
                "description" => "Bet on the team that will score the first goal in the match.",
                "value" => "Home/Away"
            ],
            [
                "name" => "Team To Score Last",
                "description" => "Bet on the team that will score the last goal in the match.",
                "value" => "Home/Away"
            ],
            [
                "name" => "Total - Home",
                "description" => "Bet on the total number of goals scored by the home team.",
                "value" => "Various"
            ],
            [
                "name" => "Total - Away",
                "description" => "Bet on the total number of goals scored by the away team.",
                "value" => "Various"
            ],
            [
                "name" => "Handicap Result - First Half",
                "description" => "Bet on the team that will win the first half after the handicap has been applied.",
                "value" => "Home/Away"
            ],
            [
                "name" => "Asian Handicap First Half",
                "description" => "Bet on a team with a virtual head start or deficit in the first half.",
                "value" => "Home/Away"
            ],
            [
                "name" => "Double Chance - First Half",
                "description" => "Bet on two possible outcomes of the first half to increase winning chances.",
                "value" => "Home/Away or Draw"
            ],
            [
                "name" => "Odd/Even",
                "description" => "Bet on whether the total number of goals scored will be an odd or even number.",
                "value" => "Odd/Even"
            ],
            [
                "name" => "Odd/Even - First Half",
                "description" => "Bet on whether the total number of goals scored in the first half will be an odd or even number.",
                "value" => "Odd/Even"
            ],
            [
                "name" => "Home Odd/Even",
                "description" => "Bet on whether the total number of goals scored by the home team will be an odd or even number.",
                "value" => "Odd/Even"
            ],
            [
                "name" => "Results/Both Teams Score",
                "description" => "Bet on the result of the match and whether both teams will score.",
                "value" => "Various"
            ],
            [
                "name" => "Result/Total Goals",
                "description" => "Bet on the result of the match and the total number of goals scored.",
                "value" => "Various"
            ],
            [
                "name" => "Goals Over/Under - Second Half",
                "description" => "Bet on the total number of goals scored in the second half to be over or under a specific value.",
                "value" => "Over/Under"
            ],
            [
                "name" => "Clean Sheet - Home",
                "description" => "Bet on the home team to keep a clean sheet (not concede any goals).",
                "value" => "Yes/No"
            ],
            [
                "name" => "Clean Sheet - Away",
                "description" => "Bet on the away team to keep a clean sheet (not concede any goals).",
                "value" => "Yes/No"
            ],
            [
                "name" => "Win to Nil - Home",
                "description" => "Bet on the home team to win the match without conceding any goals.",
                "value" => "Yes/No"
            ],
            [
                "name" => "Win to Nil - Away",
                "description" => "Bet on the away team to win the match without conceding any goals.",
                "value" => "Yes/No"
            ],
            [
                "name" => "Correct Score - First Half",
                "description" => "Bet on the exact score of the match at half-time.",
                "value" => "Various"
            ],
            [
                "name" => "Win Both Halves",
                "description" => "Bet on a team to win both the first and second halves of the match.",
                "value" => "Home/Away"
            ],
            [
                "name" => "Double Chance - Second Half",
                "description" => "Bet on two possible outcomes of the second half to increase winning chances.",
                "value" => "Home/Away or Draw"
            ],
            [
                "name" => "Both Teams Score - First Half",
                "description" => "Bet on whether both teams will score at least one goal each in the first half.",
                "value" => "Yes/No"
            ],
            [
                "name" => "Both Teams To Score - Second Half",
                "description" => "Bet on whether both teams will score at least one goal each in the second half.",
                "value" => "Yes/No"
            ],
            [
                "name" => "Win To Nil",
                "description" => "Bet on a team to win the match without conceding any goals.",
                "value" => "Home/Away"
            ],
            [
                "name" => "Home win both halves",
                "description" => "Bet on the home team to win both the first and second halves of the match.",
                "value" => "Yes/No"
            ],
            [
                "name" => "Exact Goals Number",
                "description" => "Bet on the exact total number of goals to be scored in the match.",
                "value" => "Various"
            ],
            [
                "name" => "To Win Either Half",
                "description" => "Bet on a team to win at least one half of the match.",
                "value" => "Home/Away"
            ],
            [
                "name" => "Home Team Exact Goals Number",
                "description" => "Bet on the exact total number of goals to be scored by the home team.",
                "value" => "Various"
            ],
            [
                "name" => "Away Team Exact Goals Number",
                "description" => "Bet on the exact total number of goals to be scored by the away team.",
                "value" => "Various"
            ],
            [
                "name" => "Second Half Exact Goals Number",
                "description" => "Bet on the exact total number of goals to be scored in the second half.",
                "value" => "Various"
            ],
            [
                "name" => "Home Team Score a Goal",
                "description" => "Bet on whether the home team will score at least one goal in the match.",
                "value" => "Yes/No"
            ],
            [
                "name" => "Away Team Score a Goal",
                "description" => "Bet on whether the away team will score at least one goal in the match.",
                "value" => "Yes/No"
            ],
            [
                "name" => "Corners Over Under",
                "description" => "Bet on the total number of corners to be over or under a specific value.",
                "value" => "Over/Under"
            ],
            [
                "name" => "Exact Goals Number - First Half",
                "description" => "Bet on the exact total number of goals to be scored in the first half.",
                "value" => "Various"
            ],
            [
                "name" => "Winning Margin",
                "description" => "Bet on the margin of victory for the winning team.",
                "value" => "Various"
            ],
            [
                "name" => "To Score In Both Halves By Teams",
                "description" => "Bet on both teams to score at least one goal each in both the first and second halves.",
                "value" => "Yes/No"
            ],
            [
                "name" => "Total Goals/Both Teams To Score",
                "description" => "Bet on the total number of goals and whether both teams will score.",
                "value" => "Various"
            ],
            [
                "name" => "Goal Line",
                "description" => "Bet on the total number of goals scored to be over or under a specific value.",
                "value" => "Over/Under"
            ],
            [
                "name" => "Halftime Result/Total Goals",
                "description" => "Bet on the half-time result and the total number of goals scored.",
                "value" => "Various"
            ],
            [
                "name" => "Halftime Result/Both Teams Score",
                "description" => "Bet on the half-time result and whether both teams will score.",
                "value" => "Various"
            ],
            [
                "name" => "Away win both halves",
                "description" => "Bet on the away team to win both the first and second halves of the match.",
                "value" => "Yes/No"
            ],
            [
                "name" => "First 10 min Winner",
                "description" => "Bet on the team that will be leading at the end of the first 10 minutes.",
                "value" => "Home/Away/Draw"
            ],
            [
                "name" => "Corners 1x2",
                "description" => "Bet on the team that will have more corners in the match.",
                "value" => "Home/Away"
            ],
            [
                "name" => "Corners Asian Handicap",
                "description" => "Bet on a team with a handicap to overcome in terms of corners.",
                "value" => "Home/Away"
            ],
            [
                "name" => "Home Corners Over/Under",
                "description" => "Bet on the total number of corners taken by the home team to be over or under a specific value.",
                "value" => "Over/Under"
            ],
            [
                "name" => "Away Corners Over/Under",
                "description" => "Bet on the total number of corners taken by the away team to be over or under a specific value.",
                "value" => "Over/Under"
            ],
            [
                "name" => "Own Goal",
                "description" => "Bet on whether an own goal will be scored in the match.",
                "value" => "Yes/No"
            ],
            [
                "name" => "Away Odd/Even",
                "description" => "Bet on whether the total number of goals scored by the away team will be an odd or even number.",
                "value" => "Odd/Even"
            ],
            [
                "name" => "To Qualify",
                "description" => "Bet on a team to qualify for the next round or stage of a competition.",
                "value" => "Yes/No"
            ],
            [
                "name" => "Correct Score - Second Half",
                "description" => "Bet on the exact score of the match in the second half.",
                "value" => "Various"
            ],
            [
                "name" => "Odd/Even - Second Half",
                "description" => "Bet on whether the total number of goals scored in the second half will be an odd or even number.",
                "value" => "Odd/Even"
            ],
            [
                "name" => "Goal Line (1st Half)",
                "description" => "Bet on the total number of goals scored in the first half to be over or under a specific value.",
                "value" => "Over/Under"
            ],
            [
                "name" => "Both Teams to Score 1st Half - 2nd Half",
                "description" => "Bet on both teams to score in both the first and second halves.",
                "value" => "Yes/No"
            ],
            [
                "name" => "10 Over/Under",
                "description" => "Bet on the total number of goals to be over or under 10.",
                "value" => "Over/Under"
            ],
            [
                "name" => "Last Corner",
                "description" => "Bet on which team will take the last corner in the match.",
                "value" => "Home/Away/None"
            ],
            [
                "name" => "First Corner",
                "description" => "Bet on which team will take the first corner in the match.",
                "value" => "Home/Away"
            ],
            [
                "name" => "Total Corners (1st Half)",
                "description" => "Bet on the total number of corners to be taken in the first half.",
                "value" => "Various"
            ],
            [
                "name" => "RTG_H1",
                "description" => "Bet on the team that will be leading at half-time.",
                "value" => "Home/Away/Draw"
            ],
            [
                "name" => "Cards European Handicap",
                "description" => "Bet on a team with a handicap to overcome in terms of cards.",
                "value" => "Home/Away"
            ],
            [
                "name" => "Cards Over/Under",
                "description" => "Bet on the total number of cards shown to be over or under a specific value.",
                "value" => "Over/Under"
            ],
            [
                "name" => "Cards Asian Handicap",
                "description" => "Bet on a team with a handicap to overcome in terms of cards.",
                "value" => "Home/Away"
            ],
            [
                "name" => "Home Team Total Cards",
                "description" => "Bet on the total number of cards shown to the home team.",
                "value" => "Various"
            ],
            [
                "name" => "Away Team Total Cards",
                "description" => "Bet on the total number of cards shown to the away team.",
                "value" => "Various"
            ],
            [
                "name" => "Total Corners (3 way) (1st Half)",
                "description" => "Bet on the total number of corners to be taken in the first half in a 3-way market.",
                "value" => "Various"
            ],
            [
                "name" => "Total Corners (3 way)",
                "description" => "Bet on the total number of corners to be taken in a 3-way market.",
                "value" => "Various"
            ],
            [
                "name" => "RCARD",
                "description" => "Bet on whether a red card will be shown in the match.",
                "value" => "Yes/No"
            ],
            [
                "name" => "Total ShotOnGoal",
                "description" => "Bet on the total number of shots on goal by both teams.",
                "value" => "Various"
            ],
            [
                "name" => "Home Total ShotOnGoal",
                "description" => "Bet on the total number of shots on goal by the home team.",
                "value" => "Various"
            ],
            [
                "name" => "Away Total ShotOnGoal",
                "description" => "Bet on the total number of shots on goal by the away team.",
                "value" => "Various"
            ],
            [
                "name" => "Total Goals (3 way)",
                "description" => "Bet on the total number of goals scored in a 3-way market.",
                "value" => "Various"
            ],
            [
                "name" => "Anytime Goal Scorer",
                "description" => "Bet on a player to score a goal at any time during the match.",
                "value" => "Various"
            ],
            [
                "name" => "First Goal Scorer",
                "description" => "Bet on a player to score the first goal of the match.",
                "value" => "Various"
            ],
            [
                "name" => "Last Goal Scorer",
                "description" => "Bet on a player to score the last goal of the match.",
                "value" => "Various"
            ],
            [
                "name" => "To Score Two or More Goals",
                "description" => "Bet on a player to score two or more goals in the match.",
                "value" => "Yes/No"
            ],
            [
                "name" => "First Goal Method",
                "description" => "Bet on how the first goal of the match will be scored (e.g., header, penalty, etc.).",
                "value" => "Various"
            ],
            [
                "name" => "To Score A Penalty",
                "description" => "Bet on a team or player to score a penalty in the match.",
                "value" => "Home/Away/Player"
            ],
            [
                "name" => "To Miss A Penalty",
                "description" => "Bet on a team or player to miss a penalty in the match.",
                "value" => "Home/Away/Player"
            ],
            [
                "name" => "Player to be booked",
                "description" => "Bet on a player to receive a yellow or red card during the match.",
                "value" => "Various"
            ],
            [
                "name" => "Player to be Sent Off",
                "description" => "Bet on a player to be shown a red card and be sent off during the match.",
                "value" => "Various"
            ],
            [
                "name" => "Asian Handicap (2nd Half)",
                "description" => "Bet on a team with a virtual head start or deficit in the second half.",
                "value" => "Home/Away"
            ],
            [
                "name" => "Home Team Total Goals(1st Half)",
                "description" => "Bet on the total number of goals to be scored by the home team in the first half.",
                "value" => "Various"
            ],
            [
                "name" => "Away Team Total Goals(1st Half)",
                "description" => "Bet on the total number of goals to be scored by the away team in the first half.",
                "value" => "Various"
            ],
            [
                "name" => "Home Team Total Goals(2nd Half)",
                "description" => "Bet on the total number of goals to be scored by the home team in the second half.",
                "value" => "Various"
            ],
            [
                "name" => "Away Team Total Goals(2nd Half)",
                "description" => "Bet on the total number of goals to be scored by the away team in the second half.",
                "value" => "Various"
            ],
            [
                "name" => "Draw No Bet (1st Half)",
                "description" => "Bet on the team that will win the first half, with a refund if the match ends in a draw.",
                "value" => "Home/Away"
            ],
            [
                "name" => "Scoring Draw",
                "description" => "Bet on the match to end in a draw with both teams scoring at least one goal.",
                "value" => "Yes/No"
            ],
            [
                "name" => "Home team will score in both halves",
                "description" => "Bet on the home team to score at least one goal in both the first and second halves.",
                "value" => "Yes/No"
            ],
            [
                "name" => "Away team will score in both halves",
                "description" => "Bet on the away team to score at least one goal in both the first and second halves.",
                "value" => "Yes/No"
            ],
            [
                "name" => "Both Teams To Score in Both Halves",
                "description" => "Bet on both teams to score at least one goal each in both the first and second halves.",
                "value" => "Yes/No"
            ],
            [
                "name" => "Home Team Score a Goal (1st Half)",
                "description" => "Bet on whether the home team will score at least one goal in the first half.",
                "value" => "Yes/No"
            ],
            [
                "name" => "Home Team Score a Goal (2nd Half)",
                "description" => "Bet on whether the home team will score at least one goal in the second half.",
                "value" => "Yes/No"
            ],
            [
                "name" => "Away Team Score a Goal (1st Half)",
                "description" => "Bet on whether the away team will score at least one goal in the first half.",
                "value" => "Yes/No"
            ],
            [
                "name" => "Away Team Score a Goal (2nd Half)",
                "description" => "Bet on whether the away team will score at least one goal in the second half.",
                "value" => "Yes/No"
            ],
            [
                "name" => "Home Win/Over",
                "description" => "Bet on the home team to win the match and the total number of goals to be over a specific value.",
                "value" => "Various"
            ],
            [
                "name" => "Home Win/Under",
                "description" => "Bet on the home team to win the match and the total number of goals to be under a specific value.",
                "value" => "Various"
            ],
            [
                "name" => "Away Win/Over",
                "description" => "Bet on the away team to win the match and the total number of goals to be over a specific value.",
                "value" => "Various"
            ],
            [
                "name" => "Away Win/Under",
                "description" => "Bet on the away team to win the match and the total number of goals to be under a specific value.",
                "value" => "Various"
            ],
            [
                "name" => "Home team will win either half",
                "description" => "Bet on the home team to win at least one half of the match.",
                "value" => "Yes/No"
            ],
            [
                "name" => "Away team will win either half",
                "description" => "Bet on the away team to win at least one half of the match.",
                "value" => "Yes/No"
            ],
            [
                "name" => "Home Come From Behind and Win",
                "description" => "Bet on the home team to come from behind and win the match.",
                "value" => "Yes/No"
            ],
            [
                "name" => "Corners Asian Handicap (1st Half)",
                "description" => "Bet on a team with a handicap to overcome in terms of corners in the first half.",
                "value" => "Home/Away"
            ],
            [
                "name" => "Corners Asian Handicap (2nd Half)",
                "description" => "Bet on a team with a handicap to overcome in terms of corners in the second half.",
                "value" => "Home/Away"
            ],
            [
                "name" => "Total Corners (2nd Half)",
                "description" => "Bet on the total number of corners to be taken in the second half.",
                "value" => "Various"
            ],
            [
                "name" => "Total Corners (3 way) (2nd Half)",
                "description" => "Bet on the total number of corners to be taken in the second half in a 3-way market.",
                "value" => "Various"
            ],
            [
                "name" => "Away Come From Behind and Win",
                "description" => "Bet on the away team to come from behind and win the match.",
                "value" => "Yes/No"
            ],
            [
                "name" => "Corners 1x2 (1st Half)",
                "description" => "Bet on the team that will have more corners in the first half.",
                "value" => "Home/Away"
            ],
            [
                "name" => "Corners 1x2 (2nd Half)",
                "description" => "Bet on the team that will have more corners in the second half.",
                "value" => "Home/Away"
            ],
            [
                "name" => "Home Total Corners (1st Half)",
                "description" => "Bet on the total number of corners taken by the home team in the first half.",
                "value" => "Various"
            ],
            [
                "name" => "Home Total Corners (2nd Half)",
                "description" => "Bet on the total number of corners taken by the home team in the second half.",
                "value" => "Various"
            ],
            [
                "name" => "Away Total Corners (1st Half)",
                "description" => "Bet on the total number of corners taken by the away team in the first half.",
                "value" => "Various"
            ],
            [
                "name" => "Away Total Corners (2nd Half)",
                "description" => "Bet on the total number of corners taken by the away team in the second half.",
                "value" => "Various"
            ],
            [
                "name" => "1x2 - 15 minutes",
                "description" => "Bet on the team that will be leading at the end of the first 15 minutes.",
                "value" => "Home/Away/Draw"
            ],
            [
                "name" => "1x2 - 60 minutes",
                "description" => "Bet on the team that will be leading at the end of the first 60 minutes.",
                "value" => "Home/Away/Draw"
            ],
            [
                "name" => "1x2 - 75 minutes",
                "description" => "Bet on the team that will be leading at the end of the first 75 minutes.",
                "value" => "Home/Away/Draw"
            ],
            [
                "name" => "1x2 - 30 minutes",
                "description" => "Bet on the team that will be leading at the end of the first 30 minutes.",
                "value" => "Home/Away/Draw"
            ],
            [
                "name" => "DC - 30 minutes",
                "description" => "Bet on two possible outcomes at the end of the first 30 minutes.",
                "value" => "Home/Away or Draw"
            ],
            [
                "name" => "DC - 15 minutes",
                "description" => "Bet on two possible outcomes at the end of the first 15 minutes.",
                "value" => "Home/Away or Draw"
            ],
            [
                "name" => "DC - 60 minutes",
                "description" => "Bet on two possible outcomes at the end of the first 60 minutes.",
                "value" => "Home/Away or Draw"
            ],
            [
                "name" => "DC - 75 minutes",
                "description" => "Bet on two possible outcomes at the end of the first 75 minutes.",
                "value" => "Home/Away or Draw"
            ],
            [
                "name" => "Goal in 1-15 minutes",
                "description" => "Bet on whether a goal will be scored in the first 1-15 minutes of the match.",
                "value" => "Yes/No"
            ],
            [
                "name" => "Goal in 16-30 minutes",
                "description" => "Bet on whether a goal will be scored in the 16-30 minutes of the match.",
                "value" => "Yes/No"
            ],
            [
                "name" => "Goal in 31-45 minutes",
                "description" => "Bet on whether a goal will be scored in the 31-45 minutes of the match.",
                "value" => "Yes/No"
            ],
            [
                "name" => "Goal in 46-60 minutes",
                "description" => "Bet on whether a goal will be scored in the 46-60 minutes of the match.",
                "value" => "Yes/No"
            ],
            [
                "name" => "Goal in 61-75 minutes",
                "description" => "Bet on whether a goal will be scored in the 61-75 minutes of the match.",
                "value" => "Yes/No"
            ],
            [
                "name" => "Goal in 76-90 minutes",
                "description" => "Bet on whether a goal will be scored in the 76-90 minutes of the match.",
                "value" => "Yes/No"
            ],
            [
                "name" => "Home Team Yellow Cards",
                "description" => "Bet on the total number of yellow cards shown to the home team.",
                "value" => "Various"
            ],
            [
                "name" => "Away Team Yellow Cards",
                "description" => "Bet on the total number of yellow cards shown to the away team.",
                "value" => "Various"
            ],
            [
                "name" => "Yellow Asian Handicap",
                "description" => "Bet on a team with a handicap to overcome in terms of yellow cards.",
                "value" => "Home/Away"
            ],
            [
                "name" => "Yellow Over/Under",
                "description" => "Bet on the total number of yellow cards shown to be over or under a specific value.",
                "value" => "Over/Under"
            ],
            [
                "name" => "Yellow Double Chance",
                "description" => "Bet on two possible outcomes of yellow cards to increase winning chances.",
                "value" => "Home/Away or Draw"
            ],
            [
                "name" => "Yellow Over/Under (1st Half)",
                "description" => "Bet on the total number of yellow cards shown in the first half to be over or under a specific value.",
                "value" => "Over/Under"
            ],
            [
                "name" => "Yellow Over/Under (2nd Half)",
                "description" => "Bet on the total number of yellow cards shown in the second half to be over or under a specific value.",
                "value" => "Over/Under"
            ],
            [
                "name" => "Yellow Odd/Even",
                "description" => "Bet on whether the total number of yellow cards shown will be an odd or even number.",
                "value" => "Odd/Even"
            ],
            [
                "name" => "Yellow Cards 1x2",
                "description" => "Bet on the team that will receive more yellow cards in the match.",
                "value" => "Home/Away"
            ],
            [
                "name" => "Yellow Asian Handicap (1st Half)",
                "description" => "Bet on a team with a handicap to overcome in terms of yellow cards in the first half.",
                "value" => "Home/Away"
            ],
            [
                "name" => "Yellow Asian Handicap (2nd Half)",
                "description" => "Bet on a team with a handicap to overcome in terms of yellow cards in the second half.",
                "value" => "Home/Away"
            ],
            [
                "name" => "Yellow Cards 1x2 (1st Half)",
                "description" => "Bet on the team that will receive more yellow cards in the first half.",
                "value" => "Home/Away"
            ],
            [
                "name" => "Yellow Cards 1x2 (2nd Half)",
                "description" => "Bet on the team that will receive more yellow cards in the second half.",
                "value" => "Home/Away"
            ],
            [
                "name" => "Penalty Awarded",
                "description" => "Bet on whether a penalty will be awarded during the match.",
                "value" => "Yes/No"
            ],
            [
                "name" => "Offsides Total",
                "description" => "Bet on the total number of offsides committed by both teams.",
                "value" => "Various"
            ],
            [
                "name" => "Home Team Offsides",
                "description" => "Bet on the total number of offsides committed by the home team.",
                "value" => "Various"
            ],
            [
                "name" => "Away Team Offsides",
                "description" => "Bet on the total number of offsides committed by the away team.",
                "value" => "Various"
            ],
            [
                "name" => "Offsides Asian Handicap",
                "description" => "Bet on a team with a handicap to overcome in terms of offsides.",
                "value" => "Home/Away"
            ],
            [
                "name" => "Offsides Over/Under",
                "description" => "Bet on the total number of offsides committed to be over or under a specific value.",
                "value" => "Over/Under"
            ],
            [
                "name" => "Offsides Asian Handicap (1st Half)",
                "description" => "Bet on a team with a handicap to overcome in terms of offsides in the first half.",
                "value" => "Home/Away"
            ],
            [
                "name" => "Offsides Asian Handicap (2nd Half)",
                "description" => "Bet on a team with a handicap to overcome in terms of offsides in the second half.",
                "value" => "Home/Away"
            ],
            [
                "name" => "Offsides Over/Under (1st Half)",
                "description" => "Bet on the total number of offsides committed to be over or under a specific value in the first half.",
                "value" => "Over/Under"
            ],
            [
                "name" => "Offsides Over/Under (2nd Half)",
                "description" => "Bet on the total number of offsides committed to be over or under a specific value in the second half.",
                "value" => "Over/Under"
            ],
            [
                "name" => "1x2 and Total",
                "description" => "Bet on the match result and the total number of goals scored.",
                "value" => "Various"
            ],
            [
                "name" => "1x2 and Both Teams To Score",
                "description" => "Bet on the match result and whether both teams will score.",
                "value" => "Various"
            ],
            [
                "name" => "Double Chance and Total",
                "description" => "Bet on two possible outcomes and the total number of goals scored.",
                "value" => "Various"
            ],
            [
                "name" => "Double Chance and Both Teams To Score",
                "description" => "Bet on two possible outcomes and whether both teams will score.",
                "value" => "Various"
            ],
            [
                "name" => "Correct Score and Total",
                "description" => "Bet on the exact score of the match and the total number of goals scored.",
                "value" => "Various"
            ],
            [
                "name" => "Correct Score and Both Teams To Score",
                "description" => "Bet on the exact score of the match and whether both teams will score.",
                "value" => "Various"
            ],
            [
                "name" => "HT/FT and Total",
                "description" => "Bet on the half-time/full-time result and the total number of goals scored.",
                "value" => "Various"
            ],
            [
                "name" => "HT/FT and Both Teams To Score",
                "description" => "Bet on the half-time/full-time result and whether both teams will score.",
                "value" => "Various"
            ],
            [
                "name" => "Total Goals (Exact) and Total",
                "description" => "Bet on the exact total number of goals and the total number of goals scored.",
                "value" => "Various"
            ],
            [
                "name" => "Total Goals (Exact) and Both Teams To Score",
                "description" => "Bet on the exact total number of goals and whether both teams will score.",
                "value" => "Various"
            ],
            [
                "name" => "1x2 and Total (1st Half)",
                "description" => "Bet on the match result and the total number of goals scored in the first half.",
                "value" => "Various"
            ],
            [
                "name" => "1x2 and Both Teams To Score (1st Half)",
                "description" => "Bet on the match result and whether both teams will score in the first half.",
                "value" => "Various"
            ],
            [
                "name" => "Double Chance and Total (1st Half)",
                "description" => "Bet on two possible outcomes and the total number of goals scored in the first half.",
                "value" => "Various"
            ],
            [
                "name" => "Double Chance and Both Teams To Score (1st Half)",
                "description" => "Bet on two possible outcomes and whether both teams will score in the first half.",
                "value" => "Various"
            ],
            [
                "name" => "Correct Score and Total (1st Half)",
                "description" => "Bet on the exact score of the match and the total number of goals scored in the first half.",
                "value" => "Various"
            ],
            [
                "name" => "Correct Score and Both Teams To Score (1st Half)",
                "description" => "Bet on the exact score of the match and whether both teams will score in the first half.",
                "value" => "Various"
            ],
            [
                "name" => "HT/FT and Total (1st Half)",
                "description" => "Bet on the half-time/full-time result and the total number of goals scored in the first half.",
                "value" => "Various"
            ],
            [
                "name" => "HT/FT and Both Teams To Score (1st Half)",
                "description" => "Bet on the half-time/full-time result and whether both teams will score in the first half.",
                "value" => "Various"
            ],
            [
                "name" => "Total Goals (Exact) and Total (1st Half)",
                "description" => "Bet on the exact total number of goals and the total number of goals scored in the first half.",
                "value" => "Various"
            ],
            [
                "name" => "Total Goals (Exact) and Both Teams To Score (1st Half)",
                "description" => "Bet on the exact total number of goals and whether both teams will score in the first half.",
                "value" => "Various"
            ],
            [
                "name" => "1x2 and Total (2nd Half)",
                "description" => "Bet on the match result and the total number of goals scored in the second half.",
                "value" => "Various"
            ],
            [
                "name" => "1x2 and Both Teams To Score (2nd Half)",
                "description" => "Bet on the match result and whether both teams will score in the second half.",
                "value" => "Various"
            ],
            [
                "name" => "Double Chance and Total (2nd Half)",
                "description" => "Bet on two possible outcomes and the total number of goals scored in the second half.",
                "value" => "Various"
            ],
            [
                "name" => "Double Chance and Both Teams To Score (2nd Half)",
                "description" => "Bet on two possible outcomes and whether both teams will score in the second half.",
                "value" => "Various"
            ],
            [
                "name" => "Correct Score and Total (2nd Half)",
                "description" => "Bet on the exact score of the match and the total number of goals scored in the second half.",
                "value" => "Various"
            ],
            [
                "name" => "Correct Score and Both Teams To Score (2nd Half)",
                "description" => "Bet on the exact score of the match and whether both teams will score in the second half.",
                "value" => "Various"
            ],
            [
                "name" => "HT/FT and Total (2nd Half)",
                "description" => "Bet on the half-time/full-time result and the total number of goals scored in the second half.",
                "value" => "Various"
            ],
            [
                "name" => "HT/FT and Both Teams To Score (2nd Half)",
                "description" => "Bet on the half-time/full-time result and whether both teams will score in the second half.",
                "value" => "Various"
            ],
            [
                "name" => "Total Goals (Exact) and Total (2nd Half)",
                "description" => "Bet on the exact total number of goals and the total number of goals scored in the second half.",
                "value" => "Various"
            ],
            [
                "name" => "Total Goals (Exact) and Both Teams To Score (2nd Half)",
                "description" => "Bet on the exact total number of goals and whether both teams will score in the second half.",
                "value" => "Various"
            ]
        ];

        foreach ($bettingOptions as $option) {

            DB::table('bets')->updateOrCreate(
                ['name' => $option['name']],
                [
                'name' => $option['name'],
                'description' => $option['description'],
                'value' => $option['value'],
            ]);
        }


    }
}
