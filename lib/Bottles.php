<?php

namespace App;

use App\BottleManager;

class Bottles {

    private $bottleManager;

    public function __construct()
    {
        $this->bottleManager = new BottleManager();
    }

    public function verse(int $num): string
    {
        $this->bottleManager->bottles($num);

        return $this->bottleManager->beforeTake()
             . $this->bottleManager->take()
             . $this->bottleManager->afterTake();
    }

    public function verses(int $start, int $end): string
    {
        $verses = range($start, $end);

        $verses = array_map(function ($num) {
            return $this->verse($num);
        }, $verses);

        return implode("\n", $verses);
    }

    public function song(): string
    {
        return $this->verses(99, 0);
    }
}
