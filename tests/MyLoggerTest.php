<?php

use DifferDev\Logger\LogStrategy;
use DifferDev\Logger\MyLogger;

use DifferDev\Logger\Writter\Console;
use DifferDev\Logger\Writter\File;

class MyLoggerTest extends PHPUnit\Framework\TestCase
{
    protected MyLogger $consoleLog;
    
    protected MyLogger $fileLog;

    public function setUp(): void
    {
        chdir(__DIR__);
        $this->consoleLog = new MyLogger(
            new LogStrategy(
                new Console()
            )
        );

         $this->fileLog = new MyLogger(
            new LogStrategy(
                new File('.', 'logs.txt')
            )
        );
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