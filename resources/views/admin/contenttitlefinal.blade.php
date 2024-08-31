@extends('layouts.admin')

@section('content')
    <?php use Carbon\Carbon; ?>

    <div class="row justify-content-center">





        <div class="col">
            <div class="card container">
                <div class="py-3">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif







                    {{--
                                    <div class="card shadow mb-1" >

                                        <div class="card-body">


                                            <h4 class="small font-weight-bold">Content Title <span
                                                    class="float-right">20%</span></h4>
                                            <div class="progress mb-4">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                                                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>

                                            <button class="btn btn-warning btn-validating"><i class="fa fa-caret-right fa-fw"></i>
                                                <span lang_id="btn_proceed">Proceed</span>
                                            </button>



                                            <h4 class="small font-weight-bold">Sales Tracking <span
                                                    class="float-right">40%</span></h4>
                                            <div class="progress mb-4">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <h4 class="small font-weight-bold">Content Title <span
                                                    class="float-right">60%</span></h4>
                                            <div class="progress mb-4">
                                                <div class="progress-bar" role="progressbar" style="width: 60%"
                                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <h4 class="small font-weight-bold">Payout Details <span
                                                    class="float-right">80%</span></h4>
                                            <div class="progress mb-4">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <h4 class="small font-weight-bold">Account Setup <span
                                                    class="float-right">Complete!</span></h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>



                                    </div> --}}








                </div>


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">




                            <div class="card shadow mb-1">
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Preview Details <span
                                            class="float-right">Complete!</span>
                                    </h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                </div>
                            </div>


                        </div>

                        <div class="card-body">





                            <table class="table table-bordered table-striped" cellspacing="0">


                                <tbody>
                                    <tr>
                                        <td style="width: 25%">Content Title</td>
                                        <th>{{ $content->title }}</th>

                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <th>{!! $content->description !!}</th>

                                    </tr>
                                    <tr>
                                        <td>Category</td>
                                        <th>{{ $content['categ']->name }}</th>

                                    </tr>
                                </tbody>

                            </table>









                        </div>
                    </div>
                    <br>

                </div>






                <div class="col-md-12">



                    <div class="card">

                        <div class="card-body">

                            <form action="{{ route('savecontentfour', [$content->id]) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf



                                <table class="table table-bordered table-striped" cellspacing="0">


                                    <tbody>
                                        <tr>
                                            <th style="width: 25%">Attachment Description</th>
                                            <th>Attached File</th>

                                        </tr>


                                        @foreach ($attach as $attachment)
                                            <tr>
                                                <td>{{ $attachment->description }} </td>
                                                <th> @php
                                                    $extension = pathinfo($attachment->image, PATHINFO_EXTENSION);
                                                @endphp

                                                    @if (in_array($extension, ['pdf', 'doc', 'epub']))
                                                        <embed src="{{ asset('/attachments/' . $attachment->image) }}"
                                                            width="500" height="600"
                                                            type="application/{{ $extension }}">
                                                    @elseif (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                                        <img src="{{ asset('/attachments/' . $attachment->image) }}"
                                                            alt="Image Preview" width="50%" height="20%">
                                                    @elseif (in_array($extension, ['mp4', 'avi', 'mov']))
                                                        <video src="{{ asset('/attachments/' . $attachment->image) }}"
                                                            width="500" height="400" controls></video>
                                                    @elseif (in_array($extension, ['mp3', 'wav']))
                                                        <audio src="{{ asset('/attachments/' . $attachment->image) }}"
                                                            controls></audio>
                                                    @elseif ($extension === 'link')
                                                        <a href="{{ $attachment->image }}" target="_blank">Open Link</a>
                                                    @else
                                                        <p>Unsupported file type</p>
                                                    @endif
                                                </th>

                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>






                                <br>

                                <button  onclick="return confirm('You are about to submit your content to resource manager.')" type="submit" class="btn btn-warning btn-validating">
                                    <i class="fa fa-caret-right fa-fw"></i>
                                    <span lang_id="btn_proceed">Submit</span>
                                </button>

                                {{-- <button type="submit" class="btn btn-success btn-validating">
                                    <i class="fa fa-save fa-fw"></i>
                                    <span lang_id="btn_proceed">Save</span>
                                </button> --}}



                                <a class="btn btn-primary btn-validating"
                                    onclick="return confirm('Are you sure you want to delete this content?')"
                                    href="{{ route('deletecontent', [$content->id]) }}" title="Delete"> <i
                                        class="fas fa-times"></i>

                                    <span lang_id="btn_proceed">Delete</span> </a>





                                <a class="btn btn-secondary btn-validatin"
                                    href="{{ route('back_content3', [$content->id]) }}" title="Back"> <i
                                        class="fa fa-reply fa-fw"></i>

                                    <span lang_id="btn_proceed">Back</span> </a>


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
