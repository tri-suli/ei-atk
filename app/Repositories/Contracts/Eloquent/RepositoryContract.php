<?php declare(strict_types=1);

namespace App\Repositories\Contracts\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface RepositoryContract
{
    /**
     * Get all entity records
     *
     * @return Collection
     */
    public function all(): Collection;

    /**
     * Store a new record into database
     *
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes): Model;

    /**
     * Update a database record by table primary key
     *
     * @param string|int $key
     * @param array $attributes
     * @return boolean
     */
    public function update($key, array $attributes): bool;

    /**
     * Delete a record from database by table primary key
     *
     * @param string|int $key
     * @return boolean
     */
    public function delete($key): bool;

    /**
     * Find first record by table primary key
     *
     * @param string|int $key
     * @return Model
     */
    public function find($key): Model;
    
    /**
     * Get entity records with pagination
     *
     * @param integer $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator|Illuminate\Pagination\Paginator
     */
    public function paginate(int $perPage = 10);

    /**
     * Generate models factory
     *
     * @param int|array $attributes
     * @return Collection|Model
     */
    public function generate($attributes);
}