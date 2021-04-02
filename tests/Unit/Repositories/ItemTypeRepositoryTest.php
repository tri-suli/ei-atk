<?php

namespace Tests\Unit\Repositories;

use Tests\TestCase;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\ItemTypesTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\Contracts\Eloquent\ItemTypeRepository;

class ItemTypeRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Item type repository contract
     *
     * @var ItemTypeRepository
     */
    private $repository;

    /**
     * Make concrete repository contract and run item types
     * table seeder
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->repository = $this->app->make(ItemTypeRepository::class);
        $this->seed([UsersTableSeeder::class, ItemTypesTableSeeder::class]);
    }

    /**
     * Test get item types by user id
     *
     * @test
     * @return void
     */
    public function find_by_creator(): void
    {
        $itemTypes = $this->repository->findByCreator(2);

        $this->assertCount(14, $itemTypes);
    }

    /**
     * Test get item types name's
     *
     * @test
     * @return void
     */
    public function find_by_name(): void
    {
        $itemType = $this->repository->findByName(
            $this->repository::TYPE_BOARD
        );

        $this->assertEquals('Papan', $itemType->name);
    }
}
