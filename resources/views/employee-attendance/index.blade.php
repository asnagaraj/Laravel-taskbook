@extends('layouts.app')
@section('title', 'Attendance')
@section('content')

<div class="container mt-5">
    <div class="container">
        <div class="row g-3">
            <div class="col-lg-4">
                <form class="row g-3" action="{{url('employee-attendance')}}" method="post">
                    @csrf
                    <div class="col-12">
                        <label class="form-label" for="employeeInp">Employee</label>
                        <select class="form-select" id="employeeInp" name="employee_id">
                            <option selected hidden value=>Choose employee</option>
                            @forelse($employees as $employee)
                            <option value="{{ $employee->id }}" {{ old('employee_id')==$employee->id ?
                                'selected' : '' }}>
                                {{ $employee->name }}
                            </option>
                            @empty
                            <option disabled>No employee found</option>
                            @endforelse
                        </select>
                        @error('category_id')<small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="checkInInp">Check In</label>
                        <input class="form-control" id="checkInInp" type="datetime-local" name="checkin_time"
                            value="{{old('checkin_time')}}">
                        @error('checkin_time')<small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="checkOutInp">Check Out</label>
                        <input class="form-control" id="checkOutInp" type="datetime-local" name="checkout_time"
                            value="{{old('checkout_time')}}">
                        @error('checkout_time')<small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Create</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-8">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Employee</th>
                                <th scope="col">Date</th>
                                <th scope="col">Check In</th>
                                <th scope="col">Check Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employeeAttendanceDetails as $employeeAttendanceDetail)
                            <tr>
                                <td>{{$employeeAttendanceDetail->employee_name}}</td>
                                <td>{{$employeeAttendanceDetail->date}}</td>
                                <td>{{$employeeAttendanceDetail->checkin_time}}</td>
                                <td>{{$employeeAttendanceDetail->checkout_time}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if($employeeAttendanceDetails instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    <div class="mt-4">
                        {!! $employeeAttendanceDetails->links() !!}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection