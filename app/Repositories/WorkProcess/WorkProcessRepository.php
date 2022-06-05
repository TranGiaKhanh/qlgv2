<?php


namespace App\Repositories\WorkProcess;

use App\Models\Classes;
use App\Models\WorkProcess;
use App\Repositories\BaseRepository\BaseRepository;

class WorkProcessRepository extends BaseRepository implements WorkProcessRepositoryInterface
{
    public function getModel()
    {
        return WorkProcess::class;
    }
    public function getAllClasses()
    {
        return $this->model->paginate(50);
    }
}
