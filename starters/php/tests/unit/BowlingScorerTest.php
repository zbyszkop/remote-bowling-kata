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
}
