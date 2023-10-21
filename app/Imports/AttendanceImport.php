<?php

namespace App\Imports;

use App\Models\Attendance;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class AttendanceImport implements ToCollection
{
    public function model(array $row)
    {
        return new Attendance([
            'employee_id' => $row[0],
            'schedule_id' => $row[1],
            'start_time' => $row[2],
            'end_time' => $row[3],
            // Add other necessary fields and their corresponding indices from the Excel file
        ]);
    }

    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
    }
}
