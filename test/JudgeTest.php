<?php

use PHPUnit\Framework\TestCase;

class JudgeTest extends TestCase
{
    public function testRockTieWithRock()
    {
        $judge = new Judge();

        $winner = $judge->whoWin(Option::rock(), Option::rock());

        $this->assertEquals(Player::NONE, $winner);
    }

    public function testPaperTieWithPaper()
    {
        $judge = new Judge();

        $winner = $judge->whoWin(Option::paper(), Option::paper());

        $this->assertEquals(Player::NONE, $winner);
    }

    public function testScissorsTieWithScissors()
    {
        $judge = new Judge();

        $winner = $judge->whoWin(Option::scissors(), Option::scissors());

        $this->assertEquals(Player::NONE, $winner);
    }

    public function testScissorsWinsPaper()
    {
        $judge = new Judge();

        $winner = $judge->whoWin(Option::scissors(), Option::paper());

        $this->assertEquals(Player::PLAYER_1, $winner);
    }

    public function testScissorsLosesRock()
    {
        $judge = new Judge();

        $winner = $judge->whoWin(Option::scissors(), Option::rock());

        $this->assertEquals(Player::PLAYER_2, $winner);
    }

    public function testPaperLosesScissors()
    {
        $judge = new Judge();

        $winner = $judge->whoWin(Option::paper(), Option::scissors());

        $this->assertEquals(Player::PLAYER_2, $winner);
    }

    public function testPaperWinsRock()
    {
        $judge = new Judge();

        $winner = $judge->whoWin(Option::paper(), Option::rock());

        $this->assertEquals(Player::PLAYER_1, $winner);
    }

    public function testRockLosesPaper()
    {
        $judge = new Judge();

        $winner = $judge->whoWin(Option::rock(), Option::paper());

        $this->assertEquals(Player::PLAYER_2, $winner);
    }

    public function testRockWinsScissors()
    {
        $judge = new Judge();

        $winner = $judge->whoWin(Option::rock(), Option::scissors());

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

class Option
{
    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function rock()
    {
        return new self('rock');
    }

    public static function paper()
    {
        return new self('paper');
    }

    public static function scissors()
    {
        return new self('scissors');
    }

    public function getValue(): string
    {
        return $this->value;
    }
}