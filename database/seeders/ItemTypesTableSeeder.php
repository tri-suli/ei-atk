<?php

namespace Database\Seeders;

use App\Models\ItemType;
use Illuminate\Database\Seeder;

class ItemTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (ItemType::TYPES as $name) {
            ItemType::factory()->create(['added_by' => 2, 'name' => $name]);
        }
    }
}
