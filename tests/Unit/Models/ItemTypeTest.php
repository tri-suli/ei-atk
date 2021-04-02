<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\User;
use App\Models\ItemType;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ItemTypeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test get name attributes that already formatted
     * using title case
     *
     * @test
     * @return void
     */
    public function get_formatted_name_attributes(): void
    {
        $profile = ItemType::factory()->make([
            'name' => 'pen'
        ]);

        $this->assertSame('Pen', $profile->getNameAttribute($profile->name));
    }

    /**
     * Test relationship with User::class
     *
     * @test
     * @depends get_formatted_name_attributes
     * @return void
     */
    public function item_types_is_added_by_administrator(): void
    {
        $user = User::factory()->create();
        $itemType = ItemType::factory()->create(['added_by' => $user, 'name' => 'goods']);

        $creator = $itemType->user()->first();

        $this->assertSame($creator->id, $user->id);
        $this->assertEquals('Goods', $itemType->name);
    }
}
