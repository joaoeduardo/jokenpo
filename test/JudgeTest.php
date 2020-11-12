<?php

use PHPUnit\Framework\TestCase;

class JudgeTest extends TestCase
{
    public function testRockTieWithRock()
    {
        $judge = new Judge();

        $winner = $judge->whoWin('rock', 'rock');

        $this->assertEquals(0, $winner);
    }

    public function testPaperTieWithPaper()
    {
        $judge = new Judge();

        $winner = $judge->whoWin('paper', 'paper');

        $this->assertEquals(0, $winner);
    }

    public function testScissorsTieWithscissors()
    {
        $judge = new Judge();

        $winner = $judge->whoWin('scissors', 'scissors');

        $this->assertEquals(0, $winner);
    }
}

class Judge
{
    public function whoWin(string $player1, string $player2): int
    {
        return 0;
    }
}