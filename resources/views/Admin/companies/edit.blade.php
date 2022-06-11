
@extends('layouts.app')


@section('content')

    <div class="card">
        <div class="card-header card-header-color">
            <h1>Company Edit</h1>
        </div>
        <div class="card-body card-body-color">
            <form action="{{route('companies.update',['company'=> $company->id ])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method("PUT")

                <div class="form-group">
                    <label>Company Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$company->name}}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$company->email}}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Website</label>
                    <input type="text" name="website" class="form-control @error('website') is-invalid @enderror" value="{{$company->website}}">

                    @error('website')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Logo</label>
                    <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror">
                    @error('logo')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <br>
                    <p>
                        <img src="{{asset( 'storage/logo/'.$company->logo )}}" alt="" style="width: 300px">
                    </p>
                </div>

                <div class="form-group">
                    <br>
                    <button type="submit" class="btn btn-lg btn-success">Company Update</button>
                </div>
            </form>
        </div>
    </div>



@endsection
