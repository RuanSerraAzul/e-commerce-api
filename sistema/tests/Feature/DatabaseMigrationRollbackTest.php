<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DatabaseMigrationRollbackTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_migrations_rollback(): void
    {

        $this->expectNotToPerformAssertions();

        // Execute migrations
        $this->artisan('migrate:fresh', ['--database' => 'testing']);

        // Execute migrations rollback
        $this->artisan('migrate:rollback', ['--database' => 'testing']);

    }
}
