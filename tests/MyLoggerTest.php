<?php

use DifferDev\Logger\MyLogger;

class MyLoggerTest extends PHPUnit\Framework\TestCase
{
    protected MyLogger $consoleLog;
    
    protected MyLogger $fileLog;

    public function setUp(): void
    {
        chdir(__DIR__);
        $this->consoleLog = new MyLogger('console');
        $this->fileLog = new MyLogger('file');
    }

    public function tearDown(): void
    {
        if (file_exists('logs.txt')) {
            unlink('logs.txt');
        }
    }

    public function testClassLoggerShouldLogErrorInConsole()
    {
        $message = 'Olá mundo via logger';
        
        $this->expectOutputString("Error: Olá mundo via logger\r\n");

        $this->consoleLog->error($message);
    }

    public function testClassLoggerShouldLogWarningInConsole()
    {
        $message = 'Olá mundo via logger';
        
        $this->expectOutputString("Warning: Olá mundo via logger\r\n");

        $this->consoleLog->warning($message);
    }

    public function testClassLoggerShouldLogErrorInFile()
    {
        $message = 'Olá mundo via arquivo';

        $this->fileLog->error($message);

        $this->assertFileEquals('fixtures/log_error.txt', 'logs.txt');
    }

    public function testClassLoggerShouldLogWarningInFile()
    {
        $message = 'Olá mundo via arquivo';

        $this->fileLog->warning($message);

        $this->assertFileEquals('fixtures/log_warning.txt', 'logs.txt');
    }
}