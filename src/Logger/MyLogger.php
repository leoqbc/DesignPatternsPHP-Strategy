<?php

namespace DifferDev\Logger;

use DifferDev\Logger\Interface\Writter;

// Open/Closed
class MyLogger
{
    public function __construct(
        protected Writter $writter
    ) {
        # code...
    }

    public function error(string $message)
    {
        $this->writter->error($message);
    }

    public function warning(string $message)
    {
        $this->writter->warning($message);
    }
}