<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository\BaseRepositoryInterface;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllFilter($data);
    public function findManager($department_id);
}
