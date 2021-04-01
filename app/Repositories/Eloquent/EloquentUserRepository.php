<?php declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\Eloquent\UserRepository;

class EloquentUserRepository extends BaseRepository implements UserRepository
{   
    /**
     * Get model classname
     *
     * @return string
     */
    public function entity(): string
    {
        return User::class;
    }

    /**
     * Get a specific user from database where
     * user name are match
     *
     * @param string $name
     * @return User|null
     */
    public function findByName(string $name): ?User
    {
        return $this->entity->where('name', $name)->first();
    }

    /**
     * Get a specific user from database where
     * user email are match
     *
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email): ?User
    {
        return $this->entity->where('email', $email)->first();
    }

    /**
     * Get user with profile's
     *
     * @param integer $id
     * @return User|null
     */
    public function findWithProfile(int $id): ?User
    {
        return $this->entity->with('profile:user_id,fullname,avatar_path,role')->find($id);
    }

    /**
     * Get the current authenticated user's
     *
     * @return User|null
     */
    public function current(): ?User
    {
        return auth()->user();
    }
}
