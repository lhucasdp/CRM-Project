@extends('layouts.app')


@section('content')

    <div class="card">
        <div class="card-header card-header-color">
            <h1>Create Company</h1>
        </div>
        <div class="card-body card-body-color">
            <form action="{{route("companies.store")}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label>Company Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror "  required maxlength="60"
                           value="{{old('name')}}">

                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required maxlength="60"
                           value="{{old('email')}}">

                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Company Logo</label>
                    <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" required >
                    @error('logo')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Website</label>
                    <input type="text" name="website" class="form-control @error('website') is-invalid @enderror" maxlength="60"
                           value="{{old('website')}}">

                    @error('website')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>


                <div class="form-group">
                    <br>
                    <button type="submit" class="btn btn-lg btn-success">Create Company</button>
                </div>
            </form>
        </div>
    </div>

@endsection
