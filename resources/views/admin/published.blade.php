@extends('layouts.admin')

@section('content')
    <?php use Carbon\Carbon; ?>

    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->

        <!-- DataTales Example -->


        @if (count($contents) > 0)
            <div class="card shadow mb-4">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif





                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Published</h6>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Content Name</th>
                                    <th>Creator</th>
                                    {{-- <th>Stages</th> --}}
                                    <th>Published At</th>
                                    <th>Days Since Created</th>
                                    <th>Action</th>

                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    $cvy = 1;
                                @endphp
                                @foreach ($contents as $content)
                                    <tr>
                                        <td>{{ $cvy++ }}</td>
                                        <td>{{ $content->title }}</td>
                                        <td>{{ $content['creator']->name }}</td>
                                        {{-- <td>
                                        @if ($content->status == 5)
                                            <span class="badge badge-primary"> Published </span>
                                        @endif

                                    </td> --}}
                                        <td>{{ Carbon::parse($content->publishedat)->format('d F Y') }}</td>
                                        <td>

                                            <?php

                                            $end = Carbon::parse($content->publishedat);
                                            $start = Carbon::parse(Carbon::now());
                                            $dif = $start->diffInDays($end);

                                            ?>

                                            {{ $dif }} Days

                                        </td>


                                        <td>
                                            &nbsp;

                                            @if ($content->status == 5)
                                                <a href="{{ route('contentpublished', $content->id) }}"
                                                    class="btn btn-primary"> <i style="color:#fff"
                                                        class="fas fa-eye"></i>&nbsp;</a>
                                            @endif





                                        </td>



                                    </tr>
                                @endforeach
                        </table>
                    </div>



                </div>
            </div>
        @else


        <h2 style="text-align: center; padding:20%">You have no  published content!</h2>

        @endif

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection
