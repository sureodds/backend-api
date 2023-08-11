<?php

namespace  App\Actions;

use App\Services\FootBallApiService;

class HandlePrediction {

    public FootBallApiService $footBallService;

    public function __construct()
    {
        $this->footBallService = new FootBallApiService();
    }

    // Function to handle "Match Winner" forecast
    public function handleMatchWinnerForecast(mixed $forcast) : bool
    {
        // Get the actual winner of the match from your data or API.
        // For demonstration purposes, I'll use a sample value here.
        $soccer_record = $this->footBallService->getFeatureById($forcast->fixture_id);
        $result = false;
        switch ($forcast->prediction_value) {

            case 'home':
                # code...
                if($soccer_record['goals']['home'] > $soccer_record['goals']['away']){
                     $result = true;
                }
                break;

            default:
                    # code...
                if ($soccer_record['goals']['away'] > $soccer_record['goals']['home']) {
                    return true;
                }
                break;
        }

        return $result;

    }


    public function handleSecondHalfWinner(mixed $forcast)
    {
        // Bet on the team that will win the second half of the match.
        $soccer_record = $this->footBallService->getFeatureById($forcast->fixture_id);
        $first_half = $soccer_record['score']['halftime'];
        $fulltime = $soccer_record['score']['fulltime'];
        $result = false;

        switch ($forcast->prediction_value) {

            case 'home':
                # code...
                if (($fulltime['home'] - $first_half['home']) > $first_half['home']) {
                    $result = true;
                }
                break;

            default:
                # code...
                if (($fulltime['away'] - $first_half['away']) > $first_half['away']) {
                    $result = true;
                }
                break;
        }

        return $result;
    }


    public function handleAsianHandicap(mixed $forcast)
    {
         //Bet on a team with a virtual head start or deficit.

    }

    public function handleGoalsOverUnder(mixed $forcast)
    {
        // Bet on the total number of goals scored to be over or under a specific value.
        $soccer_record = $this->footBallService->getFeatureById($forcast->fixture_id);
        $first_half = $soccer_record['score']['halftime'];
        $fulltime = $soccer_record['score']['fulltime'];
        $result = false;

        switch ($forcast->prediction_value) {

            case 'home':
                # code...
                if (($fulltime['home'] - $first_half['home']) > $first_half['home']) {
                    $result = true;
                }
                break;

            default:
                # code...
                if (($fulltime['away'] - $first_half['away']) > $first_half['away']) {
                    $result = true;
                }
                break;
        }

        return $result;
    }


    public function handleGoalsOverUnderFirstHalf(mixed $forcast)
    {
        //Bet on the total number of goals scored in the first half to be over or under a specific value.
        $soccer_record = $this->footBallService->getFeatureById($forcast->fixture_id);

        $first_half = $soccer_record['score']['halftime'];
        $result = false;

        switch ($forcast->prediction_value) {

            case 'over':
                # code...
                if (($first_half['home'] + $first_half['away']) > $forcast->prediction_value) {
                    $result = true;
                }
                break;

            default:
                # code...
                if (($first_half['home'] + $first_half['away']) < $forcast->prediction_value) {
                    $result = true;
                }
                break;
        }

        return $result;

    }


    public function handleHTFTDouble(mixed $forcast)
    {
         // Bet on both the half-time and full-time results of a match.

         $soccer_record = $this->footBallService->getFeatureById($forcast->fixture_id);

            $first_half = $soccer_record['score']['halftime'];
            $fulltime = $soccer_record['score']['fulltime'];
            $result = false;

            switch ($forcast->prediction_value) {

                case 'home':
                    # code...
                    if (($fulltime['home'] - $first_half['home']) > $first_half['home']) {
                        $result = true;
                    }
                    break;

                default:
                    # code...
                    if (($fulltime['away'] - $first_half['away']) > $first_half['away']) {
                        $result = true;
                    }
                    break;
            }

            return $result;
    }


