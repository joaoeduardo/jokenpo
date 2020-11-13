<?php

use App\{ Judge, Option };

use PHPUnit\Framework\TestCase;

class JudgeTest extends TestCase
{
    public function testRockTieWithRock()
    {
        $judge = new Judge();

        $winner = $judge
            ->playerOneChose(Option::rock())
            ->playerTwoChose(Option::rock())
            ->whoWins();

        $this->assertEquals(null, $winner);
    }

    public function testPaperTieWithPaper()
    {
        $judge = new Judge();

        $winner = $judge
            ->playerOneChose(Option::paper())
            ->playerTwoChose(Option::paper())
            ->whoWins();

        $this->assertEquals(null, $winner);
    }

    public function testScissorsTieWithScissors()
    {
        $judge = new Judge();

        $winner = $judge
            ->playerOneChose(Option::scissors())
            ->playerTwoChose(Option::scissors())
            ->whoWins();

        $this->assertEquals(null, $winner);
    }

    public function testScissorsWinsPaper()
    {
        $judge = new Judge();

        $winner = $judge
            ->playerOneChose(Option::scissors())
            ->playerTwoChose(Option::paper())
            ->whoWins();

        $this->assertEquals(Option::scissors(), $winner);
    }

    public function testScissorsLosesRock()
    {
        $judge = new Judge();

        $winner = $judge
            ->playerOneChose(Option::scissors())
            ->playerTwoChose(Option::rock())
            ->whoWins();

        $this->assertEquals(Option::rock(), $winner);
    }

    public function testPaperLosesScissors()
    {
        $judge = new Judge();

        $winner = $judge
            ->playerOneChose(Option::paper())
            ->playerTwoChose(Option::scissors())
            ->whoWins();

        $this->assertEquals(Option::scissors(), $winner);
    }

    public function testPaperWinsRock()
    {
        $judge = new Judge();

        $winner = $judge
            ->playerOneChose(Option::paper())
            ->playerTwoChose(Option::rock())
            ->whoWins();

        $this->assertEquals(Option::paper(), $winner);
    }

    public function testRockLosesPaper()
    {
        $judge = new Judge();

        $winner = $judge
            ->playerOneChose(Option::rock())
            ->playerTwoChose(Option::paper())
            ->whoWins();

        $this->assertEquals(Option::paper(), $winner);
    }

    public function testRockWinsScissors()
    {
        $judge = new Judge();

        $winner = $judge
            ->playerOneChose(Option::rock())
            ->playerTwoChose(Option::scissors())
            ->whoWins();

        $this->assertEquals(Option::rock(), $winner);
    }
}
