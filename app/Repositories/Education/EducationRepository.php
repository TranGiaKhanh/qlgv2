<?php


namespace App\Repositories\Education;

use App\Models\Classes;
use App\Models\Education;
use App\Repositories\BaseRepository\BaseRepository;

class EducationRepository extends BaseRepository implements EducationRepositoryInterface
{
    public function getModel()
    {
        return Education::class;
    }
    public function getAllClasses()
    {
        return $this->model->paginate(50);
    }
}
