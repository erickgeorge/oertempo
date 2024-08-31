@extends('layouts.admin')

@section('content')
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">All Contents</h1>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><a href="{{ route('createcontent') }}"> Add New Content</a></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Published By</th>
                                <th>Published At</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $cvy = 1;
                            @endphp
                            @foreach ($contents as $course)
                                <tr>
                                    <td>{{ $cvy++ }}</td>
                                    <td>{{ $course->title }}</td>
                                    <td>{{ $course->author->name }}</td>
                                    <td>{{ $course->created_at }}</td>
                                    <td>
                                        <a href="{{ route('adminviewcourse', $course->id) }}"
                                            class="btn btn-primary">View</a>
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection
