<?php

namespace App\Imports;

use App\Models\Schedule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ScheduleImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Schedule([
            'id' => $row[0],
            'class' => $row[1],
            'date' => $row[2],
            'lesson' => $row[3],
            'value' => $row[4],
            'teacher' => $row[5]
        ]);
    }
}
