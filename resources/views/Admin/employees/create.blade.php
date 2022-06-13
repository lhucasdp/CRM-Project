@extends('layouts.app')


@section('content')

    <div class="card">
        <div class="card-header card-header-color">
            <h1>Create Employee</h1>
        </div>
        <div class="card-body card-body-color">
            <form action="{{route("employees.store")}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                           maxlength="60"
                           value="{{old('first_name')}}">

                    @error('first_name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                            maxlength="60"
                           value="{{old('last_name')}}">

                    @error('last_name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                           maxlength="60"
                           value="{{old('email')}}">

                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror"
                            maxlength="15"
                           value="{{old('phone')}}">

                    @error('phone')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Company</label>
                    <select name="company_id" id="" class="form-select" >
                        <option selected value="">Select Company</option>
                        @foreach($companies as $company)
                            @php

                                @endphp
                            <option value="{{$company->id}}">{{$company->name}}</option>
                        @endforeach
                    </select>
                    @error('company_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>


                <div class="form-group">
                    <br>
                    <button type="submit" class="btn btn-lg btn-success float-end">Create Employee</button>
                </div>
            </form>
        </div>
    </div>




    <script>
        function mascara(o, f) {
            v_obj = o
            v_fun = f
            setTimeout("execmascara()", 1)
        }

        function execmascara() {
            v_obj.value = v_fun(v_obj.value)
        }

        function mtel(v) {
            v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
            v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
            v = v.replace(/(\d)(\d{4})$/, "$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
            return v;
        }

        function id(el) {
            return document.getElementById(el);
        }

        window.onload = function () {
            id('phone').onkeyup = function () {
                mascara(this, mtel);
            }
        }
    </script>


@endsection