    public function handleBothTeamsScore(mixed $forcast)
    {
        // Bet on both teams to score at least one goal each in the match.
        $soccer_record = $this->footBallService->getFeatureById($forcast->fixture_id);

        $first_half = $soccer_record['score']['halftime'];
        $fulltime = $soccer_record['score']['fulltime'];
        $result = false;

        switch ($forcast->prediction_value) {
            
            case 'yes':
                # code...
                if (($fulltime['home'] > 0) && ($fulltime['away'] > 0)) {
                    $result = true;
                }
                break;

            default:
                # code...
                if (($fulltime['home'] == 0) || ($fulltime['away'] == 0)) {
                    $result = true;
                }
                break;
        }

        return $result;
    }


    public function handleHandicapResult(mixed $forcast)
    {
        // Bet on a team to win with a virtual head start or deficit.
        $soccer_record = $this->footBallService->getFeatureById($forcast->fixture_id);

        $first_half = $soccer_record['score']['halftime'];
        $fulltime = $soccer_record['score']['fulltime'];
        $result = false;

        switch ($forcast->prediction_value) {

            case 'home':
                # code...
                if (($fulltime['home'] - $first_half['home']) > $first_half['home']) {
                    $result = true;
                }
                break;

            default:
                # code...
                if (($fulltime['away'] - $first_half['away']) > $first_half['away']) {
                    $result = true;
                }
                break;
        }

        return $result;
    }


    public function handleExactScore(mixed $forecast)
    {
        // Bet on the exact score of the match.
        $soccer_record = $this->footBallService->getFeatureById($forecast->fixture_id);

        $first_half = $soccer_record['score']['halftime'];
        $fulltime = $soccer_record['score']['fulltime'];
        $result = false;

        switch ($forecast->prediction_value) {

            case 'home':
                # code...
                if (($fulltime['home'] - $first_half['home']) > $first_half['home']) {
                    $result = true;
                }
                break;

            default:
                # code...
                if (($fulltime['away'] - $first_half['away']) > $first_half['away']) {
                    $result = true;
                }
                break;
        }

        return $result;
    }


    public function handleHighestScoringHalf($forcast)
    {
        // Bet on the half with the highest number of goals scored.
        $soccer_record = $this->footBallService->getFeatureById($forcast->fixture_id);

        $first_half = $soccer_record['score']['halftime'];
        $fulltime = $soccer_record['score']['fulltime'];
        $result = false;

        switch ($forcast->prediction_value) {

            case 'home':
                # code...
                if (($fulltime['home'] - $first_half['home']) > $first_half['home']) {
                    $result = true;
                }
                break;

            default:
                # code...
                if (($fulltime['away'] - $first_half['away']) > $first_half['away']) {
                    $result = true;
                }
                break;
        }

        return $result;
    }


    public function handleDoubleChance(mixed $forecast)
    {
        // Bet on two outcomes from a possible three.

        $soccer_record = $this->footBallService->getFeatureById($forecast->fixture_id);


    }

    public function handleFirstHalfWinner()
    {
    }
    public function handleTeamToScoreFirst()
    {
    }
    public function handleTeamToScoreLast()
    {
    }

    public function handleTotalHome()
    {
    }
    public function handleTotalAway()
    {
    }
    public function handleHandicapResultFirstHalf()
    {
    }

    public function handleAsianHandicapFirstHalf()
    {
    }
    public function handleDoubleChanceFirstHalf()
    {
    }
    public function handleOddEven()
    {
    }

    public function handleOddEvenFirstHalfForecast()
    {
    }
    public function handleHomeOddEvenForecast()
    {
    }

    public function handleResultsBothTeamsScoreForecast()
    {
    }
    public function handleResultTotalGoalsForecast()
    {
         //Bet on the result of the match and the total number of goals scored.
    }
    public function handleCleanSheetHomeForecast()
    {
    }

    public function handleCleanSheetAwayForecast()
    {
    }
    public function handleWinToNilHomeForecast()
    {
    }
    public function handleWinToNilAwayForecast()
    {
    }

    public function handleCorrectScoreFirstHalfForecast()
    {
    }
    public function handleWinBothHalvesForecast()
    {
    }

