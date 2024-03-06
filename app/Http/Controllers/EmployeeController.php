<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::orderBy('id', 'desc')->paginate(10);
        return view('employees.index', compact('employees'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'designation' => 'required',
            'office_address' => 'required',
            'office_mobile_no' => 'required',
        ]);

        $employee = Employee::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $employee->officeDetail()->create([
            'designation' => $request->designation,
            'office_address' => $request->office_address,
            'office_mobile_no' => $request->office_mobile_no,
        ]);

        toastr()->success('Employee created');
        return redirect()->route('employees.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'designation' => 'required',
            'office_address' => 'required',
            'office_mobile_no' => 'required',
        ]);

        $employee->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $employee->officeDetail()->create([
            'designation' => $request->designation,
            'office_address' => $request->office_address,
            'office_mobile_no' => $request->office_mobile_no,
        ]);

        toastr()->success('Employee created');
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        toastr()->success('Employee deleted');
        return redirect()->route('employees.index');
    }
}
