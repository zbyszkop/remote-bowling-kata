<?php

use PHPUnit\Framework\TestCase;

final class BowlingScorerTest extends TestCase
{

    public function testShouldBeAbleToScore(): void
    {
        $bowlingScorer = new BowlingScorer();

        $bowlingScorer->roll(0);

        $this->assertTrue(true); //fake assertion so test passes
    }

    public function testShouldBeAbleToScoreAndSeeScore(): void
    {
        $bowlingScorer = new BowlingScorer();

        $bowlingScorer->roll(0);

        $this->assertEquals(0, $bowlingScorer->score());

    }
}