    public function handleDoubleChanceSecondHalfForecast()
    {
    }
    public function handleBothTeamsScoreFirstHalfForecast()
    {
    }
    public function handleBothTeamsToScoreSecondHalfForecast()
    {
    }
    public function handleWinToNilForecast()
    {
    }

    public function handleHomeWinBothhalvesForecast()
    {
    }
    public function handleExactGoalsNumberForecast()
    {
    }

    public function handleToWinEitherHalfForecast()
    {
    }

    public function handleHomeTeamExactGoalsNumberForecast()
    {
    }
    public function handleAwayTeamExactGoalsNumberForecast()
    {
    }
    public function handleSecondHalfExactGoalsNumberForecast()
    {
       //Bet on the exact total number of goals to be scored in the second half.
    }

    public function handleHomeTeamScoreAGoalForecast()
    {
        //Bet on whether the home team will score at least one goal in the match.
    }
    public function handleAwayTeamScoreAGoalForecast()
    {
        //Bet on whether the away team will score at least one goal in the match.
    }

    public function handleCornersOverUnderForecast()
    {
        //Bet on the total number of corners to be over or under a specific value.
    }
    public function handleExactGoalsNumberFirstHalfForecast()
    {
        //Bet on the exact total number of goals to be scored in the first half.

    }
    public function handleWinningMarginForecast()
    {
        //Bet on the margin of victory for the winning team.
    }
    public function handleToScoreInBothHalvesByTeamsForecast()
    {
    }
    public function handleTotalGoalsBothTeamsToScoreForecast()
    {
         //Bet on the total number of goals and whether both teams will score.
    }
    public function handleGoalLineForecast()
    {
         //Bet on the total number of goals scored to be over or under a specific value.
    }

    public function handleHalftimeResultTotalGoalsForecast()
    {
         //Bet on the half-time result and the total number of goals scored.
    }
    public function handleHalftimeResultBothTeamsScoreForecast()
    {
       //Bet on the half-time result and whether both teams will score
    }
    public function handleAwayWinBothHalvesForecast()
    {
        //Bet on the away team to win both the first and second halves of the match.
    }

    public function handleFirst10minWinnerForecast()
    {
        //Bet on the team that will be leading at the end of the first 10 minutes.
    }
    public function handleCorners1x2Forecast()
    {
         //Bet on the team that will have more corners in the match.

    }

    public function handleCornersAsianHandicapForecast()
    {
        //Bet on a team with a handicap to overcome in terms of corners.
    }
    public function handleHomeCornersOverUnderForecast()
    {
         //Bet on the total number of corners taken by the home team to be over or under a specific value.
    }

    public function handleAwayCornersOverUnderForecast()
    {
         //Bet on the total number of corners taken by the away team to be over or under a specific value.
    }
    public function handleOwnGoalForecast()
    {
        //Bet on whether an own goal will be scored in the match.
    }
    public function handleAwayOddEvenForecast()
    {
        //Bet on whether the total number of goals scored by the away team will be an odd or even number.
    }

    public function handleToQualifyForecast()
    {
         //Bet on a team to qualify for the next round or stage of a competition.
    }
    public function handleCorrectScoreSecondHalfForecast()
    {
        //Bet on the exact score of the match in the second half.
    }

    public function handleOddEvenSecondHalfForecast()
    {
         //Bet on whether the total number of goals scored in the second half will be an odd or even number.
    }
    public function handleGoalLine1stHalfForecast()
    {
         //Bet on the total number of goals scored in the first half to be over or under a specific value.
    }
    public function handleBothTeamstoScore1stHalf2ndHalfForecast()
    {
         //Bet on both teams to score in both the first and second halves."
    }

    public function handle10OverUnderForecast()
    {
        //Bet on the total number of goals to be over or under 10.",
    }
    public function handleLastCornerForecast()
    {
        //Bet on which team will take the last corner in the match.
    }

    public function handleFirstCornerForecast()
    {
        //Bet on which team will take the first corner in the match.
    }
    public function handleTotalCorners1stHalfForecast()
    {
         //Bet on the total number of corners to be taken in the first half.

    }

