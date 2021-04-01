<?php declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Exceptions\NoEntityDefinedException;
use App\Repositories\Contracts\Criteria\CriteriaContract;
use App\Repositories\Contracts\Eloquent\RepositoryContract;

abstract class BaseRepository implements RepositoryContract, CriteriaContract
{
    /**
     * Model instance
     *
     * @var Model
     */
    protected $entity;

    /**
     * Create the entity model instance
     * 
     * @return void
     */
    public function __construct()
    {
        $this->makeEntity();
    }

    /**
     * Define the repository model
     *
     * @return string
     */
    abstract public function entity(): string;

    /**
     * Get all entity records
     *
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->entity->get();
    }

    /**
     * Store a new record into database
     *
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes): Model
    {
        return $this->entity->create($attributes);
    }

    /**
     * Update a database record by table primary key
     *
     * @param string|int $key
     * @param array $attributes
     * @return boolean
     */
    public function update($key, array $attributes): bool
    {
        return $this->find($key)->update($attributes);
    }

    /**
     * Delete a record from database by table primary key
     *
     * @param string|int $key
     * @return boolean
     */
    public function delete($key): bool
    {
        return (bool) $this->entity->destroy($key);
    }

    /**
     * Find first record by table primary key
     *
     * @param string|int $key
     * @return Model
     */
    public function find($key): Model
    {
        return $this->entity->find($key);
    }

    /**
     * Get entity records with pagination
     *
     * @param integer $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator|Illuminate\Pagination\Paginator
     */
    public function paginate(int $perPage = 10)
    {
        return $this->entity->paginate($perPage);
    }

    /**
     * Add several criteria to the query
     *
     * @param array|object[] ...$criterias
     * @return RepositoryContract
     */
    public function withCriteria(...$criterias): RepositoryContract
    {
        $criterias = Arr::flatten($criterias);

        foreach ($criterias as $criteria) {
            $this->entity = $criteria->apply($this->entity);
        }

        return $this;
    }

    /**
     * Generate models factory
     *
     * @param int|array $attributes
     * @return Collection|Model
     */
    public function generate($attributes)
    {
        if (is_numeric($attributes) && $attributes >= 1) {
            return $this->getEntity()->factory($attributes)->create();
        }

        if (is_array($attributes)) {
            $keys = array_keys($attributes);

            if (is_string($keys[0])) {
                return $this->getEntity()->factory()->create($attributes);
            } else if (is_array($keys[0])) {
                return $this->getEntity()->factory()->createMany($attributes);
            }
        }

        return $this->getEntity()->factory()->create();
    }

    /**
     * Get the model instance
     * 
     * @return Model
     */
    public function getEntity(): Model
    {
        return $this->entity;
    }

    /**
     * Make the concrete model instance that will used
     * by the repository
     *
     * @return void
     * 
     * @throws NoEntityDefinedException
     */
    private function makeEntity(): void
    {
        $this->entity = App::make($this->entity());

        if (!($this->entity instanceof Model)) {
            throw new NoEntityDefinedException($this);
        }
    }
}
