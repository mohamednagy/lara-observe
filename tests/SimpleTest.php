<?php

namespace Nagy\LaravelDB\Tests;

class SimpleTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    /** @test */
    public function databaseHasUser()
    {
        $this->expectException(\Nagy\LaravelDB\SlowQueryException::class);
        
        $this->assertDatabaseMissing('users', [
            'email' => 'test@test.com'
        ]);
    }
}

