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

        $this->assertScore(0);
    }

    public function testShouldBeAbleToRollAndSeeTotalScore(): void
    {
        $this->roll(2, 3);

        $this->assertScore(5);
    }

    public function testShouldHaveACompleteZeroGame(): void
    {
        $this->roll(0,0, 0,0, 0,0, 0,0, 0,0, 0,0, 0,0, 0,0, 0,0, 0,0);

        $this->assertScore(0);
    }

    public function testShouldAccountScoreForSpares(): void
    {
        $this->roll(5, 5);
        $this->assertScore(0);
        $this->roll(2);
        $this->assertScore(12); //should account previous frame, but not yet the current one
        $this->roll(7);
        $this->assertScore(21); //should account previous and current frame
    }

    public function testShouldAccountForTwoSparesInARow(): void
    {
        $this->roll(5,5);
        $this->assertScore(0);
        $this->roll(2);
        $this->assertScore(12); //add up spare frame score
        $this->roll(8);
        $this->assertScore(12); //another spare frame, not account this one yet...
        $this->roll(3);
        $this->assertScore(25); //add up a second spare frame score
    }

    public function testShouldHaveFullGameWithSpares(): void
    {
        $this->roll(5,5, 2,1, 3,5, 6,2, 0,2, 1,2, 0,0, 4,6, 3,2, 4,4);
        $this->assertScore(62);
    }

    public function testShouldHaveFullSpareGame(): void
    {
        $this->roll(5,5, 5,5, 5,5, 5,5, 5,5, 5,5, 5,5, 5,5, 5,5, 5,5, 5);
        $this->assertScore(150);
    }

    public function testShouldAccountForStrikes(): void
    {
        $this->roll(10);
        $this->assertScore(0);
        $this->roll(2, 3);
        $this->assertScore(20);
    }

    private function roll(...$rolls): void
    {
        foreach ($rolls as $roll) {
            $this->bowlingScorer->roll($roll);
        }
    }

    public function assertScore(int $expected): void
    {
        $this->assertEquals($expected, $this->bowlingScorer->score());
    }
}
