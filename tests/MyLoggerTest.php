<?php

use DifferDev\Logger\MyLogger;

class MyLoggerTest extends PHPUnit\Framework\TestCase
{
    public function setUp(): void
    {
        chdir(__DIR__);
    }

    public function tearDown(): void
    {
        if (file_exists('logs.txt')) {
            unlink('logs.txt');
        }
    }

    public function testClassLoggerShouldLogErrorInConsole()
    {
        $logger = new MyLogger('console');
        $message = 'Olá mundo via logger';
        
        $this->expectOutputString("Error: Olá mundo via logger\r\n");

        $logger->error($message);
    }

    public function testClassLoggerShouldLogWarningInConsole()
    {
        $logger = new MyLogger('console');
        $message = 'Olá mundo via logger';
        
        $this->expectOutputString("Warning: Olá mundo via logger\r\n");

        $logger->warning($message);
    }

    public function testClassLoggerShouldLogErrorInFile()
    {
        $logger = new MyLogger('file');
        $message = 'Olá mundo via arquivo';

        $logger->error($message);

        $this->assertFileEquals('fixtures/log_error.txt', 'logs.txt');
    }

    public function testClassLoggerShouldLogWarningInFile()
    {
        $logger = new MyLogger('file');
        $message = 'Olá mundo via arquivo';

        $logger->warning($message);

        $this->assertFileEquals('fixtures/log_warning.txt', 'logs.txt');
    }
}