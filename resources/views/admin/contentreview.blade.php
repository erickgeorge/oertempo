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

                            @if ($content->status == 6)
                                <div class="row">
                                    <div class="col form-group">
                                        <label for="name">Reason</label>
                                        <textarea disabled class="form-control" name="description" placeholder="{{ $content->reason }}"></textarea>
                                    </div>

                                </div>
                            @endif


                            <br>


                            @if (auth()->user()->roleID == 4)
                                @if ($content->status != 6)
                                    <button data-toggle="modal" data-target=".bd-example-modal-lg-2" type="submit"
                                        class="btn btn-primary btn-validating">
                                        <i class="fa fa-caret-right fa-fw"></i>

                                        <span lang_id="btn_proceed">Assign To Quality Assuarance</span>
                                    </button>
                                @endif

                                <td style="text-align: center">
                                    <div class="modal fade bd-example-modal-lg-2" tabindex="-1" role="dialog"
                                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content container py-2">
                                                <div>


                                                    <div class="card-body">

                                                        <form method="POST"
                                                            action="{{ route('assign_content_to_qa', [$content->id]) }}">
                                                            @csrf
                                                            <input type="text" value="" name="id" hidden>
                                                            <div class="row ">
                                                                <div class="col  ">
                                                                    <div class="form-group">
                                                                        <label for="name">
                                                                            Select Quality Assuarance</label>

                                                                            <select id="user" name="qualityasuarance"
                                                                                class="form-control" required
                                                                                autofocus>
                                                                                <option value="" disabled selected>Select User</option>
                                                                                @foreach ($quality_assuarance as $qa)
                                                                                    <option value="{{ $qa->id }}">{{ $qa->name }}</option>
                                                                                @endforeach
                                                                            </select>

                                                                    </div>
                                                                </div>

                                                            </div>

                                                            {{-- class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}"> --}}
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                            &nbsp;
                                                            <a href="#" class="btn btn-danger"
                                                                data-dismiss="modal">Cancel</a>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </td>
                            @endif



                            @if (auth()->user()->roleID == 1 || auth()->user()->roleID == 3)
                                @if ($content->status != 6)
                                    <button
                                        onclick="return confirm('You are about to publish this content after your review.')"
                                        type="submit" class="btn btn-primary btn-validating">
                                        <i class="fa fa-caret-right fa-fw"></i>
                                        <a href="{{ route('approve_content', [$content->id]) }}" style="color: white"><span
                                                lang_id="btn_proceed">Approve</span></a>
                                    </button>

                                    <button data-toggle="modal" data-target=".bd-example-modal-lg-1" type="submit"
                                        class="btn btn-danger btn-validating">
                                        <i class="fas fa-times"></i>

                                        <span lang_id="btn_proceed">Return For Revision</span>
                                    </button>
                                @endif
                            @endif

                            <td style="text-align: center">
                                <div class="modal fade bd-example-modal-lg-1" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content container py-2">
                                            <div>


                                                <div class="card-body">
                                                    <script src="{{ asset('tinymce/tinymce/js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>

                                                    <script>
                                                        tinymce.init({
                                                            selector: 'textarea#myeditorinstance2', // Replace this CSS selector to match the placeholder element for TinyMCE

                                                            plugins: [
                                                                "a11ychecker advcode casechange formatpainter",
                                                                "linkchecker autolink lists checklist",
                                                                "media mediaembed pageembed permanentpen",
                                                                "powerpaste table advtable tinymcespellchecker"
                                                            ],
                                                            license_key: 'gpl',
                                                            toolbar: "formatselect | fontselect | bold italic strikethrough forecolor backcolor formatpainter | alignleft aligncenter alignright alignjustify | numlist bullist outdent indent | link insertfile image | removeformat | code | addcomment | checklist | casechange",

                                                        });
                                                    </script>
                                                    <form method="POST"
                                                        action="{{ route('reject_content', [$content->id]) }}">
                                                        @csrf
                                                        <input type="text" value="" name="id" hidden>
                                                        <div class="row ">
                                                            <div class="col  ">
                                                                <div class="form-group">
                                                                    <label for="name">
                                                                        Reason</label>
                                                                    <textarea type="text" id="myeditorinstance2" name="reason" required class="form-control" id="name"
                                                                        aria-describedby="nameHelp" placeholder="Enter Rejection Reason"></textarea>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        {{-- class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}"> --}}
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                        &nbsp;
                                                        <a href="#" class="btn btn-danger"
                                                            data-dismiss="modal">Cancel</a>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </td>

                                <br>
                        </div>



                    </div>

                    <br>


                </div>






            </div>



        </div>



    </div>
@endsection
