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


                            </div>


                            {{--
                            <div class="row">


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
                                        <td colspan="2"> <i>Each attached file should not exceed 6MB, and should be
                                                Image, Word, PDF, PPT, MP4 or MP3</i> </td>
                                    </tr>

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
