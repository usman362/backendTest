<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AttendanceImport;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function uploadAttendance(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            Excel::import(new AttendanceImport, $file);
            return response()->json(['message' => 'Attendance data uploaded successfully'], 200);
        } else {
            return response()->json(['message' => 'No file uploaded'], 400);
        }
    }

    public function getEmployeeAttendance($employeeId)
    {
        $attendance = Attendance::where('employee_id', $employeeId)
        ->with(['employee','schedule'])->get();

        $totalWorkingHours = 0;

        foreach ($attendance as $record) {
            $startTime = strtotime($record->start_time);
            $endTime = strtotime($record->end_time);
            $totalWorkingHours += ($endTime - $startTime) / 3600;
        }

        return response()->json([
            'attendance' => $attendance,
            'total_working_hours' => $totalWorkingHours,
        ], 200);
    }

    public function getEmployeeAttendanceAll()
    {
        $attendance = Attendance::with(['employee','schedule'])->get();

        $totalWorkingHours = 0;

        foreach ($attendance as $record) {
            $startTime = strtotime($record->start_time);
            $endTime = strtotime($record->end_time);
            $totalWorkingHours += ($endTime - $startTime) / 3600;
        }

        return response()->json([
            'attendances' => $attendance,
            'total_working_hours' => $totalWorkingHours,
        ], 200);
    }
}
