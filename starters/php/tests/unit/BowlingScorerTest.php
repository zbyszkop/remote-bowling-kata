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
        $this->roll(0);

        $this->assertEquals(0, $this->bowlingScorer->score());
    }

    public function testShouldBeAbleToRollAndSeeTotalScore(): void
    {
        $this->roll(2, 3);

        $this->assertEquals(5, $this->bowlingScorer->score());
    }

    public function testShouldHaveACompleteZeroGame(): void
    {
        $this->roll(0,0, 0,0, 0,0, 0,0, 0,0, 0,0, 0,0, 0,0, 0,0, 0,0);

        $this->assertEquals(0, $this->bowlingScorer->score());
    }

    public function testShouldAccountScoreForSpares(): void
    {
        $this->roll(5, 5);
        $this->assertEquals(0, $this->bowlingScorer->score());
        $this->roll(2);
        $this->assertEquals(12, $this->bowlingScorer->score()); //should account previous frame, but not yet the current one
        $this->roll(7);
        $this->assertEquals(21, $this->bowlingScorer->score()); //should account previous and current frame
    }

    public function testShouldAccountForTwoSparesInARow(): void
    {
        $this->roll(5,5);
        $this->assertEquals(0, $this->bowlingScorer->score());
        $this->roll(2);
        $this->assertEquals(12, $this->bowlingScorer->score()); //add up spare frame score
        $this->roll(8);
        $this->assertEquals(12, $this->bowlingScorer->score()); //another spare frame, not account this one yet...
        $this->roll(3);
        $this->assertEquals(25, $this->bowlingScorer->score()); //add up a second spare frame score
    }

    public function testShouldHaveFullGameWithSpares(): void
    {
        $this->roll(5,5, 2,1, 3,5, 6,2, 0,2, 1,2, 0,0, 4,6, 3,2, 4,4);
        $this->assertEquals(62, $this->bowlingScorer->score());
    }



    private function roll(...$rolls): void
    {
        foreach ($rolls as $roll) {
            $this->bowlingScorer->roll($roll);
        }
    }
}
