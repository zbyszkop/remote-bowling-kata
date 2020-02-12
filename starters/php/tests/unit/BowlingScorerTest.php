<?php

use PHPUnit\Framework\TestCase;

final class BowlingScorerTest extends TestCase
{

    private $bowlingScorer;

    public function testShouldBeAbleToScoreAndSeeScore(): void
    {
        $this->bowlingScorer->roll(0);

        $this->assertEquals(0, $this->bowlingScorer->score());
    }

    public function testShouldBeAbleToRollAndSeeTotalScore(): void
    {
        $this->bowlingScorer->roll(2);
        $this->bowlingScorer->roll(3);

        $this->assertEquals(5, $this->bowlingScorer->score());
    }

    protected function setUp(): void
    {
        $this->bowlingScorer = $bowlingScorer = new BowlingScorer();
        parent::setUp();
    }
}
