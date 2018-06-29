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
        try {
            $this->assertDatabaseMissing('users', [
                'email' => 'test@test.com'
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
            $this->assertTrue(true);
        }
    }
}

