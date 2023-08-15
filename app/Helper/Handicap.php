<?php

namespace App\Helper;

class Handicap
{

    /**
     * -1.5: When you see a handicap of -1.5, it means that the favored team is starting the match with a deficit of 1.5 goals. To win the bet, the favored team needs to win by a margin of at least 2 goals. If the favored team wins by only 1 goal or the match ends in a draw or a loss, the bet is not successful.

     *+1.5: When you see a handicap of +1.5, it means that the underdog team is starting the match with an advantage of 1.5 goals. To win the bet, the underdog team can either win the match, draw, or lose by a margin of 1 goal. If the underdog team loses by 2 goals or more, the bet is not successful.

     *These two handicaps are essentially opposite in nature. A negative handicap (-1.5) is given to the stronger team, while a positive handicap (+1.5) is given to the weaker team. The purpose of these handicaps is to adjust the odds and create a more balanced betting market, especially in situations where there is a perceived mismatch in skill or strength between the two teams.

     *For example, if Manchester City is playing against Norwich City, the odds for Manchester City to win the match outright will be very low. However, if you bet on Manchester City with a handicap of -1.5, the odds will be much higher. This is because Manchester City will need to win by a margin of at least 2 goals for the bet to be successful. If Manchester City wins by only 1 goal, the bet is not successful.

     *-- Here are some general guidelines:

     * Positive Handicap: A positive value (e.g., +0.5, +1.0, +1.5, etc.) means the underdog is given a virtual head start. To win the bet, the underdog team can win, draw, or lose by a smaller margin than the handicap.

     * Negative Handicap: A negative value (e.g., -0.5, -1.0, -1.5, etc.) means the favorite is given a virtual deficit. To win the bet, the favorite team needs to win by a larger margin than the handicap.

     * It's important to note that while the fundamental concepts remain the same, the specific odds and strategies for each handicap value can vary. Additionally, sportsbooks might offer various combinations and variations of Asian Handicaps to cater to different preferences of bettors and to provide balanced odds.

     * When placing bets, always ensure that you understand the specific handicap value, its implications, and the associated odds before making your decision.
     */



    const NEGATIVE_ZERO_POINT_FIVE = '-0.5'; //Favored team starts with a 0.5 goal deficit.;
    const NEGATIVE_ONE_POINT_ZERO = '-1.0'; //Favored team starts with a 1 goal deficit.;
    const NEGATIVE_ONE_POINT_FIVE = '-1.5'; //Favored team starts with a 1.5 goal deficit.;
    const NEGATIVE_ZERO_POINT_TWO_FIVE = '-2.5'; //Favored team starts with a 2.5 goal deficit.;
    const NEGATIVE_THREE_POINT_ZERO = '-3.0'; //Favored team starts with a 3 goal deficit.;
    const NEGATIVE_THREE_POINT_FIVE = '-3.5'; //Favored team starts with a 3.5 goal deficit.;
    const NEGATIVE_FOUR_POINT_ZERO = '-4.0'; //Favored team starts with a 4 goal deficit.;
    const NEGATIVE_FOUR_POINT_FIVE = '-4.5'; //Favored team starts with a 4.5 goal deficit.;
    const NEGATIVE_FIVE_POINT_ZERO = '-5.0'; //Favored team starts with a 5 goal deficit.;
    const NEGATIVE_FIVE_POINT_FIVE = '-5.5'; //Favored team starts with a 5.5 goal deficit.;
    const NEGATIVE_SIX_POINT_ZERO = '-6.0'; //Favored team starts with a 6 goal deficit.;
    const NEGATIVE_SIX_POINT_FIVE = '-6.5'; //Favored team starts with a 6.5 goal deficit.;
    const NEGATIVE_SEVEN_POINT_ZERO = '-7.0'; //Favored team starts with a 7 goal deficit.;
    const NEGATIVE_SEVEN_POINT_FIVE = '-7.5'; //Favored team starts with a 7.5 goal deficit.;
    const NEGATIVE_EIGHT_POINT_ZERO = '-8.0'; //Favored team starts with a 8 goal deficit.;
    const NEGATIVE_EIGHT_POINT_FIVE = '-8.5'; //Favored team starts with a 8.5 goal deficit.;
    const NEGATIVE_NINE_POINT_ZERO = '-9.0'; //Favored team starts with a 9 goal deficit.;
    const NEGATIVE_NINE_POINT_FIVE = '-9.5'; //Favored team starts with a 9.5 goal deficit.;
    const NEGATIVE_TEN_POINT_ZERO = '-10.0'; //Favored team starts with a 10 goal deficit.;
    const NEGATIVE_TEN_POINT_FIVE = '-10.5'; //Favored team starts with a 10.5 goal deficit.;
    const NEGATIVE_ELEVEN_POINT_ZERO = '-11.0'; //Favored team starts with a 11 goal deficit.;
    const NEGATIVE_ELEVEN_POINT_FIVE = '-11.5'; //Favored team starts with a 11.5 goal deficit.;
    const NEGATIVE_TWELVE_POINT_ZERO = '-12.0'; //Favored team starts with a 12 goal deficit.;
    const NEGATIVE_TWELVE_POINT_FIVE = '-12.5'; //Favored team starts with a 12.5 goal deficit.;
    const NEGATIVE_THIRTEEN_POINT_ZERO = '-13.0'; //Favored team starts with a 13 goal deficit.;
    const NEGATIVE_THIRTEEN_POINT_FIVE = '-13.5'; //Favored team starts with a 13.5 goal deficit.;
    const NEGATIVE_FOURTEEN_POINT_ZERO = '-14.0'; //Favored team starts with a 14 goal deficit.;
    const NEGATIVE_FOURTEEN_POINT_FIVE = '-14.5'; //Favored team starts with a 14.5 goal deficit.;
    const NEGATIVE_FIFTEEN_POINT_ZERO = '-15.0'; //Favored team starts with a 15 goal deficit.;
    const NEGATIVE_FIFTEEN_POINT_FIVE = '-15.5'; //Favored team starts with a 15.5 goal deficit.;

