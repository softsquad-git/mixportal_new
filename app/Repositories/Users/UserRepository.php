<?php

namespace App\Repositories\Users;
use App\User;
use \Exception;

class UserRepository
{
    /**
     * @param array $filters
     * @return mixed
     */
    public function findBy(array $filters)
    {
        $data = User::orderBy('id', 'DESC');

        if (isset($filters['email']) && !empty($filters['email'])) {
            $data->where('email', $filters['email']);
        }

        if (isset($filters['exception']) && !empty($filters['exception'])) {
            $data->where('id', '!=', $filters['exception']);
        }

        return $data->paginate($filters['pagination'] ?? 20);
    }

    /**
     * @param int $id
     * @return User|null
     * @throws Exception
     */
    public function find(int $id): ?User
    {
        $item = User::find($id);
        if ($item) {
            return $item;
        }

        throw new Exception(trans('trans.exceptions.no_found'));
    }
}