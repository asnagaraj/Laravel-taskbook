<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeAttendanceDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeAttendanceController extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('name', 'asc')->get();
        $employeeAttendanceDetails = DB::table('employee_attendance_details')
            ->join('employees', 'employee_attendance_details.employee_id', '=', 'employees.id')
            ->orderBy('employee_attendance_details.id', 'desc')
            ->select('employee_attendance_details.*', 'employees.name as employee_name')
            ->get();
        return view('employee-attendance.index', compact('employees', 'employeeAttendanceDetails'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'checkin_time' => 'required|date',
            'checkout_time' => 'required|date',
        ]);

        EmployeeAttendanceDetail::create([
            'employee_id' => $request->employee_id,
            'date' => now(),
            'checkin_time' => $request->checkin_time,
            'checkout_time' => $request->checkout_time,
        ]);

        toastr()->success('Attendance created');
        return redirect('employee-attendance');
    }
}
