@extends('layouts.app')
@section('title', 'Employees')
@section('content')

<div class="container mt-5">
    <div class="row align-items-center g-3 mb-3">
        <div class="col-md-6">
            <h4 class="mb-0">Employees</h4>
        </div>
        <div class="col-md-6 text-md-end">
            <a class="btn btn-success me-2" href="{{url('employees-export')}}">
                Export
            </a>
            <a class="btn btn-primary" href="{{route('employees.create')}}">
                Create
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Mobile No</th>
                    <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                <tr>
                    <th scope="row">{{++$i}}</th>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->officeDetail->designation}}</td>
                    <td>{{$employee->officeDetail->office_mobile_no}}</td>
                    <td class="text-center">
                        <form action="{{route('employees.destroy', $employee->id)}}" method="post">
                            @csrf @method('delete')
                            <a class="text-success fw-medium" href="{{route('employees.edit', $employee->id)}}">
                                Edit
                            </a>
                            <button class="border-0 bg-transparent text-danger fw-medium" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if($employees instanceof \Illuminate\Pagination\LengthAwarePaginator)
        <div class="mt-4">
            {!! $employees->links() !!}
        </div>
        @endif
    </div>
</div>

@endsection