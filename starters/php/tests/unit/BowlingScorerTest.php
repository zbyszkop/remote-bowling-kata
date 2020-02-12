<?php

use PHPUnit\Framework\TestCase;

final class BowlingScorerTest extends TestCase
{

    public function testShouldBeAbleToScore(): void
    {
        $bowlingScorer = new BowlingScorer();

        $bowlingScorer->roll(0);

    }
}