    const POSITIVE_ZERO_POINT_FIVE = '+0.5'; //Underdog team starts with a 0.5 goal advantage.;
    const POSITIVE_ONE_POINT_ZERO = '+1.0'; //Underdog team starts with a 1 goal advantage.;
    const POSITIVE_ONE_POINT_FIVE = '+1.5'; //Underdog team starts with a 1.5 goal advantage.;
    const POSITIVE_TWO_POINT_FIVE = '+2.5'; //Underdog team starts with a 2.5 goal advantage.;
    const POSITIVE_THREE_POINT_ZERO = '+3.0'; //Underdog team starts with a 3 goal advantage.;
    const POSITIVE_THREE_POINT_FIVE = '+3.5'; //Underdog team starts with a 3.5 goal advantage.;
    const POSITIVE_FOUR_POINT_ZERO = '+4.0'; //Underdog team starts with a 4 goal advantage.;
    const POSITIVE_FOUR_POINT_FIVE = '+4.5'; //Underdog team starts with a 4.5 goal advantage.;
    const POSITIVE_FIVE_POINT_ZERO = '+5.0'; //Underdog team starts with a 5 goal advantage.;
    const POSITIVE_FIVE_POINT_FIVE = '+5.5'; //Underdog team starts with a 5.5 goal advantage.;
    const POSITIVE_SIX_POINT_ZERO = '+6.0';  //Underdog team starts with a 6 goal advantage.;
    const POSITIVE_SIX_POINT_FIVE = '+6.5'; //Underdog team starts with a 6.5 goal advantage.;
    const POSITIVE_SEVEN_POINT_ZERO = '+7.0'; //Underdog team starts with a 7 goal advantage.;
    const POSITIVE_SEVEN_POINT_FIVE = '+7.5'; //Underdog team starts with a 7.5 goal advantage.;
    const POSITIVE_EIGHT_POINT_ZERO = '+8.0'; //Underdog team starts with a 8 goal advantage.;
    const POSITIVE_EIGHT_POINT_FIVE = '+8.5'; //Underdog team starts with a 8.5 goal advantage.;
    const POSITIVE_NINE_POINT_ZERO = '+9.0'; //Underdog team starts with a 9 goal advantage.;
    const POSITIVE_NINE_POINT_FIVE = '+9.5'; //Underdog team starts with a 9.5 goal advantage.;
    const POSITIVE_TEN_POINT_ZERO = '+10.0'; //Underdog team starts with a 10 goal advantage.;
    const POSITIVE_TEN_POINT_FIVE = '+10.5'; //Underdog team starts with a 10.5 goal advantage.;
    const POSITIVE_ELEVEN_POINT_ZERO = '+11.0'; //Underdog team starts with a 11 goal advantage.;
    const POSITIVE_ELEVEN_POINT_FIVE = '+11.5'; //Underdog team starts with a 11.5 goal advantage.;
    const POSITIVE_TWELVE_POINT_ZERO = '+12.0'; //Underdog team starts with a 12 goal advantage.;
    const POSITIVE_TWELVE_POINT_FIVE = '+12.5'; //Underdog team starts with a 12.5 goal advantage.;
    const POSITIVE_THIRTEEN_POINT_ZERO = '+13.0'; //Underdog team starts with a 13 goal advantage.;
    const POSITIVE_THIRTEEN_POINT_FIVE = '+13.5'; //Underdog team starts with a 13.5 goal advantage.;
    const POSITIVE_FOURTEEN_POINT_ZERO = '+14.0'; //Underdog team starts with a 14 goal advantage.;
    const POSITIVE_FOURTEEN_POINT_FIVE = '+14.5'; //Underdog team starts with a 14.5 goal advantage.;
    const POSITIVE_FIFTEEN_POINT_ZERO = '+15.0'; //Underdog team starts with a 15 goal advantage.;
    const POSITIVE_FIFTEEN_POINT_FIVE = '+15.5'; //Underdog team starts with a 15.5 goal advantage.;



    public static function all()
    {
        $handicaps = [];

        for ($i = -15.5; $i <= 15.5; $i += 0.5) {
            $handicaps[] = sprintf("%.1f", $i);
        }

        return $handicaps;
    }
}
