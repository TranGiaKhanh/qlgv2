<?php

namespace App\Repositories\Classes;

use App\Models\Classes;
use Illuminate\Support\Facades\Auth;
use App\Repositories\BaseRepository\BaseRepository;

class ClassesRepository extends BaseRepository implements ClassesRepositoryInterface
{
    public function getModel()
    {
        return Classes::class;
    }
    public function getAllClasses()
    {
        return $this->model->paginate(50);
    }
}
