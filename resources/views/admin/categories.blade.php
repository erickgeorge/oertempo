@extends('layouts.admin')

@section('content')
    <div class="">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('Categories') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show mb-1" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <!-- Custom CSS -->


                        <div class="container ">
                            <h3>Register Category</h3>
                            <form method="post" action="{{ route('submit-category') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group col-lg-8">
                                    <label for="name" class="category-label"><b>Name:</b></label>
                                    <input type="text" class="form-control category-input" id="name" name="name"
                                        placeholder="Enter category name">
                                </div>
                                <div class="form-group col-lg-8">
                                    <label for="description" class="category-label"><b>Description:</b></label>
                                    <input type="text" class="form-control category-input" id="description"
                                        name="description" placeholder="Enter category description">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>



                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Categories</h5>
                        <p class="card-text">
                            @foreach ($category as $cats)
                                <button title="{{ $cats->description }}"
                                    class="btn badge-pill btn-primary">{{ $cats->name }}</button>
                            @endforeach
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
