<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $employees = Employee::orderBy('id', 'desc')->get();
            return $this->sendAsJson($employees, 200);
        } catch (\Exception $e) {
            return $this->sendAsJson($e->getMessage(), 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email',
                'designation' => 'required',
                'office_address' => 'required',
                'office_mobile_no' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->sendAsJson($validator->errors(), 400);
            }

            $employee = Employee::create([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            $employee->officeDetail()->create([
                'designation' => $request->designation,
                'office_address' => $request->office_address,
                'office_mobile_no' => $request->office_mobile_no,
            ]);
            return $this->sendAsJson($employee, 201);
        } catch (\Exception $e) {
            return $this->sendAsJson($e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        try {
            return $this->sendAsJson($employee, 200);
        } catch (\Exception $e) {
            return $this->sendAsJson($e->getMessage(), 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email',
                'designation' => 'required',
                'office_address' => 'required',
                'office_mobile_no' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->sendAsJson($validator->errors(), 400);
            }

            $employee->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            $employee->officeDetail()->create([
                'designation' => $request->designation,
                'office_address' => $request->office_address,
                'office_mobile_no' => $request->office_mobile_no,
            ]);
            return $this->sendAsJson($employee, 200);
        } catch (\Exception $e) {
            return $this->sendAsJson($e->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        try {
            $employee->delete();
            return $this->sendAsJson([], 200);
        } catch (\Exception $e) {
            return $this->sendAsJson($e->getMessage(), 500);
        }
    }
}
