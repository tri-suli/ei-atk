<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\UserProfile;
use Tests\TestCase;

class UserProfileTest extends TestCase
{
    /**
     * Test custom attributes called avatar's
     *
     * @test
     * @return void
     */
    public function get_formatted_avatar_attributes(): void
    {
        $domain = config('app.url');
        $profile = UserProfile::factory()->make([
            'avatar_path' => 'avatar.png'
        ]);

        $this->assertSame("$domain/avatar.png", $profile->getAvatarAttribute());
    }

    /**
     * Test get fullname attributes that already formatted
     * using title case
     *
     * @test
     * @return void
     */
    public function get_formatted_fullname_attributes(): void
    {
        $profile = UserProfile::factory()->make([
            'fullname' => 'john doe'
        ]);

        $this->assertSame('John Doe', $profile->getFullNameAttribute($profile->fullname));
    }

     /**
     * Test relationship with User::class
     *
     * @test
     * @depends get_formatted_fullname_attributes
     * @return void
     */
    public function profile_is_belongs_to_user(): void
    {
        $user = User::factory()->create();
        $profile = UserProfile::factory()->create(['user_id' => $user,'fullname' => 'name']);

        $profileOwner = $profile->user()->first();
        
        $this->assertSame('Name', $profile->fullname);
        $this->assertSame($user->username, $profileOwner->username);
    }
}
