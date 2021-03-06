<?php

namespace App\Repositories\Afteredu;

use App\Models\Classes;
use App\Models\Afteredu;
use App\Repositories\BaseRepository\BaseRepository;

class AftereduRepository extends BaseRepository implements AftereduRepositoryInterface
{
    public function getModel()
    {
        return Afteredu::class;
    }
    public function getAllClasses()
    {
        return $this->model->paginate(50);
    }
}
