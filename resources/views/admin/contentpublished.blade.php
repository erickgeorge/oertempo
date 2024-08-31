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


                </div>


                <div class="col-md-12">
                    <div class="card">




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


                             @if($content->qa != '')
                             <tr>
                                 <td>Assigned Quality Assuarance</td>
                                 <th>{{ $content['qualityassuarance']->name }}</th>

                             </tr>
                           @endif
                            </tbody>

                        </table>










                    </div>
                    <br>

                </div>






                <div class="col-md-12">



                    <div class="card">

                        <div class="card-body">




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

                            <table class="table table-bordered table-striped" cellspacing="0">


                                <tbody>
                                    <tr>
                                        <td style="width: 25%">Approved By</td>
                                        <th>{{ $content['approve']->name }}</th>

                                    </tr>
                                    <tr>
                                        <td>Approved On</td>
                                        <th>{{ Carbon::parse($content->publishedat)->format('d F Y') }}</th>
                                    </tr>
                                    <tr>
                                        <td>Days Since Published</td>
                                        <th> <?php

                                        $end = Carbon::parse($content->publishedat);
                                        $start = Carbon::parse(Carbon::now());
                                        $dif = $start->diffInDays($end);

                                        ?>

                                            {{ $dif }} Days</th>

                                    </tr>
                                </tbody>

                            </table>


                            <br>




                        </div>



                    </div>

                    <br>


                </div>






            </div>



        </div>



    </div>
@endsection
