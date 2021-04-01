<?php declare(strict_types=1);

namespace App\Repositories\Contracts\Eloquent;

use App\Models\User;

interface UserRepository
{
    /**
     * Get the current authenticated user's
     *
     * @return User|null
     */
    public function current(): ?User;

    /**
     * Get a specific user from database where
     * user name are match
     *
     * @param string $name
     * @return User|null
     */
    public function findByName(string $name): ?User;

    /**
     * Get a specific user from database where
     * user email are match
     *
     * @param string $name
     * @return User|null
     */
    public function findByEmail(string $name): ?User;

    /**
     * Get user with profile's
     *
     * @param integer $id
     * @return User|null
     */
    public function findWithProfile(int $id): ?User;
}