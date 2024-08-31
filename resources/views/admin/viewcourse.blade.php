@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <h4 class="col">{{ $course->title }}</h4>

                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>
                            {!! nl2br(e($course->introduction)) !!}
                        </p>
                        @if ($course->attachment)
                            <a class="btn btn-secondary text-light" href="{{ asset('attachments/' . $course->attachment) }}"
                                target="_blank">
                                <i class="fa fa-download" aria-hidden="true"></i> <i class="fa fa-file"></i> Download
                                Attachment 1
                            </a> <br> <br>
                        @endif
                        @if ($course->attachment1)
                            <a class="btn btn-secondary text-light"
                                href="{{ asset('attachments/' . $course->attachment1) }}" target="_blank">
                                <i class="fa fa-download" aria-hidden="true"></i> <i class="fa fa-file"></i> Download
                                Attachment 2
                            </a> <br> <br>
                        @endif
                        @if ($course->attachment2)
                            <a class="btn btn-secondary text-light"
                                href="{{ asset('attachments/' . $course->attachment2) }}" target="_blank">
                                <i class="fa fa-download" aria-hidden="true"></i> <i class="fa fa-file"></i> Download
                                Attachment 3
                            </a> <br> <br>
                        @endif
                        @if ($course->attachment3)
                            <a class="btn btn-secondary text-light"
                                href="{{ asset('attachments/' . $course->attachment3) }}" target="_blank">
                                <i class="fa fa-download" aria-hidden="true"></i> <i class="fa fa-file"></i> Download
                                Attachment 4
                            </a> <br> <br>
                        @endif
                        <p>
                            {!! nl2br(e($course->paragraph)) !!}
                        </p>

                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-1">
                                <a href="{{ route('editcourse', $course->id) }}" class="btn btn-primary">Edit</a>
                            </div>
                            <div class="col-md-1">
                                <a class="btn btn-danger" href="">Delete</a>
                            </div>
                            <div class="col-md-1">
                                <a class="btn  btn-warning" href="{{ route('courses') }}">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
