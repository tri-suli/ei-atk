<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * Test relationship with UserProfile::class
     *
     * @test
     * @return void
     */
    public function user_has_profile(): void
    {
        $user = User::factory()->create();
        
        $profile = $user->profile()->create([
            'role' => 'admin',
            'fullname' => 'John Doe',
        ]);

        $this->assertInstanceOf(\App\Models\UserProfile::class, $profile);
        $this->assertSame('admin', $profile->role);
        $this->assertSame('John Doe', $profile->fullname);
    }
}
