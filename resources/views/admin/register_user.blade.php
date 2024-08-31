@extends('layouts.admin')

@section('content')



    <div class="container">

            @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show mb-1" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (Session::has('message'))
            <div class="alert alert-success">
                <ul>
                    <li>{{ Session::get('message') }}</li>
                </ul>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Register New User</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register_user') }}">
                            @csrf


                            <div class="row">

                                <div class="col form-group">
                                    <label for="name"
                                        class="col-md-6 col-sm-12 col-xs-12 col-form-label text-md-end">{{ __('Name') }}</label>

                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>


                                <div class="col form-group">
                                    <label for="email"
                                        class="col-md-6 col-sm-12 col-xs-12 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-group">

                                    <label for="name">Staff ID</label>
                                    <input type="text" name="staffID" required class="form-control" id="name"
                                        aria-describedby="nameHelp" placeholder="Staff ID">
                                </div>
                                <div class="col form-group">

                                    <label for="role"
                                        class="col-md-6 col-sm-12 col-xs-12 col-form-label text-md-end">{{ __('Role') }}</label>

                                    <select id="role" name="role"
                                        class="form-control @error('role') is-invalid @enderror" required autofocus>
                                        <option value="" disabled selected>Select a role</option>
                                        @foreach ($role as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach

                                    </select>

                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="phone" class="col-form-label">{{ __('Phone Number') }}</label>
                                        <input id="phone" type="tel"
                                            class="form-control @error('phone') is-invalid @enderror" name="phone"
                                            placeholder="Enter your phone number" required autocomplete="tel">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="department" class="col-form-label">{{ __('Department') }}</label>
                                        <select id="department" name="department"
                                            class="form-control @error('department') is-invalid @enderror" required
                                            autofocus>
                                            <option value="" disabled selected>Select a Department</option>
                                            @foreach ($department as $department)
                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endforeach

                                        </select>
                                        @error('department')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-group">
                                    <label for="password"
                                        class="col-md-6 col-sm-12 col-xs-12 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        placeholder="Enter your password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col form-group">
                                    <label for="password2"
                                        class="col-md-6 col-sm-12 col-xs-12 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                    <input id="password2" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        placeholder="Retype your password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>


                            {{-- <div class="row mb-0">
                                <div class="col-md-6 offset-md-4"> --}}
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                            {{-- </div>
                            </div> --}}
                            &nbsp;
                            <a href="#" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                    </div>


                </div>


                </form>
            </div>
        </div>
    </div>
@endsection
