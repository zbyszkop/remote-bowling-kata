<?php

use PHPUnit\Framework\TestCase;

final class BowlingScorerTest extends TestCase
{

    public function testShouldBeAbleToScoreAndSeeScore(): void
    {
        $bowlingScorer = new BowlingScorer();

        $bowlingScorer->roll(0);

        $this->assertEquals(0, $bowlingScorer->score());

    }

    public function testShouldBeAbleToRollAndSeeTotalScore(): void
    {
        $bowlingScorer = new BowlingScorer();

        $bowlingScorer->roll(2);
        $bowlingScorer->roll(3);

        $this->assertEquals(5, $bowlingScorer->score());

    }
}
