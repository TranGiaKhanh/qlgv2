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
            'id' => $row['id'],
            'class_id' => $row['class_id'],
            'date' => $row['date'],
            'location' => $row['location'],
            'time' => $row['time'],
            'value' => $row['value'],
            'teacher' => $row['teacher']
        ]);
    }
}
