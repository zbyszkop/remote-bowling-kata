<?php


class BowlingScorer
{

    private int $score = 0;

    public function roll(int $roll)
    {
        $this->score += $roll;
    }

    public function score(): int
    {
        return $this->score;
    }
}