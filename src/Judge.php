<?php

namespace App;

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
