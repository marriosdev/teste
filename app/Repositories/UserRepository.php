<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function __construct(protected User $entity)
    {}

    /**
     * @return \Illuminate\Database\Eloquent\Collection<int, User>
     */
    public function findByEmail(string $email): User|null
    {
        return $this->entity->where('email', $email)->first();
    }
}