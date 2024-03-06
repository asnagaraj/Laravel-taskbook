@extends('layouts.app')
@section('title', 'New Employee')
@section('content')

<div class="container mt-5">
    <form class="row g-3" action="{{route('employees.store')}}" method="post">
        @csrf
        <div class="col-md-4">
            <label class="form-label" for="nameInp">Name</label>
            <input class="form-control" id="nameInp" type="text" name="name" value="{{old('name')}}">
            @error('name')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div class="col-md-4">
            <label class="form-label" for="emailInp">Email Address</label>
            <input class="form-control" id="emailInp" type="email" name="email" value="{{old('email')}}">
            @error('email')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div class="col-md-4">
            <label class="form-label" for="designationInp">Designation</label>
            <input class="form-control" id="designationInp" type="text" name="designation"
                value="{{old('designation')}}">
            @error('designation')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div class="col-md-4">
            <label class="form-label" for="officeAddressInp">Office Address</label>
            <input class="form-control" id="officeAddressInp" type="text" name="office_address"
                value="{{old('office_address')}}">
            @error('office_address')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div class="col-md-4">
            <label class="form-label" for="officeMobileInp">Office Mobile N0.</label>
            <input class="form-control" id="officeMobileInp" type="text" name="office_mobile_no"
                value="{{old('office_mobile_no')}}">
            @error('office_mobile_no')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Create</button>
        </div>
    </form>
</div>

@endsection