<?php

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
}