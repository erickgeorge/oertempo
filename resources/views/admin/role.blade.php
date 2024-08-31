@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">All Roles</h1>


                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show mb-1" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Date Created</th>
                                        <th>Date Updated</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($role as $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->created_at }}</td>
                                            <td>{{ $role->updated_at }}</td>
                                            <td style="text-align: center">
                                                <i data-toggle="modal" title="Edit"
                                                    data-target=".bd-example-modal-lg-{{ $role->id }}"
                                                    style="color:blue" class="fas fa-edit"></i>&nbsp;
                                                {{-- <a href="{{ route('delete_role', [$role->id]) }}"><i style="color:red"
                                                            class="fas fa-trash"></i></a> --}}
                                                <a onclick="return confirm('Are you sure you want to delete this work order?')"
                                                    href="{{ route('delete_role', [$role->id]) }}" title="Delete"> <i
                                                        style="color:red" class="fa fa-trash"></i> </a>

                                                <div class="modal fade bd-example-modal-lg-{{ $role->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content container py-2">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h4>Edit Role</h4>
                                                                </div>

                                                                <div class="card-body">

                                                                    <form method="POST" action="{{ route('edit_role') }}"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        <input type="text" value="{{ $role->id }}"
                                                                            name="id" hidden>
                                                                        <div class="row ">
                                                                            <div class="col  ">
                                                                                <div class="form-group">
                                                                                    <label for="name">
                                                                                        Name</label>
                                                                                    <input type="text"
                                                                                        value="{{ $role->name }}"
                                                                                        name="name" required
                                                                                        class="form-control" id="name"
                                                                                        aria-describedby="nameHelp"
                                                                                        placeholder="">
                                                                                </div>
                                                                            </div>
                                                                            {{-- <div class="col  ">
                                                                                    <div class="form-group">
                                                                                        <label for="name">Name</label>
                                                                                        <input type="email"
                                                                                            value="{{ $role->email }}"
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
                                                                                            value="{{ $role->email }}"
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
    <br />
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">Register New Role</div>

            <div class="card-body">
                <form method="POST" action="{{ route('add_role') }}">
                    @csrf


                    <div class="row">

                        <div class="col form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" required class="form-control" id="name"
                                aria-describedby="nameHelp" placeholder="Enter Role Name">
                        </div>


                    </div>

                    <button type="submit" class="btn btn-primary">Add</button>
                    &nbsp;
                    <a href="#" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
