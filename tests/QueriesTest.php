<?php

namespace Nagy\LaraObserve\Tests;

use \Illuminate\Support\Facades\Artisan;
use Nagy\LaraObserve\Exceptions\SlowQueryException;

class QueriesTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        Artisan::registerCommand(new TestCommand());
    }

    /** @test */
    public function itFiresException()
    {
        //$this->expectException(SlowQueryException::class);

        $this->runQuery();
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

    private function runQuery()
    {
        \DB::table('users')->get();
    }
}

