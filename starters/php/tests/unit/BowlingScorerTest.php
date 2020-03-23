<?php

use PHPUnit\Framework\TestCase;

final class BowlingScorerTest extends TestCase
{

    private $bowlingScorer;

    protected function setUp(): void
    {
        $this->bowlingScorer = new BowlingScorer();
        parent::setUp();
    }

    public function testShouldBeAbleToScoreAndSeeScore(): void
    {
        $this->bowlingScorer->score(0);
        $this->assertTrue(true);
    }

}
