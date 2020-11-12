<?php

use PHPUnit\Framework\TestCase;

class JudgeTest extends TestCase
{
    public function testRockTieWithRock()
    {
        $judge = new Judge();

        $winner = $judge->whoWin('rock', 'rock');

        $this->assertEquals(Player::NONE, $winner);
    }

    public function testPaperTieWithPaper()
    {
        $judge = new Judge();

        $winner = $judge->whoWin('paper', 'paper');

        $this->assertEquals(Player::NONE, $winner);
    }

    public function testScissorsTieWithscissors()
    {
        $judge = new Judge();

        $winner = $judge->whoWin('scissors', 'scissors');

        $this->assertEquals(Player::NONE, $winner);
    }

    public function testScissorsWinsPaper()
    {
        $judge = new Judge();

        $winner = $judge->whoWin('scissors', 'paper');

        $this->assertEquals(Player::PLAYER_1, $winner);
    }
}

class Judge
{
    public function whoWin(string $player1, string $player2): int
    {
        return Player::NONE;
    }
}

class Player
{
    const NONE = 0;
    const PLAYER_1 = 1;
    const PLAYER_2 = 2;
}