<?php

namespace App;

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
