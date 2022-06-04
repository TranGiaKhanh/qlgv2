<?php

namespace App\Repositories\Education;

use App\Repositories\BaseRepository\BaseRepositoryInterface;

interface EducationRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllClasses();
}
