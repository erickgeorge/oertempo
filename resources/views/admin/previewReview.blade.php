@extends('layouts.admin')

@section('content')
    <?php use Carbon\Carbon; ?>

    <div class="row justify-content-center">


        <div class="col">
            <div class="card ">
                <div class="py-3">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                </div>


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <h3>Course Content Preview</h3>


                        </div>

                        <div class="card-body">

                            <div class="row">




                                <div class="col form-group">
                                    <b for="name">Content Title:</b>
                                    {{ $content->title }}
                                </div>

                            </div>



                            <div class="row">


                                <div class="col form-group">
                                    <b for="name">Creator:</b> {{ $content['creator']->name }}
                                </div>

                                <div class="col form-group">
                                    <b for="name">Created at:
                                    </b>{{ Carbon::parse($content->created_at)->format('d F Y H:i:s') }}
                                </div>

                            </div>


                        </div>
                    </div>
                    <br>

                </div>






                <div class="col-md-12">



                    <div class="card">

                        <div class="card-body">




                            <div class="row">
                                <div class="col form-group">
                                    <b for="name">Description: </b>{!! $content->description !!}
                                </div>

                            </div>



                            <div class="row">


                                <div class="col form-group">
                                    <b for="name">Category: </b> {{ $content->category }}


                                </div>


                                <div class="col form-group">
                                    <b for="name">Department: </b> {{ $content->department }}


                                </div>

                            </div>




                            <div class="row">


                                 @php
                                    $extension = pathinfo($content->attachement, PATHINFO_EXTENSION);
                                @endphp

                                @if (in_array($extension, ['pdf', 'doc', 'epub']))
                                    <embed src="{{ asset('/attachments/' . $content->attachement) }}" width="500"
                                        height="600" type="application/{{ $extension }}">
                                @elseif (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                    <img src="{{ asset('/attachments/' . $content->attachement) }}" alt="Image Preview">
                                @elseif (in_array($extension, ['mp4', 'avi', 'mov']))
                                    <video src="{{ asset('/attachments/' . $content->attachement) }}" width="500"
                                        height="400" controls></video>
                                @elseif (in_array($extension, ['mp3', 'wav']))
                                    <audio src="{{ asset('/attachments/' . $content->attachement) }}" controls></audio>
                                @elseif ($extension === 'link')
                                    <a href="{{ $content->attachement }}" target="_blank">Open Link</a>
                                @else
                                    <p>Unsupported file type</p>
                                @endif




                            </div>

                            <br>

                            <button type="submit" class="btn btn-warning btn-validating">
                                <i class="fa fa-caret-right fa-fw"></i>
                                <span lang_id="">Approve</span>
                            </button>

                            <button type="submit" class="btn btn-success btn-validating">
                                <i class="fa fa-save fa-fw"></i>
                                <span lang_id="btn_proceed">Reject</span>
                            </button>


                            </form>

                            <br>
                        </div>



                    </div>

                    <br>


                </div>






            </div>



        </div>



    </div>
@endsection
