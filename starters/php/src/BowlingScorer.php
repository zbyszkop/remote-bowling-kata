<?php


class BowlingScorer
{

    private int $score = 0;

    private int $lastRoll = -1, $nextToLastRoll = -1;

    public function roll(int $roll)
    {
        if ($this->shouldAddStrikeScore()) {
            $this->score += 10 + $this->lastRoll + $roll;
        } else if ($this->shouldAddSpareScore()) {
            $this->score += 10 + $roll;
            $this->nextToLastRoll = -1;
            $this->lastRoll = -1;
        }

        if ($this->lastRoll >= 0) {
            if ($this->countingStrike() || $this->countingSpare($roll)) {
                $this->nextToLastRoll = $this->lastRoll;
                $this->lastRoll = $roll;
            } else {
                $this->score += $this->lastRoll + $roll;
                $this->lastRoll = -1;
            }
        } else {
            $this->lastRoll = $roll;
        }
    }

    public function score(): int
    {
        return $this->score;
    }

    private function shouldAddStrikeScore(): bool
    {
        return $this->nextToLastRoll == 10;
    }

    private function shouldAddSpareScore(): bool
    {
        return $this->nextToLastRoll + $this->lastRoll == 10;
    }

    /**
     * @return bool
     */
    public function countingStrike(): bool
    {
        return $this->lastRoll == 10;
    }

    /**
     * @param int $roll
     * @return bool
     */
    public function countingSpare(int $roll): bool
    {
        return $this->lastRoll + $roll == 10;
    }
}