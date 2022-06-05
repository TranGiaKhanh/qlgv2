<?php

namespace App\Repositories\Afteredu;

use App\Repositories\BaseRepository\BaseRepositoryInterface;

interface AftereduRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllClasses();
}
