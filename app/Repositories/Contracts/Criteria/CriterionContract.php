<?php declare(strict_types=1);

namespace App\Repositories\Contracts\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface CriterionContract
{
    /**
     * Undocumented function
     *
     * @param Model $entity
     * @return Builder
     */
    public function apply(Model $entity): Builder;
}