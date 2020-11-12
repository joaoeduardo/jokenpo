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

    public function testScissorsTieWithScissors()
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

    public function testScissorsLosesRock()
    {
        $judge = new Judge();

        $winner = $judge->whoWin('scissors', 'rock');

        $this->assertEquals(Player::PLAYER_2, $winner);
    }

    public function testPaperLosesScissors()
    {
        $judge = new Judge();

        $winner = $judge->whoWin('paper', 'scissors');

        $this->assertEquals(Player::PLAYER_2, $winner);
    }

    public function testPaperWinsRock()
    {
        $judge = new Judge();

        $winner = $judge->whoWin('paper', 'rock');

        $this->assertEquals(Player::PLAYER_1, $winner);
    }

    public function testRockLosesPaper()
    {
        $judge = new Judge();

        $winner = $judge->whoWin('rock', 'paper');

        $this->assertEquals(Player::PLAYER_2, $winner);
    }

    public function testRockWinsScissors()
    {
        $judge = new Judge();

        $winner = $judge->whoWin('rock', 'scissors');

        $this->assertEquals(Player::PLAYER_1, $winner);
    }

    public function testBothPlayersEmpty()
    {
        $judge = new Judge();

        $winner = $judge->whoWin('', '');

        $this->assertEquals(Player::NONE, $winner);
    }

    public function testPlayer1Empty()
    {
        $judge = new Judge();

        $winner = $judge->whoWin('', 'paper');

        $this->assertEquals(Player::NONE, $winner);
    }
    
    public function testPlayer2Empty()
    {
        $judge = new Judge();

        $winner = $judge->whoWin('paper', '');

        $this->assertEquals(Player::NONE, $winner);
    }
}

class Judge
{
    public function whoWin(string $player1, string $player2): int
    {
        if ($player1 === 'scissors' && $player2 === 'paper') {
            return Player::PLAYER_1;
        } else if ($player1 === 'scissors' && $player2 === 'rock') {
            return Player::PLAYER_2;
        } else if ($player1 === 'paper' && $player2 === 'scissors') {
            return Player::PLAYER_2;
        } else if ($player1 === 'paper' && $player2 === 'rock') {
            return Player::PLAYER_1;
        } else if ($player1 === 'rock' && $player2 === 'paper') {
            return Player::PLAYER_2;
        } else if ($player1 === 'rock' && $player2 === 'scissors') {
            return Player::PLAYER_1;
        }

        return Player::NONE;
    }
}

class Player
{
    const NONE = 0;
    const PLAYER_1 = 1;
    const PLAYER_2 = 2;
}