<?php declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Models\Item;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Contracts\Eloquent\ItemRepository;

class EloquentItemRepository extends BaseRepository implements ItemRepository
{   
    /**
     * Get model classname
     *
     * @return string
     */
    public function entity(): string
    {
        return Item::class;
    }

    /**
     * Get all item'records
     *
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->entity->exists()->with([
            'type:id,name',
            'user' => function ($query) {
                $query->select('id')->with('profile:user_id,fullname');
            }
        ])->get();
    }
}
