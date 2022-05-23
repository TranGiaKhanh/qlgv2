<?php

namespace App\Repositories\Schedule;

use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;
use App\Repositories\BaseRepository\BaseRepository;

class ScheduleRepository extends BaseRepository implements ScheduleRepositoryInterface
{
    public function getModel()
    {
        return Schedule::class;
    }
    public function getAllSchedules()
    {
        return $this->model->paginate(10);
    }
}
