<?php

namespace DifferDev\Logger;

class MyLogger
{
    public function __construct(
        protected string $type
    ) {
        # code...
    }

    public function error(string $message)
    {
        $formatedMessage = 'Error: ' . $message . "\r\n";

        if ($this->type === 'console') {
            echo $formatedMessage;
        }

        if ($this->type === 'file') {
            file_put_contents('logs.txt', $formatedMessage);
        }
    }

    public function warning(string $message)
    {
        $formatedMessage = 'Warning: ' . $message . "\r\n";

        if ($this->type === 'console') {
            echo $formatedMessage;
        }

        if ($this->type === 'file') {
            file_put_contents('logs.txt', $formatedMessage);
        }
    }
}