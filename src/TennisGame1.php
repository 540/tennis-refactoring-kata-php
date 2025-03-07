<?php

namespace Feature;

class TennisGame1 implements TennisGame
{
    private int $player1Score = 0;
    private int $player2Score = 0;
    private string $player1Name = '';
    private string $player2Name = '';

    /* A partir de la version 8.2 */
    //public function __construct(private readonly string $player1Name, private readonly string $player2Name)
    //{
    //}

    public function __construct($player1Name, $player2Name)
    {
        $this->player1Name = $player1Name;
        $this->player2Name = $player2Name;
    }

    public function wonPoint(string $playerName): void
    {
        $this->player1Name == $playerName
            ? $this->player1Score++
            : $this->player2Score++;
    }

    public function getScore(): string
    {
        $score = "";
        if ($this->isTie()) {
            return $this->resultTie();
        }

        if ($this->isAdvantage()) {
            $minusResult = $this->player1Score - $this->player2Score;
            if ($minusResult == 1) {
                return "Advantage " . $this->player1Name;
            }
            if ($minusResult == -1) {
                return "Advantage " . $this->player2Name;
            }
        }

        if ($this->isWin()) {
            $minusResult = $this->player1Score - $this->player2Score;
            if ($minusResult >= 2) {
                return "Win for " . $this->player1Name;
            }
            return "Win for " . $this->player2Name;
        }

        for ($numPlayer = 1; $numPlayer < 3; $numPlayer++) {
            if ($numPlayer == 1) {
                $tempScore = $this->player1Score;
            } else {
                $score .= "-";
                $tempScore = $this->player2Score;
            }
            switch ($tempScore) {
                case 0:
                    $score .= "Love";
                    break;
                case 1:
                    $score .= "Fifteen";
                    break;
                case 2:
                    $score .= "Thirty";
                    break;
                case 3:
                    $score .= "Forty";
                    break;
            }
        }
        return $score;
    }
    private function isTie(): bool
    {
        return $this->player1Score == $this->player2Score;
    }

    private function resultTie(): string
    {
        if ($this->player1Score == 0) {
            return "Love-All";
        }
        if ($this->player1Score == 1) {
            return "Fifteen-All";
        }
        if ($this->player1Score == 2) {
            return "Thirty-All";
        }
        return "Deuce";
    }

    public function isAdvantage(): bool
    {
        return $this->player1Score >= 4 || $this->player2Score >= 4 && abs($this->player1Score - $this->player2Score) == 1;
    }

    public function isWin(): bool
    {
        return $this->player1Score >= 4 || $this->player2Score >= 4 && abs($this->player1Score - $this->player2Score) > 1;
    }
}
