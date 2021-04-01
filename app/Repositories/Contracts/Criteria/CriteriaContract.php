<?php declare(strict_types=1);

namespace App\Repositories\Contracts\Criteria;

use App\Repositories\Contracts\Eloquent\RepositoryContract;

interface CriteriaContract
{
    /**
     * Add several criteria to the query
     *
     * @param array|object[] ...$criterias
     * @return RepositoryContract
     */
    public function withCriteria(...$criterias): RepositoryContract;    
}