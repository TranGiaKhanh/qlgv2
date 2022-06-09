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

    public function getAllFilter($data)
    {
        $query = $this->model;
        if(isset($data['department_id']))
        {
            $query = $query->where('department_id', $data['department_id']);
        }
        if(isset($data['keyword']))
        {
            $query = $query->where('name', 'like', '%' . $data['keyword'] . '%');
        }

        return $query->paginate(50);
    }
}
