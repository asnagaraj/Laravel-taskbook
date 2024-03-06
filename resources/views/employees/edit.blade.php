@extends('layouts.app')
@section('title', 'Edit Employee')
@section('content')

<div class="container mt-5">
    <form class="row g-3" action="{{route('employees.update', $employee->id)}}" method="post">
        @csrf @method('put')
        <div class="col-md-4">
            <label class="form-label" for="nameInp">Name</label>
            <input class="form-control" id="nameInp" type="text" name="name" value="{{$employee->name}}">
            @error('name')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div class="col-md-4">
            <label class="form-label" for="emailInp">Email Address</label>
            <input class="form-control" id="emailInp" type="email" name="email" value="{{$employee->email}}">
            @error('email')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div class="col-md-4">
            <label class="form-label" for="designationInp">Designation</label>
            <input class="form-control" id="designationInp" type="text" name="designation"
                value="{{$employee->officeDetail->designation}}">
            @error('designation')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div class="col-md-4">
            <label class="form-label" for="officeAddressInp">Office Address</label>
            <input class="form-control" id="officeAddressInp" type="text" name="office_address"
                value="{{$employee->officeDetail->office_address}}">
            @error('office_address')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div class="col-md-4">
            <label class="form-label" for="officeMobileInp">Office Mobile N0.</label>
            <input class="form-control" id="officeMobileInp" type="text" name="office_mobile_no"
                value="{{$employee->officeDetail->office_mobile_no}}">
            @error('office_mobile_no')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Update</button>
        </div>
    </form>
</div>

@endsection