<?php

namespace App\Helper;

use App\Actions\HandlePrediction;
use App\Models\Bet;

class CompareForcast {

    public HandlePrediction $predictions;
    public function __construct(

    )
    {
      $this->predictions = new HandlePrediction();
    }

    public function __invoke(mixed $forecast) : mixed
    {
        $bet = Bet::find($forecast->bet_id);
        $result = false;

        switch ($bet->name) {
            case 'Match Winner':
                # code...
                //Bet on the team that will win the match.
                $result =  $this->predictions->handleMatchWinnerForecast($forecast);
                break;
            case 'Second Half Winner':
                // Bet on the team that will win the second half of the match.
                $result =  $this->predictions->handleSecondHalfWinner($forecast);
                break;
            case 'Asian Handicap':
                //Bet on a team with a virtual head start or deficit.
                $result =  $this->predictions->handleAsianHandicap($forecast);
                break;
            case 'Goals Over/Under':
                // Bet on the total number of goals scored to be over or under a specific value.
                $result =  $this->predictions->handleGoalsOverUnder($forecast);
                break;
            case 'Goals Over/Under First Half':
                //Bet on the total number of goals scored in the first half to be over or under a specific value.
                $result =  $this->predictions->handleGoalsOverUnderFirstHalf($forecast);

                break;
            case 'HT/FT Double':
                // Bet on both the half-time and full-time results of a match.
                $result =  $this->predictions->handleHTFTDouble($forecast);
                break;
            case 'Both Teams Score':
                //Bet on whether both teams will score at least one goal each in the match.
                $result =  $this->predictions->handleBothTeamsScore($forecast);
                break;
            case 'Handicap Result':
                //Bet on the team that will win after the handicap has been applied.
                $result =  $this->predictions->handleHandicapResult($forecast);
                break;
            case 'Exact Score':
                //Bet on the exact final score of the match
                $result =  $this->predictions->handleExactScore($forecast);
                break;
            case 'Highest Scoring Half':
                // Bet on which half will have the most goals scored.
                $result =  $this->predictions->handleHighestScoringHalf($forecast);
                break;
            case 'Double Chance':
                //Bet on two possible outcomes of the match to increase winning chances.
                $result =  $this->predictions->handleDoubleChance($forecast);
                break;
            case 'First Half Winner':
                //Bet on the team that will win the first half of the match.
                $result =  $this->predictions->handleFirstHalfWinner($forecast);
                break;
            case 'Team To Score First':
                //Bet on the team that will score the first goal in the match.
                $result =  $this->predictions->handleTeamToScoreFirst($forecast);
                break;
            case 'Team To Score Last':
                // Bet on the team that will score the last goal in the match.
                $result =  $this->predictions->handleTeamToScoreLast($forecast);
                break;
            case 'Total - Home':
                //Bet on the total number of goals scored by the home team.
                $result =  $this->predictions->handleTotalHome($forecast);
                break;
            case 'Total - Away':
                //Bet on the total number of goals scored by the away team.
                $result =  $this->predictions->handleTotalAway($forecast);
                break;
            case 'Handicap Result - First Half':
                //Bet on the team that will win the first half after the handicap has been applied.
                $result =  $this->predictions->handleHandicapResultFirstHalf($forecast);
                break;
            case 'Asian Handicap First Half':
                // Bet on a team with a virtual head start or deficit in the first half.
                $result =  $this->predictions->handleAsianHandicapFirstHalf($forecast);
                break;
            case 'Double Chance - First Half':
                //Bet on two possible outcomes of the first half to increase winning chances.
                $result =  $this->predictions->handleDoubleChanceFirstHalf($forecast);
                break;
            case 'Odd/Even':
                //Bet on whether the total number of goals scored will be an odd or even number.
                $result =  $this->predictions->handleOddEven($forecast);
                break;
            case 'Odd/Even - First Half':
                //Bet on whether the total number of goals scored in the first half will be an odd or even number.
                $result =  $this->predictions->handleOddEvenFirstHalfForecast($forecast);
                break;
            case 'Home Odd/Even':
                //Bet on whether the total number of goals scored by the home team will be an odd or even number.
                $result =  $this->predictions->handleHomeOddEvenForecast($forecast);
                break;
            case 'Results/Both Teams Score':
                //Bet on the result of the match and whether both teams will score.
                $result =  $this->predictions->handleResultsBothTeamsScoreForecast($forecast);
                break;
            case 'Result/Total Goals':
                //Bet on the result of the match and the total number of goals scored.
                $result =  $this->predictions->handleResultTotalGoalsForecast($forecast);
                break;
            case 'Goals Over/Under - Second Half':
                //Bet on the total number of goals scored in the second half to be over or under a specific value.
                $result =  $this->predictions->handleResultTotalGoalsForecast($forecast);
                break;
            case 'Clean Sheet - Home':
                //Bet on the home team to keep a clean sheet (not concede any goals).
                $result =  $this->predictions->handleCleanSheetHomeForecast($forecast);

                break;
            case 'Clean Sheet - Away':
                //Bet on the away team to keep a clean sheet (not concede any goals).
                $result =  $this->predictions->handleCleanSheetAwayForecast($forecast);
                break;
            case 'Win to Nil - Home':
                //Bet on the home team to win the match without conceding any goals.
                $result =  $this->predictions->handleWinToNilHomeForecast($forecast);
                break;
            case 'Win to Nil - Away':
                //Bet on the away team to win the match without conceding any goals.
                $result =  $this->predictions->handleWinToNilAwayForecast($forecast);
                break;
            case 'Correct Score - First Half':
                //Bet on the exact score of the match at half-time.
                $result =  $this->predictions->handleCorrectScoreFirstHalfForecast($forecast);
                break;
            case 'Win Both Halves':
                //et on a team to win both the first and second halves of the match.
                $result =  $this->predictions->handleWinBothHalvesForecast($forecast);
                break;
            case 'Double Chance - Second Half':
                //Bet on two possible outcomes of the second half to increase winning chances.
                $result =  $this->predictions->handleDoubleChanceSecondHalfForecast($forecast);
                break;
            case 'Both Teams Score - First Half':
                //Bet on whether both teams will score at least one goal each in the first half.
                $result =  $this->predictions->handleBothTeamsScoreFirstHalfForecast($forecast);
                break;
            case 'Both Teams To Score - Second Half':
                //Bet on whether both teams will score at least one goal each in the second half.
                $result =  $this->predictions->handleBothTeamsToScoreSecondHalfForecast($forecast);
                break;
            case 'Win To Nil':
                //Bet on a team to win the match without conceding any goals.
                $result =  $this->predictions->handleWinToNilForecast($forecast);
                break;
            case 'Home win both halves':
                //Bet on the home team to win both the first and second halves of the match.
                $result =  $this->predictions->handleHomeWinBothhalvesForecast($forecast);
                break;
            case 'Exact Goals Number':
                //Bet on the exact total number of goals to be scored in the match.
                $result =  $this->predictions->handleExactGoalsNumberForecast($forecast);
                break;
            case 'To Win Either Half':
                //Bet on a team to win at least one half of the match.
                $result =  $this->predictions->handleToWinEitherHalfForecast($forecast);
                break;
            case 'Home Team Exact Goals Number':
                //Bet on the exact total number of goals to be scored by the home team.
                $result =  $this->predictions->handleHomeTeamExactGoalsNumberForecast($forecast);
                break;
            case 'Away Team Exact Goals Number':
                //Bet on the exact total number of goals to be scored by the away team
                $result =  $this->predictions->handleAwayTeamExactGoalsNumberForecast($forecast);
                break;
            case 'Second Half Exact Goals Number':
                //Bet on the exact total number of goals to be scored in the second half.
                $result =  $this->predictions->handleSecondHalfExactGoalsNumberForecast($forecast);
                break;
            case 'Home Team Score a Goal':
                //Bet on whether the home team will score at least one goal in the match.
                $result =  $this->predictions->handleHomeTeamScoreAGoalForecast($forecast);
                break;
            case 'Away Team Score a Goal':
                //Bet on whether the away team will score at least one goal in the match.
                $result =  $this->predictions->handleAwayTeamScoreAGoalForecast($forecast);
                break;
            case 'Corners Over Under':
                //Bet on the total number of corners to be over or under a specific value.
                $result =  $this->predictions->handleCornersOverUnderForecast($forecast);
                break;
            case 'Exact Goals Number - First Half':
                //Bet on the exact total number of goals to be scored in the first half.
                $result =  $this->predictions->handleExactGoalsNumberFirstHalfForecast($forecast);
                break;
            case 'Winning Margin':
                //Bet on the margin of victory for the winning team.
                $result =  $this->predictions->handleWinningMarginForecast($forecast);
                break;
            case 'To Score In Both Halves By Teams':
                //Bet on both teams to score at least one goal each in both the first and second halves.
                $result =  $this->predictions->handleToScoreInBothHalvesByTeamsForecast($forecast);
                break;
            case 'Total Goals/Both Teams To Score':
                //Bet on the total number of goals and whether both teams will score.
                $result =  $this->predictions->handleTotalGoalsBothTeamsToScoreForecast($forecast);
                break;
            case 'Goal Line':
                //Bet on the total number of goals scored to be over or under a specific value.
                $result =  $this->predictions->handleGoalLineForecast($forecast);
                break;
            case 'Halftime Result/Total Goals':
                //Bet on the half-time result and the total number of goals scored.
                $result =  $this->predictions->handleHalftimeResultTotalGoalsForecast($forecast);
                break;
            case 'Halftime Result/Both Teams Score':
                //Bet on the half-time result and whether both teams will score
                $result =  $this->predictions->handleHalftimeResultBothTeamsScoreForecast($forecast);
                break;
            case 'Away win both halves':
                //Bet on the away team to win both the first and second halves of the match.
                $result =  $this->predictions->handleAwayWinBothHalvesForecast($forecast);
                break;
            case 'First 10 min Winner':
                //Bet on the team that will be leading at the end of the first 10 minutes.
                $result =  $this->predictions->handleFirst10minWinnerForecast($forecast);
                break;
            case 'Corners 1x2':
                //Bet on the team that will have more corners in the match.
                $result =  $this->predictions->handleCorners1x2Forecast($forecast);
                break;
            case 'Corners Asian Handicap':
                //Bet on a team with a handicap to overcome in terms of corners.
                $result =  $this->predictions->handleCornersAsianHandicapForecast($forecast);
                break;
            case 'Home Corners Over/Under':
                //Bet on the total number of corners taken by the home team to be over or under a specific value.
                $result =  $this->predictions->handleHomeCornersOverUnderForecast($forecast);
                break;
            case 'Away Corners Over/Under':
                //Bet on the total number of corners taken by the away team to be over or under a specific value.
                $result =  $this->predictions->handleAwayCornersOverUnderForecast($forecast);
                break;
            case 'Own Goal':
                //Bet on whether an own goal will be scored in the match.
                $result =  $this->predictions->handleOwnGoalForecast($forecast);
                break;
            case 'Away Odd/Even':
                //Bet on whether the total number of goals scored by the away team will be an odd or even number.
                $result =  $this->predictions->handleAwayOddEvenForecast($forecast);
                break;
            case 'To Qualify':
                //Bet on a team to qualify for the next round or stage of a competition.
                $result =  $this->predictions->handleToQualifyForecast($forecast);
                break;
            case 'Correct Score - Second Half':
                //Bet on the exact score of the match in the second half.
                $result =  $this->predictions->handleCorrectScoreSecondHalfForecast($forecast);
                break;
            case 'Odd/Even - Second Half':
                //Bet on whether the total number of goals scored in the second half will be an odd or even number.
                $result =  $this->predictions->handleOddEvenSecondHalfForecast($forecast);
                break;
            case 'Goal Line (1st Half)':
                //Bet on the total number of goals scored in the first half to be over or under a specific value.
                $result =  $this->predictions->handleGoalLine1stHalfForecast($forecast);
                break;
            case 'Both Teams to Score 1st Half - 2nd Half':
                //Bet on both teams to score in both the first and second halves."
                $result =  $this->predictions->handleBothTeamstoScore1stHalf2ndHalfForecast($forecast);
                break;
            case '10 Over/Under':
                //Bet on the total number of goals to be over or under 10.",
                $result =  $this->predictions->handle10OverUnderForecast($forecast);
                break;
            case 'Last Corner':
                //Bet on which team will take the last corner in the match.
                $result =  $this->predictions->handleLastCornerForecast($forecast);
                break;
            case 'First Corner':
                //Bet on which team will take the first corner in the match.
                $result =  $this->predictions->handleFirstCornerForecast($forecast);
                break;
            case 'Total Corners (1st Half)':
                //Bet on the total number of corners to be taken in the first half.
                $result =  $this->predictions->handleTotalCorners1stHalfForecast($forecast);
                break;
            case 'RTG_H1':
                //Bet on the team that will be leading at half-time.
                $result =  $this->predictions->handleRTG_H1Forecast($forecast);
                break;
            case 'Cards European Handicap':
                //Bet on a team with a handicap to overcome in terms of cards.
                $result =  $this->predictions->handleCardsEuropeanHandicapForecast($forecast);
                break;
            case 'Cards Over/Under':
                //Bet on the total number of cards shown to be over or under a specific value.
                $result =  $this->predictions->handleCardsOverUnderForecast($forecast);
                break;
            case 'Cards Asian Handicap':
                //Bet on a team with a handicap to overcome in terms of cards.
                $result =  $this->predictions->handleCardsAsianHandicapForecast($forecast);
                break;
            case 'Home Team Total Cards':
                //Bet on the total number of cards shown to the home team.
                $result =  $this->predictions->handleHomeTeamTotalCardsForecast($forecast);
                break;
            case 'Away Team Total Cards':
                //Bet on the total number of cards shown to the away team.
                $result =  $this->predictions->handleAwayTeamTotalCardsForecast($forecast);
                break;
            case 'Total Corners (3 way) (1st Half)':
                //Bet on the total number of corners to be taken in the first half in a 3-way market
                $result =  $this->predictions->handleTotalCorners3Way1stHalfForecast($forecast);
                break;
            case 'Total Corners (3 way)':
                //Bet on the total number of corners to be taken in a 3-way market.
                $result =  $this->predictions->handleTotalCorners3wayForecast($forecast);
                break;
            case 'RCARD':
                //Bet on whether a red card will be shown in the match.
                $result =  $this->predictions->handleRCARDForecast($forecast);
                break;
            case 'Total ShotOnGoal':
                //Bet on the total number of shots on goal by both teams.
                $result =  $this->predictions->handleTotalShotOnGoalForecast($forecast);
                break;
            case 'Home Total ShotOnGoal':
                //Bet on the total number of shots on goal by the home team.
                $result =  $this->predictions->handleHomeTotalShotOnGoalForecast($forecast);
                break;
            case 'Away Total ShotOnGoal':
                //Bet on the total number of shots on goal by the away team.
                $result =  $this->predictions->handleAwayTotalShotOnGoalForecast($forecast);
                break;
            case 'Total Goals (3 way)':
                //Bet on the total number of goals scored in a 3-way market.
                $result =  $this->predictions->handleTotalGoals3wayForecast($forecast);
                break;
            case 'Anytime Goal Scorer':
                //Bet on a player to score a goal at any time during the match.
                $result =  $this->predictions->handleAnytimeGoalScorerForecast($forecast);
                break;
            case 'First Goal Scorer':
                //Bet on a player to score the first goal of the match.
                $result =  $this->predictions->handleFirstGoalScorerForecast($forecast);
                break;
            case 'Last Goal Scorer':
                //Bet on a player to score the last goal of the match.
                $result =  $this->predictions->handleLastGoalScorerForecast($forecast);
                break;
            case 'To Score Two or More Goals':
                //Bet on a player to score two or more goals in the match.
                $result =  $this->predictions->handleToScoreTwoOrMoreGoalsForecast($forecast);
                break;
            case 'First Goal Method':
                //Bet on how the first goal of the match will be scored (e.g., header, penalty, etc.).
                $result =  $this->predictions->handleFirstGoalMethodForecast($forecast);
                break;
            case 'To Score A Penalty':
                //Bet on a team or player to score a penalty in the match.
                $result =  $this->predictions->handleToScoreAPenaltyForecast($forecast);
                break;
            case 'To Miss A Penalty':
                //Bet on a team or player to miss a penalty in the match.
                $result =  $this->predictions->handleToMissAPenaltyForecast($forecast);
                break;
            case 'Player to be booked"':
                //Bet on a player to receive a yellow or red card during the match.
                $result =  $this->predictions->handlePlayerToBeBookedForecast($forecast);
                break;
            case 'Player to be Sent Off':
                //Bet on a player to be shown a red card and be sent off during the match.
                $result =  $this->predictions->handlePlayerToBeSentOffForecast($forecast);
                break;
            case 'Asian Handicap (2nd Half)':
                //Bet on a team with a virtual head start or deficit in the second half.
                $result =  $this->predictions->handleAsianHandicap2ndHalfForecast($forecast);
                break;
            case 'Home Team Total Goals(1st Half)':
                //Bet on the total number of goals to be scored by the home team in the first half.
                $result =  $this->predictions->handleHomeTeamTotalGoals1stHalfForecast($forecast);
                break;
            case 'Away Team Total Goals(1st Half)':
                //Bet on the total number of goals to be scored by the away team in the first half.
                $result =  $this->predictions->handleAwayTeamTotalGoals1stHalfForecast($forecast);
                break;
            case 'Home Team Total Goals(2nd Half)':
                //Bet on the total number of goals to be scored by the home team in the second half.
                $result =  $this->predictions->handleHomeTeamTotalGoals2ndHalfForecast($forecast);
                break;
            case 'Away Team Total Goals(2nd Half)':
                //Bet on the total number of goals to be scored by the away team in the second half.
                $result =  $this->predictions->hanadleAwayTeamTotalGoals2ndHalfForecast($forecast);
                break;
            case 'Draw No Bet (1st Half)':
                //Bet on the team that will win the first half, with a refund if the match ends in a draw.
                $result =  $this->predictions->handleDrawNoBe1stHalfForecast($forecast);
                break;
            case 'Scoring Draw':
                //Bet on the match to end in a draw with both teams scoring at least one goal.
                $result =  $this->predictions->handleScoringDrawForecast($forecast);
                break;
            case 'Home team will score in both halves':
                // Bet on the home team to score at least one goal in both the first and second halves.
                $result =  $this->predictions->handleHomeTeamWillScoreInBothHalvesForecast($forecast);
                break;
            case 'Away team will score in both halves':
                //Bet on the away team to score at least one goal in both the first and second halves.
                $result =  $this->predictions->handleAwayTeamWillScoreInBothHalvesForecast($forecast);
                break;
            case 'Both Teams To Score in Both Halves':
                //Bet on both teams to score at least one goal each in both the first and second halves.
                $result =  $this->predictions->handleBothTeamsToScoreInBothHalvesForecast($forecast);
                break;
            case 'Home Team Score a Goal (1st Half)':
                //Bet on whether the home team will score at least one goal in the first half.
                $result =  $this->predictions->handleHomeTeamScoreAGoal1stHalfForecast($forecast);
                break;
            case 'Home Team Score a Goal (2nd Half)':
                //Bet on whether the home team will score at least one goal in the second half.
                $result =  $this->predictions->handleHomeTeamScoreAGoal2ndHalfForecast($forecast);
                break;
            case 'Away Team Score a Goal (1st Half)':
                //Bet on whether the away team will score at least one goal in the first half.
                $result =  $this->predictions->handleAwayTeamScoreAGoal1stHalfForecast($forecast);
                break;
            case 'Away Team Score a Goal (2nd Half)':
                //Bet on whether the away team will score at least one goal in the second half.
                $result =  $this->predictions->handleAwayTeamScoreAGoal2ndHalfForecast($forecast);
                break;
            case 'Home Win/Over':
                //Bet on the home team to win the match and the total number of goals to be over a specific value.
                $result =  $this->predictions->handleHomeWinOverForecast($forecast);
                break;
            case 'Home Win/Under':
                //Bet on the home team to win the match and the total number of goals to be under a specific value.
                $result =  $this->predictions->handleHomeWinUnderForecast($forecast);
                break;
            case 'Away Win/Over':
                //Bet on the away team to win the match and the total number of goals to be over a specific value.
                $result =  $this->predictions->handleAwayWinOverForecast($forecast);
                break;
            case 'Away Win/Under':
                //Bet on the away team to win the match and the total number of goals to be under a specific value.
                $result =  $this->predictions->handleAwayWinUnderForecast($forecast);
                break;
            case 'Home team will win either half':
                //Bet on the home team to win at least one half of the match.
                $result =  $this->predictions->handleHomeTeamWillWinEitherHalfForecast($forecast);
                break;
            case 'Away team will win either half':
                //Bet on the away team to win at least one half of the match.
                $result =  $this->predictions->handleAwayTeamWillWinEitherHalfForecast($forecast);
                break;
            case 'Home Come From Behind and Win':
                //Bet on the home team to come from behind and win the match.
                $result =  $this->predictions->handleHomeComeFromBehindAndWinForecast($forecast);
                break;
            case 'Corners Asian Handicap (1st Half)':
                //Bet on a team with a handicap to overcome in terms of corners in the first half.
                $result =  $this->predictions->handleCornersAsianHandicap1stHalfForecast($forecast);
                break;
            case 'Corners Asian Handicap (2nd Half)':
                //Bet on a team with a handicap to overcome in terms of corners in the second half.
                $result =  $this->predictions->handleCornersAsianHandicap2ndHalfForecast($forecast);
                break;
            case 'Total Corners (2nd Half)':
                //Bet on the total number of corners to be taken in the second half.
                $result =  $this->predictions->handleTotalCorners2ndHalfForecast($forecast);
                break;
            case 'Total Corners (3 way) (2nd Half)':
                //Bet on the total number of corners to be taken in the second half in a 3-way market.

                $result =  $this->predictions->handleTotalCorners3way2ndHalfForecast($forecast);
                break;
            case 'Away Come From Behind and Win':
                //Bet on the away team to come from behind and win the match.
                $result =  $this->predictions->handleAwayComeFromBehindAndWinForecast($forecast);
                break;
            case 'Corners 1x2 (1st Half)':
                //Bet on the team that will have more corners in the first half.
                break;
            case 'Corners 1x2 (2nd Half)':
                //Bet on the team that will have more corners in the second half.
                $result =  $this->predictions->handleCorners1x21stHalfForecast($forecast);
                break;
            case 'Home Total Corners (1st Half)':
                //Bet on the total number of corners taken by the home team in the first half.
                $result =  $this->predictions->handleHomeTotalCorners1stHalfForecast($forecast);
                break;
            case 'Home Total Corners (2nd Half)':
                //Bet on the total number of corners taken by the home team in the second half.
                $result =  $this->predictions->handleHomeTotalCorners2ndHalfForecast($forecast);
                break;
            case 'Away Total Corners (1st Half)':
                //Bet on the total number of corners taken by the away team in the first half.
                $result =  $this->predictions->handleAwayTotalCorners1stHalfForecast($forecast);
                break;
            case 'Away Total Corners (2nd Half)':
                //Bet on the total number of corners taken by the away team in the second half.
                $result =  $this->predictions->handleAwayTotalCorners2ndHalfForecast($forecast);
                break;
            case '1x2 - 15 minutes':
                //Bet on the team that will be leading at the end of the first 15 minutes.
                $result =  $this->predictions->handle1x215minutesForecast($forecast);
                break;
            case '1x2 - 60 minutes':
                //Bet on the team that will be leading at the end of the first 60 minutes.
                $result =  $this->predictions->handle1x260minutesForecast($forecast);
                break;
            case '1x2 - 75 minutes':
                //Bet on the team that will be leading at the end of the first 75 minutes.
                $result =  $this->predictions->handle1x275minutesForecast($forecast);
                break;
            case '1x2 - 30 minutes':
                //Bet on the team that will be leading at the end of the first 30 minutes.
                $result =  $this->predictions->handle1x230minutesForecast($forecast);
                break;
            case 'DC - 30 minutes':
                //Bet on two possible outcomes at the end of the first 30 minutes.
                $result =  $this->predictions->handleDC30minutesForecast($forecast);
                break;
            case 'DC - 15 minutes':
                //Bet on two possible outcomes at the end of the first 15 minutes.
                $result =  $this->predictions->handleDC15minutesForecast($forecast);
                break;
            case 'DC - 60 minutes':
                //Bet on two possible outcomes at the end of the first 60 minutes.
                $result =  $this->predictions->handleDC60minutesForecast($forecast);
                break;
            case 'DC - 75 minutes':
                //Bet on two possible outcomes at the end of the first 75 minutes.
                break;
            case 'Goal in 1-15 minutes':
                //Bet on whether a goal will be scored in the first 1-15 minutes of the match.
                $result =  $this->predictions->handleDC75minutesForecast($forecast);
                break;
            case 'Goal in 16-30 minutes':
                //Bet on whether a goal will be scored in the 16-30 minutes of the match.
                $result =  $this->predictions->handleGoalIn1630minutesForecast($forecast);
                break;
            case 'Goal in 31-45 minutes':
                //Bet on whether a goal will be scored in the 31-45 minutes of the match.
                $result =  $this->predictions->handleGoalIn3145minutesForecast($forecast);
                break;
            case 'Goal in 46-60 minutes':
                //Bet on whether a goal will be scored in the 46-60 minutes of the match.
                $result =  $this->predictions->handleGoalIn4660minutesForecast($forecast);
                break;
            case 'Goal in 61-75 minutes':
                //Bet on whether a goal will be scored in the 61-75 minutes of the match.
                $result =  $this->predictions->handleGoalIn6175minutesForecast($forecast);
                break;
            case 'Goal in 76-90 minutes':
                //Bet on whether a goal will be scored in the 76-90 minutes of the match.
                $result =  $this->predictions->handleGoalIn7690minutesForecast($forecast);
                break;
            case 'Home Team Yellow Cards':
                //Bet on the total number of yellow cards shown to the home team.
                $result =  $this->predictions->handleHomeTeamYellowCardsForecast($forecast);

                break;
            case 'Away Team Yellow Cards':
                //Bet on the total number of yellow cards shown to the away team.
                $result =  $this->predictions->handleAwayTeamYellowCardsForecast($forecast);
                break;
            case 'Yellow Asian Handicap':
                //Bet on a team with a handicap to overcome in terms of yellow cards.
                $result =  $this->predictions->handleYellowAsianHandicapForecast($forecast);
                break;
            case 'Yellow Over/Under':
                //Bet on the total number of yellow cards shown to be over or under a specific value.
                $result =  $this->predictions->handleYellowOverUnderForecast($forecast);
                break;
            case 'Yellow Double Chance':
                //Bet on two possible outcomes of yellow cards to increase winning chances.
                $result =  $this->predictions->handleYellowDoubleChanceForecast($forecast);
                break;
            case 'Yellow Over/Under (1st Half)':
                //Bet on the total number of yellow cards shown in the first half to be over or under a specific value.
                $result =  $this->predictions->handleYellowOverUnder1stHalfForecast($forecast);
                break;
            case 'Yellow Over/Under (2nd Half)':
                //Bet on the total number of yellow cards shown in the second half to be over or under a specific value.
                $result =  $this->predictions->handleYellowOverUnder2ndHalfForecast($forecast);
                break;
            case 'Yellow Odd/Even':
                //Bet on whether the total number of yellow cards shown will be an odd or even number.
                $result =  $this->predictions->handleYellowOddEvenForecast($forecast);
                break;
            case 'Yellow Cards 1x2':
                //Bet on the team that will receive more yellow cards in the match.
                $result =  $this->predictions->handleYellowCards1x2Forecast($forecast);
                break;
            case 'Yellow Asian Handicap (1st Half)':
                //Bet on a team with a handicap to overcome in terms of yellow cards in the first half.
                $result =  $this->predictions->handleYellowAsianHandicap1stHalfForecast($forecast);
                break;
            case 'Yellow Asian Handicap (2nd Half)':
                //Bet on a team with a handicap to overcome in terms of yellow cards in the second half.
                $result =  $this->predictions->handleYellowAsianHandicap2ndHalfForecast($forecast);
                break;
            case 'Yellow Cards 1x2 (1st Half)':
                //Bet on the team that will receive more yellow cards in the first half.
                $result =  $this->predictions->handleYellowCards1x21stHalfForecast($forecast);
                break;
            case 'Yellow Cards 1x2 (2nd Half)':
                //Bet on the team that will receive more yellow cards in the second half.
                $result =  $this->predictions->handleYellowCards1x22ndHalfForecast($forecast);
                break;
            case 'Penalty Awarded':
                //Bet on whether a penalty will be awarded during the match.
                $result =  $this->predictions->handlePenaltyAwardedForecast($forecast);
                break;
            case 'Offsides Total':
                //Bet on the total number of offsides committed by both teams.
                $result =  $this->predictions->handleOffsidesTotalForecast($forecast);
                break;
            case 'Home Team Offsides':
                //Bet on the total number of offsides committed by the home team.
                $result =  $this->predictions->handleHomeTeamOffsidesForecast($forecast);
                break;
            case 'Away Team Offsides':
                //Bet on the total number of offsides committed by the away team.
                $result =  $this->predictions->handleAwayTeamOffsidesForecast($forecast);
                break;
            case 'Offsides Asian Handicap':
                //Bet on a team with a handicap to overcome in terms of offsides.
                $result =  $this->predictions->handleOffsidesAsianHandicapForecast($forecast);
                break;
            case 'Offsides Over/Under':
                //Bet on the total number of offsides committed to be over or under a specific value.
                $result =  $this->predictions->handleOffsidesOverUnderForecast($forecast);
                break;
            case 'Offsides Asian Handicap (1st Half)':
                //Bet on a team with a handicap to overcome in terms of offsides in the first half.
                $result =  $this->predictions->handleOffsidesAsianHandicap1stHalfForecast($forecast);
                break;
            case 'Offsides Asian Handicap (2nd Half)':
                //Bet on a team with a handicap to overcome in terms of offsides in the second half.
                $result =  $this->predictions->handleOffsidesAsianHandicap2ndHalfForecast($forecast);
                break;
            case 'Offsides Over/Under (1st Half)':
                //Bet on the total number of offsides committed to be over or under a specific value in the first half.
                $result =  $this->predictions->handleOffsidesOverUnder1stHalfForecast($forecast);
                break;
            case 'Offsides Over/Under (2nd Half)':
                //Bet on the total number of offsides committed to be over or under a specific value in the second half.
                $result =  $this->predictions->handleOffsidesOverUnder2ndHalfForecast($forecast);
                break;
            case '1x2 and Total':
                //Bet on the match result and the total number of goals scored.
                $result =  $this->predictions->handle1x2AndTotalForecast($forecast);
                break;
            case '1x2 and Both Teams To Score':
                //Bet on the match result and whether both teams will score.
                $result =  $this->predictions->handle1x2AndBothTeamsToScoreForecast($forecast);
                break;
            case 'Double Chance and Total':
                //Bet on two possible outcomes and the total number of goals scored.
                $result =  $this->predictions->handleDoubleChanceAndTotalForecast($forecast);
                break;
            case 'Double Chance and Both Teams To Score':
                //Bet on two possible outcomes and whether both teams will score.
                $result =  $this->predictions->handleDoubleChanceAndBothTeamsToScoreForecast($forecast);
                break;
            case 'Correct Score and Total':
                //Bet on the exact score of the match and the total number of goals scored.
                $result =  $this->predictions->handleCorrectScoreAndTotalForecast($forecast);
                break;
            case 'Correct Score and Both Teams To Score':
                //Bet on the exact score of the match and whether both teams will score.
                $result =  $this->predictions-> handleCorrectScoreAndBothTeamsToScoreForecast($forecast);
                break;
            case 'HT/FT and Total':
                //Bet on the half-time/full-time result and the total number of goals scored.
                $result =  $this->predictions->handleHTFTAndTotalForecast($forecast);
                break;
            case 'HT/FT and Both Teams To Score':
                //Bet on the half-time/full-time result and whether both teams will score.
                $result =  $this->predictions->handleHTFTAndBothTeamsToScoreForecast($forecast);
                break;
            case 'Total Goals (Exact) and Total':
                //Bet on the exact total number of goals and the total number of goals scored.
                $result =  $this->predictions->handleTotalGoalsExactAndTotalForecast($forecast);
                break;
            case 'Total Goals (Exact) and Both Teams To Score':
                //Bet on the exact total number of goals and whether both teams will score.
                $result =  $this->predictions->handleTotalGoalsExactAndBothTeamsToScoreForecast($forecast);
                break;
            case '1x2 and Total (1st Half)':
                //Bet on the match result and the total number of goals scored in the first half.
                $result =  $this->predictions->handle1x2AndTotal1stHalfForecast($forecast);
                break;
            case '1x2 and Both Teams To Score (1st Half)':
                //Bet on the match result and whether both teams will score in the first half.
                $result =  $this->predictions->handle1x2AndBothTeamsToScore1stHalfForecast($forecast);
                break;
            case 'Double Chance and Total (1st Half)':
                //Bet on two possible outcomes and the total number of goals scored in the first half.
                $result =  $this->predictions->handleDoubleChanceAndTotal1stHalfForecast($forecast);
                break;
            case 'Double Chance and Both Teams To Score (1st Half)':
                //Bet on two possible outcomes and whether both teams will score in the first half.

                $result =  $this->predictions->handleDoubleChanceAndBothTeamsToScore1stHalfForecast($forecast);
                break;
            case 'Correct Score and Total (1st Half)':
                //Bet on the exact score of the match and the total number of goals scored in the first half.
                $result =  $this->predictions->handleCorrectScoreAndTotal1stHalfForecast($forecast);
                break;
            case 'Correct Score and Both Teams To Score (1st Half)':
                //Bet on the exact score of the match and whether both teams will score in the first half.
                $result =  $this->predictions->handleCorrectScoreAndBothTeamsToScore1stHalfForecast($forecast);
                break;
            case 'HT/FT and Total (1st Half)':
                //Bet on the half-time/full-time result and the total number of goals scored in the first half.
                $result =  $this->predictions->handleHTFTAndTotal1stHalfForecast($forecast);
                break;
            case 'HT/FT and Both Teams To Score (1st Half)':
                //Bet on the half-time/full-time result and whether both teams will score in the first half.
                $result =  $this->predictions->handleHTFTAndBothTeamsToScore1stHalfForecast($forecast);
                break;
            case 'Total Goals (Exact) and Total (1st Half)':
                //Bet on the exact total number of goals and the total number of goals scored in the first half.
                $result =  $this->predictions->handleTotalGoalsExactAndTotal1stHalfForecast($forecast);
                break;
            case 'Total Goals (Exact) and Both Teams To Score (1st Half)':
                //Bet on the exact total number of goals and whether both teams will score in the first half.
                $result =  $this->predictions->handleTotalGoalsExactAndBothTeamsToScore1stHalfForecast($forecast);
                break;
            case '1x2 and Total (2nd Half)':
                //Bet on the match result and the total number of goals scored in the second half.
                $result =  $this->predictions->handle1x2AndTotal2ndHalfForecast($forecast);
                break;
            case '1x2 and Both Teams To Score (2nd Half)':
                //Bet on the match result and whether both teams will score in the second half.
                $result =  $this->predictions->handle1x2AndBothTeamsToScore2ndHalfForecast($forecast);
                break;
            case 'Double Chance and Total (2nd Half)':
                //Bet on two possible outcomes and the total number of goals scored in the second half.
                $result =  $this->predictions->handleDoubleChanceAndTotal2ndHalfForecast($forecast);
                break;
            case 'Double Chance and Both Teams To Score (2nd Half)':
                //Bet on two possible outcomes and whether both teams will score in the second half.
                $result =  $this->predictions->handleDoubleChanceAndBothTeamsToScore2ndHalfForecast($forecast);
                break;
            case 'Correct Score and Total (2nd Half)':
                //Bet on the exact score of the match and the total number of goals scored in the second half.
                $result =  $this->predictions->handleCorrectScoreAndTotal2ndHalfForecast($forecast);
                break;
            case 'Correct Score and Both Teams To Score (2nd Half)':
                //Bet on the exact score of the match and whether both teams will score in the second half.
                $result =  $this->predictions->handleCorrectScoreAndBothTeamsToScore2ndHalfForecast($forecast);
                break;
            case 'HT/FT and Total (2nd Half)':
                //Bet on the half-time/full-time result and the total number of goals scored in the second half.
                $result =  $this->predictions->handleHTFTAndTotal2ndHalfForecast($forecast);
                break;
            case 'HT/FT and Both Teams To Score (2nd Half)':
                //Bet on the half-time/full-time result and whether both teams will score in the second half.
                $result =  $this->predictions->handleHTFTAndBothTeamsToScore2ndHalfForecast($forecast);
                break;
            case 'Total Goals (Exact) and Total (2nd Half)':
                //Bet on the exact total number of goals and the total number of goals scored in the second half.
                $result =  $this->predictions->handleTotalGoalsExactAndTotal2ndHalfForecast($forecast);
                break;
            case 'Total Goals (Exact) and Both Teams To Score (2nd Half)':
                //Bet on the exact total number of goals and whether both teams will score in the second half.
                $result =  $this->predictions->handleTotalGoalsExactAndBothTeamsToScore2ndHalfForecast($forecast);
                break;

            default:
                # code...
                break;
        }

        return $result;

   }
}