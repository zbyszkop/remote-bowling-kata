<?php


class BowlingScorer
{

    private int $score = 0;

    private int $lastRoll = -1, $nextToLastRoll = -1;

    public function roll(int $roll)
    {
        if ($this->nextToLastRoll == 10) {
            $this->score += 10 + $this->lastRoll + $roll;
            $this->nextToLastRoll = -1;
        } else if ($this->nextToLastRoll + $this->lastRoll == 10) {
            $this->score += 10 + $roll;
            $this->nextToLastRoll = -1;
            $this->lastRoll = -1;
        }

        if ($this->lastRoll >= 0) {
            if ($this->lastRoll == 10) {
                $this->nextToLastRoll = $this->lastRoll;
                $this->lastRoll = $roll;
            } else if ($this->lastRoll + $roll != 10) {
                $this->score += $this->lastRoll + $roll;
                $this->lastRoll = -1;
            } else {
                $this->nextToLastRoll = $this->lastRoll;
                $this->lastRoll = $roll;
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