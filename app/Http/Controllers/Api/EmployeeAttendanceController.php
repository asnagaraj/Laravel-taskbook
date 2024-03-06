<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendanceDetail;
use Illuminate\Http\Request;

class EmployeeAttendanceController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'employee_id' => 'required',
                'checkin_time' => 'required|date',
                'checkout_time' => 'required|date',
            ]);

            if ($validator->fails()) {
                return $this->sendAsJson($validator->errors(), 400);
            }

            $employeeAttendanceDetail = EmployeeAttendanceDetail::create([
                'employee_id' => $request->employee_id,
                'date' => now(),
                'checkin_time' => $request->checkin_time,
                'checkout_time' => $request->checkout_time,
            ]);
            return $this->sendAsJson($employeeAttendanceDetail, 201);
        } catch (\Exception $e) {
            return $this->sendAsJson($e->getMessage(), 500);
        }
    }
}
