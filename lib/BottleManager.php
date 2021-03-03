<?php

namespace App;

class BottleManager {

    public $bottles;

    public function bottles(int $num)
    {
        $this->bottles = $num;
    }

    public function beforeTake()
    {
        $verse = ucfirst("{$this->phrase()} of beer on the wall, ") .
        "{$this->phrase()} of beer.\n";

        return $verse;
    }

    public function take()
    {
        if ($this->bottles > 1) {
            $this->bottles--;

            return "Take one down and pass it around, ";
        } elseif ($this->bottles === 1) {
            $this->bottles--;

            return "Take it down and pass it around, ";
        }

        $this->bottles = 99;

        return "Go to the store and buy some more, ";
    }

    public function afterTake()
    {
        return "{$this->phrase()} of beer on the wall.\n";
    }

    private function phrase(): string
    {
        if ($this->bottles > 1) {
            return "{$this->bottles} bottles";
        } elseif ($this->bottles === 1) {
            return "1 bottle";
        } else {
            return "no more bottles";
        }
    }
}