    public function handleRTG_H1Forecast()
    {
        //Bet on the team that will be leading at half-time.

    }

    public function handleCardsEuropeanHandicapForecast()
    {
          //Bet on a team with a handicap to overcome in terms of cards.
    }
    public function handleCardsOverUnderForecast()
    {
         //Bet on the total number of cards shown to be over or under a specific value.
    }
    public function handleCardsAsianHandicapForecast()
    {
         //Bet on a team with a handicap to overcome in terms of cards.
    }
    public function handleHomeTeamTotalCardsForecast()
    {
        //Bet on the total number of cards shown to the home team.
    }

    public function handleAwayTeamTotalCardsForecast()
    {
    }
    public function handleTotalCorners3Way1stHalfForecast()
    {
         //Bet on the total number of corners to be taken in the first half in a 3-way market
    }

    public function handleTotalCorners3wayForecast()
    {
         //Bet on the total number of corners to be taken in a 3-way market.
    }
    public function handleRCARDForecast()
    {
    }

    public function handleTotalShotOnGoalForecast()
    {
        //Bet on the total number of shots on goal by both teams.
    }
    public function handleHomeTotalShotOnGoalForecast()
    {
    }
    public function handleAwayTotalShotOnGoalForecast()
    {
        //Bet on the total number of shots on goal by the away team.
    }
    public function handleTotalGoals3wayForecast()
    {
        //Bet on the total number of goals scored in a 3-way market.
    }
    public function handleAnytimeGoalScorerForecast()
    {
         //Bet on a player to score a goal at any time during the match.
    }
    public function handleFirstGoalScorerForecast()
    {
        //Bet on a player to score the first goal of the match.
    }

