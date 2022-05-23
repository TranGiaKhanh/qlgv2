<?php

namespace App\Repositories\Schedule;
use App\Repositories\BaseRepository\BaseRepositoryInterface;

interface ScheduleRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllSchedules();
}
