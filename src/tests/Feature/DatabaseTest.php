<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_insert_data()
    {
        $user = new User([
            'email' => 'bbb@ccc.com',
            'password' => 'test12345'
        ]);
        $user->save();

        $this->assertDatabaseHas('users', [
            'email' => 'bbb@ccc.com',
            'password' => 'test12345'
        ]);
    }



}
