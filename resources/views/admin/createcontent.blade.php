@extends('layouts.admin')

@section('content')
    <div class="container">


    </div>

    <div class="row justify-content-center">





        <div class="col">
            <div class="card">
                <div class="card-header  py-3">

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('savecontent') }}" method="post" enctype="multipart/form-data">
                        @csrf


                        <div class="card shadow mb-1">
                            <div class="card-body">
                                <h4 class="small font-weight-bold">Content Title <span class="float-right">20%</span></h4>
                                <div class="progress mb-4">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                            </div>
                        </div>



                </div>

                <div class="card-body py-3">



                    <div class="form-group">
                        <label for="">Content Title</label>
                        <input type="text" name="title" id="" class="form-control"
                            placeholder="Enter Content Title" aria-describedby="helpId">
                    </div>


                    <div class="form-group">
                        <label for="">Cover Image</label>
                        <input type="file" name="cover"  class="form-control"
                            aria-describedby="helpId">
                    </div>


                    <br>
                    <button type="submit" class="btn btn-warning btn-validating">
                        <i class="fa fa-caret-right fa-fw"></i>
                        <span lang_id="btn_proceed">Next</span>
                    </button>

                </div>

                </form>
            </div>
        </div>
    </div>
@endsection
