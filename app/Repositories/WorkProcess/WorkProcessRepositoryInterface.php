<?php

namespace App\Repositories\WorkProcess;

use App\Repositories\BaseRepository\BaseRepositoryInterface;

interface WorkProcessRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllClasses();
}
