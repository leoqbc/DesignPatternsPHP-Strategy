<?php

namespace DifferDev\Logger;

use DifferDev\Logger\Interface\Writter;

class LogStrategy implements Writter
{
    public function __construct(
        protected Writter $writter
    ) {
        # code...
    }

    public function warning(string $message): void
    {
        $formatedMessage = 'Warning: ' . $message . "\r\n";
        $this->writter->warning($formatedMessage);
    }

    public function error(string $message): void
    {
        $formatedMessage = 'Error: ' . $message . "\r\n";
        $this->writter->error($formatedMessage);
    }
}