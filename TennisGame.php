<?php


class TennisGame
{
    public $score = '';

    public function getScore($m_score1, $m_score2)
    {
        $tempScore = 0;
        if ($m_score1 == $m_score2) {
            switch ($m_score1) {
                case 0:
                    $this->score = LOVE_ALL;
                    break;
                case 1:
                    $this->score = FIFTEEN_ALL;
                    break;
                case 2:
                    $this->score = THIRTY_ALL;
                    break;
                case 3:
                    $this->score = FIFTEEN_ALL;
                    break;
                default:
                    $this->score = DEUCE;
                    break;
            }
        } else if ($m_score1 >= 4 || $m_score2 >= 4) {
            $minusResult = $m_score1 - $m_score2;
            if ($minusResult == 1) $this->score = "Advantage player1";
            else if ($minusResult == -1) $this->score = "Advantage player2";
            else if ($minusResult >= 2) $this->score = "Win for player1";
            else $this->score = "Win for player2";
        } else {
            for ($i = 1; $i < 3; $i++) {
                if ($i == 1) $tempScore = $m_score1;
                else {
                    $this->score .= "-";
                    $tempScore = $m_score2;
                }
                switch ($tempScore) {
                    case 0:
                        $this->score .= LOVE;
                        break;
                    case 1:
                        $this->score .= FIFTEEN;
                        break;
                    case 2:
                        $this->score .= THIRTY;
                        break;
                    case 3:
                        $this->score .= FORTY;
                        break;
                }
            }
        }
    }

    public function __toString()
    {
        return $this->score;
    }
}