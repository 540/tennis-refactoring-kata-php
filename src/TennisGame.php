<?php

interface TennisGame
{
    /**
     * @param  $playerName
     * @return void
     */
    public function wonPoint($playerName): void;

    /**
     * @return string
     */
    public function getScore(): string;
}
