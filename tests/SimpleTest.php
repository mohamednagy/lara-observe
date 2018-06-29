<?php

namespace Nagy\LaraObserve\Tests;

class SimpleTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    /** @test */
    public function databaseHasUser()
    {
        $this->expectException(\Nagy\LaraObserve\SlowQueryException::class);
        
        $this->assertDatabaseMissing('users', [
            'email' => 'test@test.com'
        ]);
    }
}

