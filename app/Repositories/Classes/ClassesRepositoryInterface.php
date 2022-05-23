<?php

namespace App\Repositories\CLasses;

use App\Repositories\BaseRepository\BaseRepositoryInterface;

interface ClassesRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllClasses();
}

