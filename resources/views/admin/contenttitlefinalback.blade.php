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
                        <div class="card-header">

                            <div class="card shadow mb-1">
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Prepare Attachments <span
                                            class="float-right">80%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                </div>
                            </div>


                        </div>

                        <div class="card-body">

                            <div class="row">

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



                                <table class="table table-bordered table-striped" cellspacing="0">


                                    <tbody>
                                        <tr>
                                            <th style="width: 25%">Attachment Description</th>
                                            <th>Attached File</th>
                                            <th>Action</th>


                                        </tr>


                                        @foreach ($attach as $attachment)
                                            <tr>
                                                <td>{{ $attachment->description }} </td>
                                                <th> @php
                                                    $extension = pathinfo($attachment->image, PATHINFO_EXTENSION);
                                                @endphp

                                                    @if (in_array($extension, ['pdf', 'doc', 'epub']))
                                                        <embed src="{{ asset('/attachments/' . $attachment->image) }}"
                                                            width="500" height="200"
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
                                                <td> <a class="btn btn-danger btn-validating"
                                                        onclick="return confirm('Are you sure you want to delete this attachment?')"
                                                        href="{{ route('deleteattachment', [$attachment->id]) }}"
                                                        title="Delete"> <i class="fas fa-trash"></i>

                                                    </a></td>

                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>


                            </div>

                        </div>
                    </div>
                    <br>

                </div>



                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('savecontentthree', [$content->id]) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                <script type="text/javascript">
                                    function addRows() {
                                        var table = document.getElementById('emptbl');
                                        var rowCount = table.rows.length;
                                        var cellCount = table.rows[0].cells.length;
                                        var row = table.insertRow(rowCount);
                                        for (var i = 0; i <= cellCount; i++) {
                                            var cell = 'cell' + i;
                                            cell = row.insertCell(i);
                                            var copycel = document.getElementById('col' + i).innerHTML;
                                            cell.innerHTML = copycel;
                                            if (i == 3) {
                                                var radioinput = document.getElementById('col3').getElementsByTagName('input');
                                                for (var j = 0; j <= radioinput.length; j++) {
                                                    if (radioinput[j].type == 'radio') {
                                                        var rownum = rowCount;
                                                        radioinput[j].name = 'gender[' + rownum + ']';
                                                    }
                                                }
                                            }
                                        }
                                    }

                                    function deleteRows() {
                                        var table = document.getElementById('emptbl');
                                        var rowCount = table.rows.length;
                                        if (rowCount > '2') {
                                            var row = table.deleteRow(rowCount - 1);
                                            rowCount--;
                                        } else {
                                            alert('There should be atleast one row');
                                        }
                                    }
                                </script>



                                <table id="emptbl" style="width: 100%">
                                    <tr>
                                        <th style="width:50%">Attach File</th>
                                        <th style="width:50%">Description</th>

                                    </tr>
                                    <tr>
                                        <td id="col0"><input class="form-control" type="file" name="attach[]"
                                                multiple required /></td>
                                        <td id="col1"><input placeholder="Enter Description" class="form-control"
                                                type="text" name="description[]" required></td>

                                    </tr>
                                </table>


                                <table>
                                    <tr>
                                        <td><input class="form-control btn btn-primary" type="button" value="Add"
                                                onclick="addRows()" /></td>
                                        <td><input class="form-control btn btn-danger" type="button" value="Delete"
                                                onclick="deleteRows()" /></td>

                                    </tr>
                                </table>

                                <br>
                                <button type="submit" class="btn btn-warning btn-validating">
                                    <i class="fa fa-caret-right fa-fw"></i>
                                    <span lang_id="btn_proceed">Submit</span>
                                </button>

                                <a class="btn btn-primary btn-validating"
                                    onclick="return confirm('Are you sure you want to delete this content?')"
                                    href="{{ route('deletecontent', [$content->id]) }}" title="Delete"> <i
                                        class="fas fa-times"></i>

                                    <span lang_id="btn_proceed">Delete</span> </a>


                                <a class="btn btn-secondary btn-validatin"
                                    href="{{ route('back_content2', [$content->id]) }}" title="Back"> <i
                                        class="fa fa-reply fa-fw"></i>

                                    <span lang_id="btn_proceed">Back</span> </a>
                            </form>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection
