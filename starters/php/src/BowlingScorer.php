<?php


class BowlingScorer
{

    private int $score = 0;

    private int $lastRoll = -1;

    public function roll(int $roll)
    {
        if ($this->lastRoll >= 0) {
            if ($this->lastRoll + $roll != 10) {
                $this->score += $this->lastRoll + $roll;
            }
        } else {
            $this->lastRoll = $roll;
        }
    }

    public function score(): int
    {
        return $this->score;
    }
}