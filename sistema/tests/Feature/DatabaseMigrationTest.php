<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class DatabaseMigrationTest extends TestCase
{
    use DatabaseMigrations;

    #[Test]
    public function it_creates_users_table()
    {
        // Execute migrations
        $this->artisan('migrate:fresh', ['--database' => 'testing']);

        // Verify if table users_admin was created
        $this->assertTrue(Schema::hasTable('users_admin'));
        
        // Verify if the expected columns exists
        $this->assertTrue(Schema::hasColumns('users_admin', [
            'id', 'email', 'password', 'access_level', 'email_verified_at'
        ]));

        // Verify if table users_admin was created
        $this->assertTrue(Schema::hasTable('users_admin_access_level'));
        
        // Verify if the expected columns exists
        $this->assertTrue(Schema::hasColumns('users_admin_access_level', [
            'id', 'name'
        ]));

    }
}
