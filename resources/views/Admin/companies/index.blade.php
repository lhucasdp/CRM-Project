@extends('layouts.app')


@section('content')


        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <p style="font-size: 50px">Companies</p>
                    <div>
                        <a href="{{route("companies.create")}}" class="btn btn-lg btn-success">Create Company</a>
                    </div>

                </div>
            </div>
            <div class="card-body  card-body-color">
                <table class="table table-striped">
                    <head>
                        <tr>
                            <th>#</th>
                            <th>Logo</th>
                            <th>Company</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Action</th>
                        </tr>
                    </head>

                    <tbody>
                    @foreach($companies as $key=>$company)
                        <tr>
                            <td>{{($companies->CurrentPage()-1)*10+$key+1}}</td>

                            <td> <img src="{{asset( 'storage/logo/'.$company->logo )}}" alt="{{$company->logo}}" style="width: 70px"></td>

                            <td>{{$company->name}}</td>

                            <td>{{$company->email}}</td>
                            <td>{{$company->website}}</td>

                            <td>
                                <div class="btn-group">
                                    <a href="{{route("companies.edit", ['company'=> $company->id])}}" class="btn btn-sm btn-primary">EDIT</a>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#{{$company->name.$company->id}}">DELETE</button>
                                </div>
                            </td>


                            <div class="modal fade" id="{{$company->name.$company->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">WARNING</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Deleting the store
                                            {{$company->name}}
                                            will also delete all employees!!!
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <form action="{{route("companies.destroy", ['company'=> $company->id])}}" method="post">
                                                @csrf
                                                @method("delete")
                                                <button type="submit" class="btn btn-danger">Confirm</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{$companies->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>





@endsection

