@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row py-3">
                            <h4 class="col">{{ __('Update Content') }}</h4>

                        </div>
                    </div>

                    <div class="card-body py-3">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('updatecourse') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="text" value="{{ $course->id }}" name="id" hidden>
                            <div class="form-group">
                                <label for="">Content Title</label>
                                <input type="text" name="name" value="{{ $course->title }}" id=""
                                    class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="">Introduction</label>
                                <textarea type="text" name="intro" rows="12" id="" class="form-control" placeholder=""
                                    aria-describedby="helpId">{{ $course->introduction }}</textarea>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="">Attachment 1</label>
                                <input type="file" name="attach1" id="" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="">Attachment 2</label>
                                <input type="file" name="attach2" id="" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="">Attachment 3</label>
                                <input type="file" name="attach3" id="" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="">Attachment 4</label>
                                <input type="file" name="attach4" id="" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="">Paragraph/Description/Details</label>
                                <textarea type="text" name="description" rows="12" id="" class="form-control" placeholder=""
                                    aria-describedby="helpId">{!! $course->paragraph !!}</textarea>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                                <div class="col-md-2">
                                    <a href="{{ route('courses') }}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
