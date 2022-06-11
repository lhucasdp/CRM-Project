@extends('layouts.app')


@section('content')


    <div class="card">
        <div class="card-header card-header-color">
            <h1>Employee Edit</h1>
        </div>
        <div class="card-body card-body-color">
            <form action="{{route('employees.update',['employee'=> $employee->id ])}}" method="post">
                @csrf
                @method("PUT")

                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                           value="{{$employee->first_name}}">

                    @error('first_name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                           value="{{$employee->last_name}}">

                    @error('last_name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                           value="{{$employee->email}}">

                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                           value="{{$employee->phone}}">

                    @error('phone')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Company Name</label>
                    <select type="text" name="company_id" id="" class="form-control" multiple>
                        @foreach($companies as $company)
                            <option value="{{$company->id}}"
                                    @if($employee->company->name == $company->name) selected @endif>{{$company->name}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <br>
                    <button type="submit" class="btn btn-lg btn-success">Employee Update</button>
                </div>
            </form>
        </div>
    </div>


@endsection
