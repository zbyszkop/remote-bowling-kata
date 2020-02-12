<?php

use PHPUnit\Framework\TestCase;

final class BowlingScorerTest extends TestCase
{

    private $bowlingScorer;

    protected function setUp(): void
    {
        $this->bowlingScorer = $bowlingScorer = new BowlingScorer();
        parent::setUp();
    }

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

    public function testShouldHaveACompleteZeroGame(): void
    {
        for ($i = 0; $i < 20; $i++) {
            $this->bowlingScorer->roll(0);
        }

        $this->assertEquals(0, $this->bowlingScorer->score());
    }

    public function testShouldAccountScoreForSpares(): void
    {
        $this->bowlingScorer->roll(5);
        $this->bowlingScorer->roll(5);
        $this->assertEquals(0, $this->bowlingScorer->score());
        $this->bowlingScorer->roll(2);
        $this->assertEquals(12, $this->bowlingScorer->score()); //should account previous frame, but not yet the current one

    }



}
