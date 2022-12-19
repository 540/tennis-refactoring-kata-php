<?php

class TennisGame3 implements TennisGame
{
    private int $p2 = 0;
    private int $p1 = 0;
    private string $p1N = '';
    private string $p2N = '';

    public function __construct($p1N, $p2N)
    {
        $this->p1N = $p1N;
        $this->p2N = $p2N;
    }

    public function getScore(): string
    {
        if ($this->p1 < 4 && $this->p2 < 4 && !($this->p1 + $this->p2 == 6)) {
            $p = array("Love", "Fifteen", "Thirty", "Forty");
            $s = $p[$this->p1];
            return ($this->p1 == $this->p2) ? "{$s}-All" : "{$s}-{$p[$this->p2]}";
        } else {
            if ($this->p1 == $this->p2) {
                return "Deuce";
            }
            $s = $this->p1 > $this->p2 ? $this->p1N : $this->p2N;
            return (($this->p1 - $this->p2) * ($this->p1 - $this->p2) == 1) ? "Advantage {$s}" : "Win for {$s}";
        }
    }

    public function wonPoint($playerName): void
    {
        if ($playerName == "player1") {
            $this->p1++;
        } else {
            $this->p2++;
        }
    }

}

