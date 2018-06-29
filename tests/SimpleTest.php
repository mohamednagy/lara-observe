<?php

namespace Nagy\LaraObserve\Tests;

use Nagy\LaraObserve\Exceptions\SlowQueryException;

class SimpleTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    /** @test */
    public function databaseHasUser()
    {
        $this->expectException(SlowQueryException::class);
        
        $this->assertDatabaseMissing('users', [
            'email' => 'test@test.com'
        ]);
    }
}

