@extends('layouts.admin')

@section('content')
    <?php use Carbon\Carbon; ?>

    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold">Contents Under Review</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Content Number</th>
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
                                    <td>OER-0000{{ $content->id }}</td>
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

                                        <?php $start = new DateTime($content->created_at);
                                        $end = Carbon::now();
                                        $interval = $start->diff($end); ?>

                                        {{ $interval->days }}

                                    </td>


                                    <td>
                                        &nbsp;


                                        <a href="{{ route('reviewcontent', $content->id) }}" class="btn btn-primary"> <i
                                                style="color:#fff" class="fas fa-eye"></i>&nbsp;</a>

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
