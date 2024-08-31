@extends('layouts.admin')

@section('title', 'All Users')

@section('content')
    <!-- End of Topbar -->
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">All Users</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show mb-1" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><a class="btn btn-primary" href="{{ route('usersadd') }}"> Add
                        New User</a></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Staff ID</th>
                                <th>Department</th>
                                <th>Role</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($user as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->staffID }}</td>
                                    <td>
                                        @foreach ($department as $checkdepartment)
                                            @if ($user['department'] == $checkdepartment['id'])
                                                {{ $checkdepartment->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($role as $checkrole)
                                            @if ($user['role'] == $checkrole['id'])
                                                {{ $checkrole->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td style="text-align: center">
                                        <i data-toggle="modal" title="Edit"
                                            data-target=".bd-example-modal-lg-{{ $user->id }}" style="color:blue"
                                            class="fas fa-edit"></i>&nbsp;
                                        <i data-toggle="modal" title="Reset Password"
                                            data-target=".bd-example-modal-lg-{{ $user->id }}1" style="color:black"
                                            class="fas fa-key"></i>&nbsp;
                                        {{-- <a href="{{ route('delete_role', [$user->id]) }}"><i style="color:red"
                                                            class="fas fa-trash"></i></a> --}}
                                        <a onclick="return confirm('Are you sure you want to delete this User?')"
                                            href="{{ route('delete_user', [$user->id]) }}" title="Delete"> <i
                                                style="color:red" class="fa fa-trash"></i> </a>


                                        <div class="modal fade bd-example-modal-lg-{{ $user->id }}1" tabindex="-1"
                                            role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content container py-2">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h4>Reset Password</h4>
                                                        </div>

                                                        <div class="card-body">

                                                            <form method="POST" action="{{ route('reset_password') }}"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="text" value="{{ $user->id }}"
                                                                    name="id" hidden>
                                                                <div class="row ">
                                                                    <div class="col  ">
                                                                        <div class="form-group">
                                                                            <label for="name">
                                                                                New Password</label>
                                                                            <input type="password" value=""
                                                                                name="password" required
                                                                                class="form-control" id="password"
                                                                                aria-describedby="nameHelp" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                {{-- class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}"> --}}
                                                                <button type="submit"
                                                                    class="btn btn-primary">Reset</button>
                                                                &nbsp;
                                                                <a href="#" class="btn btn-danger"
                                                                    data-dismiss="modal">Cancel</a>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade bd-example-modal-lg-{{ $user->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content container py-2">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h4>Edit User</h4>
                                                        </div>

                                                        <div class="card-body">

                                                            <form method="POST" action="{{ route('edit_user') }}"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="text" value="{{ $user->id }}"
                                                                    name="id" hidden>
                                                                <div class="row ">
                                                                    <div class="col  ">
                                                                        {{-- <div class="form-group">
                                                                            <label for="name">
                                                                                Name</label>
                                                                            <input type="text"
                                                                                value="{{ $user->name }}" name="name"
                                                                                required class="form-control" id="name"
                                                                                aria-describedby="nameHelp" placeholder="">
                                                                        </div> --}}
                                                                        <div class="col form-group">
                                                                            <label for="name"
                                                                                class="col-form-label text-md-end">{{ __('Name') }}</label>

                                                                            <input id="name" type="text"
                                                                                class="form-control @error('name') is-invalid @enderror"
                                                                                name="name" value="{{ $user->name }}"
                                                                                required autocomplete="name" autofocus>

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
                                                                                class="form-control @error('email') is-invalid @enderror"
                                                                                name="email"
                                                                                value="{{ $user->email }}" required
                                                                                autocomplete="email">

                                                                            @error('email')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col form-group">
                                                                            <label for="role"
                                                                                class="col-md-6 col-sm-12 col-xs-12 col-form-label text-md-end">{{ __('Role') }}</label>

                                                                            <select id="role" name="role"
                                                                                class="form-control @error('role') is-invalid @enderror"
                                                                                required autofocus>
                                                                                <option value="{{ $user->role }}"
                                                                                    selected>
                                                                                    @foreach ($role as $role1)
                                                                                        @if ($user['role'] == $role1['id'])
                                                                                            {{ $role1['name'] }}
                                                                                        @endif
                                                                                    @endforeach
                                                                                </option>
                                                                                @foreach ($role as $roleS)
                                                                                    <option value="{{ $roleS->id }}">
                                                                                        {{ $roleS->name }}</option>
                                                                                @endforeach

                                                                            </select>

                                                                            @error('role')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col form-group">

                                                                            <label for="name">Staff ID</label>
                                                                            <input type="text"
                                                                                value="{{ $user->staffID }}"
                                                                                name="staffID" required
                                                                                class="form-control" id="name"
                                                                                aria-describedby="nameHelp"
                                                                                placeholder="Staff ID">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="phone"
                                                                                class="col-form-label">{{ __('Phone Number') }}</label>
                                                                            <input id="phone" type="tel"
                                                                                class="form-control @error('phone') is-invalid @enderror"
                                                                                name="phone"
                                                                                value="{{ $user->phone }}"
                                                                                placeholder="Enter your phone number"
                                                                                required autocomplete="tel">
                                                                            @error('phone')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="department"
                                                                                class="col-form-label">{{ __('Department') }}</label>

                                                                            <select id="department" name="department"
                                                                                class="form-control @error('department') is-invalid @enderror"
                                                                                required autofocus>
                                                                                <option value="{{ $user->department }}"
                                                                                    selected>
                                                                                    @foreach ($department as $department1)
                                                                                        @if ($user['department'] == $department1['id'])
                                                                                            {{ $department1['name'] }}
                                                                                        @endif
                                                                                    @endforeach
                                                                                </option>
                                                                                @foreach ($department as $departmentS)
                                                                                    <option
                                                                                        value="{{ $departmentS->id }}">
                                                                                        {{ $departmentS->name }}</option>
                                                                                @endforeach

                                                                            </select>
                                                                            @error('department')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>

                                                                    </div>
                                                                    {{-- <div class="col  ">
                                                                                    <div class="form-group">
                                                                                        <label for="name">Name</label>
                                                                                        <input type="email"
                                                                                            value="{{ $user->email }}"
                                                                                            name="email" required
                                                                                            class="form-control"
                                                                                            id="email"
                                                                                            aria-describedby="nameHelp"
                                                                                            placeholder="Enter Email">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col  ">
                                                                                    <div class="form-group">
                                                                                        <label for="name">Year</label>
                                                                                        <input type="email"
                                                                                            value="{{ $user->email }}"
                                                                                            name="email" required
                                                                                            class="form-control"
                                                                                            id="email"
                                                                                            aria-describedby="nameHelp"
                                                                                            placeholder="Enter Email">
                                                                                    </div>
                                                                                </div> --}}
                                                                </div>

                                                                {{-- class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}"> --}}
                                                                <button type="submit"
                                                                    class="btn btn-primary">Update</button>
                                                                &nbsp;
                                                                <a href="#" class="btn btn-danger"
                                                                    data-dismiss="modal">Cancel</a>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                </div>

                </td>
                </tr>
                @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection
