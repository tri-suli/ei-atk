<?php declare(strict_types=1);

namespace App\Repositories\Contracts\Eloquent;

use App\Models\ItemType;
use App\Models\Contracts\ItemTypeContract;
use Illuminate\Database\Eloquent\Collection;

interface ItemTypeRepository extends ItemTypeContract
{
    /**
     * Get item types by user id's
     *
     * @param  int $userId
     * @return Collection [Collection of item types]
     */
    public function findByCreator(int $userId): Collection;

    /**
     * Get item type by name
     *
     * @param  string $name
     * @return ItemType|null
     */
    public function findByName(string $name): ?ItemType;
}