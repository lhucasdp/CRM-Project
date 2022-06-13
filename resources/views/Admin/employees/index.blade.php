@extends('layouts.app')


@section('content')

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <p style="font-size: 50px">Employees</p>
                <div>
                    <a href="{{route("employees.create")}}" class="btn btn-lg btn-success">Create Employee</a>
                </div>

            </div>
        </div>
        <div class="card-body  card-body-color">
            <table class="table table-striped">
                <head>
                    <tr>
                        <th>#</th>
                        <th>Company Name</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </head>

                <tbody>
                @foreach($employees as $key => $employee)
                    <tr>
                        <td>{{($employees->CurrentPage()-1)*10+$key+1}}</td>
                        <td class="text-break">{{$employee->company->name}}</td>
                        <td class="text-break">{{$employee->first_name}}</td>

                        <td class="text-break">{{$employee->last_name}}</td>
                        <td class="text-break">{{$employee->email}}</td>
                        <td class="text-break">{{$employee->phone}}</td>

                        <td>
                            <div class="btn-group">
                                <a href="{{route("employees.edit", ['employee'=> $employee->id])}}" class="btn btn-sm btn-primary">EDIT</a>
                                <form action="{{route("employees.destroy", ['employee'=> $employee->id])}}" method="post">
                                    @csrf
                                    @method("delete")
                                    <button type="submit" class="btn btn-sm btn-danger">REMOVE</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{$employees->links('pagination::bootstrap-4')}}
            </div>
        </div>
    </div>






@endsection

