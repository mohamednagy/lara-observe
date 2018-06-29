<?php

namespace Nagy\LaraObserve\Tests;

use Nagy\LaraObserve\Exceptions\SlowQueryException;
use Artisan;

class SimpleTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        Artisan::registerCommand(new TestCommand());
    }

    /** @test */
    public function databaseHasUser()
    {
        $this->expectException(SlowQueryException::class);

        $this->assertDatabaseMissing('users', [
            'email' => 'test@test.com'
        ]);
    }

    /** @test */
    public function exceptionReportsRequest()
    {
        $expectedMessage = PHP_EOL . 'Url: http://localhost';
        try {
            $this->assertDatabaseMissing('users', [
                'email' => 'test@test.com'
            ]);
        } catch (SlowQueryException $e) {
            $this->assertStringEndsWith($expectedMessage, $e->getReportMessage());
        }
    }

    /** @test */
    public function exceptionReportsCommand()
    {
        // TODO: find a way to test the command reported message
        $this->expectException(SlowQueryException::class);
        $this->artisan('test:something');
    }
}