    public function handleLastGoalScorerForecast()
    {
          //Bet on a player to score the last goal of the match.
    }
    public function handleToScoreTwoOrMoreGoalsForecast()
    {
         //Bet on a player to score two or more goals in the match.
    }
    public function handleFirstGoalMethodForecast()
    {
        //Bet on how the first goal of the match will be scored (e.g., header, penalty, etc.).
    }
    public function handleToScoreAPenaltyForecast()
    {
        //Bet on a team or player to score a penalty in the match.
    }
    public function handleToMissAPenaltyForecast()
    {
        //Bet on a team or player to miss a penalty in the match.
    }
    public function handlePlayerToBeBookedForecast()
    {
         //Bet on a player to receive a yellow or red card during the match.

    }
    public function handlePlayerToBeSentOffForecast()
    {
          //Bet on a player to be shown a red card and be sent off during the match.
    }
    public function handleAsianHandicap2ndHalfForecast()
    {
         //Bet on a team with a virtual head start or deficit in the second half.

    }
    public function handleHomeTeamTotalGoals1stHalfForecast()
    {
         //Bet on the total number of goals to be scored by the home team in the first half.
    }
    public function handleAwayTeamTotalGoals1stHalfForecast()
    {
         //Bet on the total number of goals to be scored by the away team in the first half.
    }
    public function handleHomeTeamTotalGoals2ndHalfForecast()
    {
        //Bet on the total number of goals to be scored by the home team in the second half.
    }
    public function hanadleAwayTeamTotalGoals2ndHalfForecast()
    {
         //Bet on the total number of goals to be scored by the away team in the second half.
    }
    public function handleDrawNoBe1stHalfForecast()
    {
         //Bet on the team that will win the first half, with a refund if the match ends in a draw.
    }
    public function handleScoringDrawForecast()
    {
         //Bet on the match to end in a draw with both teams scoring at least one goal.
    }
    public function handleHomeTeamWillScoreInBothHalvesForecast()
    {
    }
    public function handleAwayTeamWillScoreInBothHalvesForecast()
    {
         //Bet on the away team to score at least one goal in both the first and second halves.
    }
    public function handleBothTeamsToScoreInBothHalvesForecast()
    {
    }
    public function handleHomeTeamScoreAGoal1stHalfForecast()
    {
         //Bet on whether the home team will score at least one goal in the first half.
    }
    public function handleHomeTeamScoreAGoal2ndHalfForecast()
    {
         //Bet on whether the home team will score at least one goal in the second half.
    }
    public function handleAwayTeamScoreAGoal1stHalfForecast()
    {
         //Bet on whether the away team will score at least one goal in the first half.
    }
    public function handleAwayTeamScoreAGoal2ndHalfForecast()
    {
         //Bet on whether the away team will score at least one goal in the second half.
    }
    public function handleHomeWinOverForecast()
    {
         //Bet on the home team to win the match and the total number of goals to be over a specific value.
    }
    public function handleHomeWinUnderForecast()
    {
        //Bet on the home team to win the match and the total number of goals to be under a specific value.
    }
    public function handleAwayWinOverForecast()
    {
        //Bet on the away team to win the match and the total number of goals to be over a specific value.
    }
    public function handleAwayWinUnderForecast()
    {
      //Bet on the away team to win the match and the total number of goals to be under a specific value.
    }
    public function handleHomeTeamWillWinEitherHalfForecast()
    {
        //Bet on the home team to win at least one half of the match.

    }
    public function handleAwayTeamWillWinEitherHalfForecast()
    {
        //Bet on the away team to win at least one half of the match.
    }
    public function handleHomeComeFromBehindAndWinForecast()
    {
        //Bet on the home team to come from behind and win the match.
    }
    public function handleCornersAsianHandicap1stHalfForecast()
    {
        //Bet on a team with a handicap to overcome in terms of corners in the first half.
    }
    public function handleCornersAsianHandicap2ndHalfForecast()
    {
         //Bet on a team with a handicap to overcome in terms of corners in the second half.
    }
    public function handleTotalCorners2ndHalfForecast()
    {
         //Bet on the total number of corners to be taken in the second half.
    }
    public function handleTotalCorners3way2ndHalfForecast()
    {
        //Bet on the total number of corners to be taken in the second half in a 3-way market.
    }
    public function handleAwayComeFromBehindAndWinForecast()
    {
         //Bet on the away team to come from behind and win the match.
    }
    public function handleCorners1x21stHalfForecast()
    {
         //Bet on the team that will have more corners in the second half.
    }
    public function handleHomeTotalCorners1stHalfForecast()
    {
        //Bet on the total number of corners taken by the home team in the first half.
    }
    public function handleHomeTotalCorners2ndHalfForecast()
    {
         //Bet on the total number of corners taken by the home team in the second half.
    }
    public function handleAwayTotalCorners1stHalfForecast()
    {
          //Bet on the total number of corners taken by the away team in the first half.
    }
    public function handleAwayTotalCorners2ndHalfForecast()
    {
        //Bet on the total number of corners taken by the away team in the second half.
    }
    public function handle1x215minutesForecast()
    {
     //Bet on the team that will be leading at the end of the first 15 minutes.
    }
    public function handle1x260minutesForecast()
    {
        //Bet on the team that will be leading at the end of the first 60 minutes.
    }
    public function handle1x275minutesForecast()
    {
         //Bet on the team that will be leading at the end of the first 75 minutes.
    }
    public function handle1x230minutesForecast()
    {
          //Bet on the team that will be leading at the end of the first 30 minutes.
    }
    public function handleDC30minutesForecast()
    {
        //Bet on two possible outcomes at the end of the first 30 minutes.
    }
    public function handleDC15minutesForecast()
    {
        //Bet on two possible outcomes at the end of the first 15 minutes.
    }
    public function handleDC60minutesForecast()
    {
         //Bet on two possible outcomes at the end of the first 60 minutes.
    }
    public function handleDC75minutesForecast()
    {
        //Bet on two possible outcomes at the end of the first 75 minutes.
    }
    public function handleGoalIn1630minutesForecast()
    {
         //Bet on whether a goal will be scored in the 16-30 minutes of the match.
    }
    public function handleGoalIn3145minutesForecast()
    {
        //Bet on whether a goal will be scored in the 31-45 minutes of the match.
    }
    public function handleGoalIn4660minutesForecast()
    {
        //Bet on whether a goal will be scored in the 46-60 minutes of the match.
    }
    public function handleGoalIn6175minutesForecast()
    {
         //Bet on whether a goal will be scored in the 61-75 minutes of the match.
    }
    public function handleGoalIn7690minutesForecast()
    {
         //Bet on whether a goal will be scored in the 76-90 minutes of the match.
    }
    public function handleHomeTeamYellowCardsForecast()
    {
         //Bet on the total number of yellow cards shown to the home team.
    }
    public function handleAwayTeamYellowCardsForecast()
    {
         //Bet on the total number of yellow cards shown to the away team.
    }
    public function handleYellowAsianHandicapForecast()
    {
          //Bet on a team with a handicap to overcome in terms of yellow cards.
    }
    public function handleYellowOverUnderForecast()
    {
        //Bet on the total number of yellow cards shown to be over or under a specific value.
    }
    public function handleYellowDoubleChanceForecast()
    {
         //Bet on two possible outcomes of yellow cards to increase winning chances.
    }
    public function handleYellowOverUnder1stHalfForecast()
    {
        //Bet on the total number of yellow cards shown in the first half to be over or under a specific value.
    }
    public function handleYellowOverUnder2ndHalfForecast()
    {
          //Bet on the total number of yellow cards shown in the second half to be over or under a specific value.
    }
    public function handleYellowOddEvenForecast()
    {
        //Bet on whether the total number of yellow cards shown will be an odd or even number.
    }
    public function handleYellowCards1x2Forecast()
    {
         //Bet on the team that will receive more yellow cards in the match.
    }
    public function handleYellowAsianHandicap1stHalfForecast()
    {
         //Bet on a team with a handicap to overcome in terms of yellow cards in the first half.
    }
    public function handleYellowAsianHandicap2ndHalfForecast()
    {
        //Bet on a team with a handicap to overcome in terms of yellow cards in the second half.
    }
    public function handleYellowCards1x21stHalfForecast()
    {
    }
    public function handleYellowCards1x22ndHalfForecast()
    {
        //Bet on the team that will receive more yellow cards in the second half.
    }
    public function handlePenaltyAwardedForecast()
    {
        //Bet on whether a penalty will be awarded during the match.
    }
    public function handleOffsidesTotalForecast()
    {
         //Bet on the total number of offsides committed by both teams.
    }
    public function handleHomeTeamOffsidesForecast()
    {
        //Bet on the total number of offsides committed by the home team.
    }
    public function handleAwayTeamOffsidesForecast()
    {
         //Bet on the total number of offsides committed by the away team.

    }
    public function handleOffsidesAsianHandicapForecast()
    {
         //Bet on a team with a handicap to overcome in terms of offsides.
    }
    public function handleOffsidesAsianHandicap1stHalfForecast()
    {
        //Bet on a team with a handicap to overcome in terms of offsides in the first half.
    }
    public function handleOffsidesAsianHandicap2ndHalfForecast()
    {
         //Bet on a team with a handicap to overcome in terms of offsides in the second half.
    }
    public function handleOffsidesOverUnderForecast()
    {
        //Bet on the total number of offsides committed to be over or under a specific value.
    }
    public function handleOffsidesOverUnder1stHalfForecast()
    {
        //Bet on the total number of offsides committed to be over or under a specific value in the first half.
    }
    public function handleOffsidesOverUnder2ndHalfForecast()
    {
        //Bet on the total number of offsides committed to be over or under a specific value in the second half.
    }
    public function handle1x2AndTotalForecast()
    {
        //Bet on the match result and the total number of goals scored.
    }
    public function handle1x2AndBothTeamsToScoreForecast()
    {
         //Bet on the match result and whether both teams will score.
    }
    public function handleDoubleChanceAndTotalForecast()
    {
         //Bet on two possible outcomes and the total number of goals scored.
    }
    public function handleDoubleChanceAndBothTeamsToScoreForecast()
    {
         //Bet on two possible outcomes and whether both teams will score.
    }
    public function handleCorrectScoreAndTotalForecast()
    {
        //Bet on the exact score of the match and the total number of goals scored.
    }
    public function handleCorrectScoreAndBothTeamsToScoreForecast()
    {
         //Bet on the exact score of the match and whether both teams will score.
    }
    public function handleHTFTAndTotalForecast()
    {
        //Bet on the half-time/full-time result and the total number of goals scored.
    }
    public function handleHTFTAndBothTeamsToScoreForecast()
    {
        //Bet on the half-time/full-time result and whether both teams will score
    }
    public function handleTotalGoalsExactAndTotalForecast()
    {
        //Bet on the exact total number of goals and the total number of goals scored.
    }
    public function handleTotalGoalsExactAndBothTeamsToScoreForecast()
    {
        //Bet on the exact total number of goals and whether both teams will score.
    }
    public function handle1x2AndTotal1stHalfForecast()
    {
         //Bet on the match result and the total number of goals scored in the first half.
    }
    public function handle1x2AndBothTeamsToScore1stHalfForecast()
    {
         //Bet on the match result and whether both teams will score in the first half.
    }
    public function handleDoubleChanceAndTotal1stHalfForecast()
    {
        //Bet on two possible outcomes and the total number of goals scored in the first half.
    }
    public function handleDoubleChanceAndBothTeamsToScore1stHalfForecast()
    {
        //Bet on two possible outcomes and whether both teams will score in the first half.
    }
    public function handleCorrectScoreAndTotal1stHalfForecast()
    {
        //Bet on the exact score of the match and the total number of goals scored in the first half.
    }
    public function handleCorrectScoreAndBothTeamsToScore1stHalfForecast()
    {
         //Bet on the half-time/full-time result and the total number of goals scored in the first half.

    }
    public function handleHTFTAndTotal1stHalfForecast()
    {
         //Bet on the exact score of the match and whether both teams will score in the first half.
    }
    public function handleHTFTAndBothTeamsToScore1stHalfForecast()
    {
         //Bet on the half-time/full-time result and whether both teams will score in the first half.
    }
    public function handleTotalGoalsExactAndTotal1stHalfForecast()
    {
        //Bet on the exact total number of goals and the total number of goals scored in the first half.
    }
    public function handleTotalGoalsExactAndBothTeamsToScore1stHalfForecast()
    {
        //Bet on the exact total number of goals and whether both teams will score in the first half.
    }
    public function handle1x2AndTotal2ndHalfForecast()
    {
         //Bet on the match result and the total number of goals scored in the second half.
    }
    public function handle1x2AndBothTeamsToScore2ndHalfForecast()
    {
         //Bet on the match result and whether both teams will score in the second half.
    }
    public function handleDoubleChanceAndTotal2ndHalfForecast()
    {
        //Bet on two possible outcomes and the total number of goals scored in the second half.
    }
    public function handleDoubleChanceAndBothTeamsToScore2ndHalfForecast()
    {
        //Bet on two possible outcomes and whether both teams will score in the second half.
    }
    public function handleCorrectScoreAndTotal2ndHalfForecast()
    {
          //Bet on the exact score of the match and the total number of goals scored in the second half.
    }
    public function handleCorrectScoreAndBothTeamsToScore2ndHalfForecast()
    {
         //Bet on the exact score of the match and whether both teams will score in the second half.
    }
    public function handleHTFTAndTotal2ndHalfForecast()
    {
        //Bet on the half-time/full-time result and the total number of goals scored in the second half.
    }
    public function handleHTFTAndBothTeamsToScore2ndHalfForecast()
    {
           //Bet on the half-time/full-time result and whether both teams will score in the second half.
    }
    public function handleTotalGoalsExactAndTotal2ndHalfForecast()
    {
         //Bet on the exact total number of goals and the total number of goals scored in the second half.
    }
    public function handleTotalGoalsExactAndBothTeamsToScore2ndHalfForecast()
    {
        //Bet on the exact total number of goals and whether both teams will score in the second half.
    }



}