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
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">My Drafts</h6>

                </div>


                <div class="card-body">


                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Content Name</th>
                                    <th>Creator</th>
                                    <th>Stages</th>
                                    <th>Created At</th>
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
                                        <td>
                                            @if ($content->status == 1)
                                                1/4
                                            @endif
                                            @if ($content->status == 2)
                                                2/4
                                            @endif
                                            @if ($content->status == 3)
                                                3/4
                                            @endif
                                            @if ($content->status == 4)
                                                4/4
                                            @endif
                                        </td>
                                        <td>{{ Carbon::parse($content->created_at)->format('d F Y H:i:s') }}</td>
                                        <td>

                                            <?php

                                            $end = Carbon::parse($content->created_at);
                                            $start = Carbon::parse(Carbon::now());
                                            $dif = $start->diffInDays($end);

                                            ?>

                                            {{ $dif }} Days

                                        </td>


                                        <td>

                                            &nbsp;

                                            @if ($content->status == 1)
                                                <a href="{{ route('content_title', $content->id) }}"
                                                    class="btn btn-primary"> <i style="color:#fff"
                                                        class="fas fa-eye"></i>&nbsp;</a>
                                            @endif
                                            @if ($content->status == 2)
                                                <a href="{{ route('content_titleone', $content->id) }}"
                                                    class="btn btn-primary">
                                                    <i style="color:#fff" class="fas fa-eye"></i>&nbsp;</a>
                                            @endif
                                            @if ($content->status == 3)
                                                <a href="{{ route('content_titlefinal', $content->id) }}"
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


        <h2 style="text-align: center; padding:20%">You have no created content!</h2>

        @endif


    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection
