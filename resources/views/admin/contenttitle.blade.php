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
                                    <h4 class="small font-weight-bold">Prepare Content Category and Description
                                        <span class="float-right">40%</span>
                                    </h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                </div>
                            </div>


                        </div>

                        <div class="card-body">



                            <table class="table table-bordered" cellspacing="0">
                                <thead>
                                    <tr>

                                        <th style="width: 25%">Content Title</th>
                                        <th><b>{{ $content->title }}</b></th>

                                    </tr>

                                    <tr>

                                        <th style="width: 25%">Image Cover</th>
                                        <th>
                                            @php
                                            $extension = pathinfo($content->cover, PATHINFO_EXTENSION);
                                        @endphp



                                        @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                            <img src="{{ asset('/attachments/' . $content->cover) }}"
                                                alt="Image Preview" width="50%" height="20%">

                                        @endif
                                        </th>

                                    </tr>
                                </thead>


                            </table>



                            {{-- <div class="row">


                                <div class="col form-group">
                                    <label for="name">Creator</label>
                                    <input disabled type="text" name="name" required class="form-control"
                                        id="name" aria-describedby="nameHelp" value="{{ $content['creator']->name }}">
                                </div>

                                <div class="col form-group">
                                    <label for="name">Created at</label>
                                    <input disabled type="text" name="client" required class="form-control"
                                        id="name" aria-describedby="nameHelp"
                                        placeholder="{{ Carbon::parse($content->created_at)->format('d F Y H:i:s') }}">
                                </div>

                            </div> --}}


                        </div>
                    </div>
                    <br>

                </div>



                <script src="{{ asset('tinymce/tinymce/js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>

                <script>
                    tinymce.init({
                        selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE

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



                <div class="col-md-12">



                    <div class="card">

                        <div class="card-body">

                            <form action="{{ route('savecontenttwo', [$content->id]) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf


                                <div class="row">
                                    <div class="col form-group">
                                        <label for="name">Description</label>

                                        <textarea id="myeditorinstance" required class="form-control" name="description"></textarea>
                                    </div>

                                </div>





                                <div class="row">
                                    <div class="col form-group">
                                        <label for="name">Category</label>

                                        <select name="category" class="form-control" required>
                                            <option value="">Select Category</option>
                                            @foreach ($category as $categ)
                                                <option value="{{ $categ->id }}">{{ $categ->name }}</option>
                                            @endforeach
                                        </select>


                                    </div>
                                </div>








                                {{-- <div class="row">
                                        <div class="col form-group">
                                            <label for="files"><small>You Can Select More Than One Attachement</label>
                                                <br>
                                                <input class="form-control" type="file" name="attach">
                                        </div>

                                    </div> --}}



                                <button type="submit" class="btn btn-warning btn-validating">
                                    <i class="fa fa-caret-right fa-fw"></i>
                                    <span lang_id="btn_proceed">Next</span>
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
                                    href="{{ route('back_content1', [$content->id]) }}" title="Back"> <i
                                        class="fa fa-reply fa-fw"></i>

                                    <span lang_id="btn_proceed">Back</span> </a>


                            </form>

                            <form>
                            </form>


                        </div>



                    </div>

                    <br>


                </div>






            </div>



        </div>



    </div>
@endsection
