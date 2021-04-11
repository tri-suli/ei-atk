<?php declare(strict_types=1);

namespace App\Repositories;

use App\Repositories\Contracts\Eloquent\UserRepository;
use App\Repositories\Contracts\Eloquent\ItemRepository;
use App\Repositories\Contracts\Eloquent\ItemTypeRepository;

use App\Repositories\Eloquent\EloquentUserRepository;
use App\Repositories\Eloquent\EloquentItemRepository;
use App\Repositories\Eloquent\EloquentItemTypeRepository;

class RepositoryLoader
{
    /**
     * Binding all available repositories into the
     * app container
     *
     * @return void
     */
    public static function boot($app): void
    {
        $repository = new self();

        foreach ($repository->repositories() as $abstract => $concrete) {
            $app->bind($abstract, $concrete);
        }
    }

    /**
     * List all available repositories
     *
     * @return array|string[]
     */
    public function repositories(): array
    {
        return [
            UserRepository::class => EloquentUserRepository::class,
            ItemRepository::class => EloquentItemRepository::class,
            ItemTypeRepository::class => EloquentItemTypeRepository::class
        ];
    }
}
