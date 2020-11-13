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

    public function testNewApi()
    {
        $judge = new Judge();

        $winner = $judge
            ->playerOneChose(Option::paper())
            ->playerTwoChose(Option::rock())
            ->whoWins();

        $this->assertEquals(Option::paper(), $winner);
    }
}

class Judge
{
    /** @var Option[] */
    private array $options = [];

    private Option $playerOneChoice;

    private Option $playerTwoChoice;

    public function __construct()
    {
        $this->options[] = Option::rock();
        $this->options[] = Option::paper();
        $this->options[] = Option::scissors();
    }

    public function playerOneChose(Option $option): self
    {
        $this->playerOneChoice = $option;

        return $this;
    }

    public function playerTwoChose(Option $option): self
    {
        $this->playerTwoChoice = $option;

        return $this;
    }

    public function whoWins(): ?Option
    {
        $playerOneChoiceIndex = array_search($this->playerOneChoice, $this->options);

        $playerOneLosesOptionIndex = ($playerOneChoiceIndex + 1) % 3;

        $playerOneLosesOption = $this->options[$playerOneLosesOptionIndex];

        $playerOneLoses = $playerOneLosesOption == $this->playerTwoChoice;

        if ($playerOneLoses) return $this->playerTwoChoice;

        $playerOneWinsOptionIndex = ($playerOneChoiceIndex - 1 + 3) % 3;

        $playerOneWinsOption = $this->options[$playerOneWinsOptionIndex];

        $playerOneWins = $playerOneWinsOption == $this->playerTwoChoice;

        if ($playerOneWins) return $this->playerOneChoice;

        return null;
    }

    public function whoWin(Option $player1, Option $player2): int
    {
        if ($player1->getValue() === 'scissors' && $player2->getValue() === 'paper') {
            return Player::PLAYER_1;
        } else if ($player1->getValue() === 'scissors' && $player2->getValue() === 'rock') {
            return Player::PLAYER_2;
        } else if ($player1->getValue() === 'paper' && $player2->getValue() === 'scissors') {
            return Player::PLAYER_2;
        } else if ($player1->getValue() === 'paper' && $player2->getValue() === 'rock') {
            return Player::PLAYER_1;
        } else if ($player1->getValue() === 'rock' && $player2->getValue() === 'paper') {
            return Player::PLAYER_2;
        } else if ($player1->getValue() === 'rock' && $player2->getValue() === 'scissors') {
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