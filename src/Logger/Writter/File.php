<?php

namespace DifferDev\Logger\Writter;

use DifferDev\Logger\Interface\Writter;

class File implements Writter
{
    public function __construct(
        protected string $path,
        protected string $filename,
    ) {
        # code...
    }

    public function warning(string $message): void
    {
        $this->writeFile($message);
    }

    public function error(string $message): void
    {
        $this->writeFile($message);
    }

    public function writeFile(string $message)
    {
        $fileDir = $this->path . "/$this->filename";

        file_put_contents($fileDir, $message);
    }
}