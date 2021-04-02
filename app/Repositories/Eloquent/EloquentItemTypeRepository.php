<?php declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Models\ItemType;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Contracts\Eloquent\ItemTypeRepository;

class EloquentItemTypeRepository extends BaseRepository implements ItemTypeRepository
{   
    /**
     * Get model classname
     *
     * @return string
     */
    public function entity(): string
    {
        return ItemType::class;
    }

    /**
     * Get item types by user id's
     *
     * @param  int $userId
     * @return Collection [Collection of item types]
     */
    public function findByCreator(int $userId): Collection
    {
        return $this->entity->where('added_by', $userId)->get();
    }

    /**
     * Get item type by name
     *
     * @param  string $name
     * @return ItemType|null
     */
    public function findByName(string $name): ?ItemType
    {
        return $this->entity->where('name', $name)->first();
    }
}
