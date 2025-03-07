<?php

namespace Feature;

interface TennisGame
{
    public function wonPoint(string $playerName): void;
    public function getScore(): string;
}
