@extends('layouts.main')

@section('content')
    <!-- Banner Section -->
    <section class="page-title" style="background-image: url('{{ asset('image458.png') }}'); background-position:center;    ">
        <div class="auto-container">
            <div class="content-boxed">
                <br> <br>
                <div class="inner-column">
                    <!-- <h2 class="text-warning">Discover courses, materials, & teaching resources</h2> -->
                    <br>
                    <div class="buttons-box">
                        <a href="#category" class="theme-btn btn-style-one"><span class="txt">Get Stared <i
                                    class="fa fa-angle-right"></i></span></a>
                        <a href="/courses" class="theme-btn btn-style-two"><span class="txt">All Resources <i
                                    class="fa fa-angle-right"></i></span></a>
                    </div>
                </div>
            </div>

            <!-- Search Boxed -->
            <div class="search-boxed">
                <div class="search-box">
                    <form method="get" action="{{ route('search') }}">
                        <div class="form-group">
                            <input id="search-input" type="search" name="search-field" value=""
                                placeholder="What do you want to learn?" required>
                            <button type="submit" id="clear-button" class="clear">X</button>
                            <button type="submit" class="search"><span class="icon fa fa-search"></span></button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
    <!--End Page Title-->

    <!-- Topics Courses -->
    <section class="topics-section" id="category">
        <div class="auto-container">
            <div class="sec-title centered">
                <h2>Choose a Category</h2>
                <div class="text">OER offers resources and materials related to a wide range of collections. Below
                    are some categories available for you to explore:
                </div>
            </div>
            <div class="row clearfix">

                <!-- Topic Block -->
                @foreach ($category as $category)
                    <div class="topic-block col-lg-3 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="icon-box">
                                <a href="{{ route('categoryContents', $category->id) }}" class="overlay-link"></a>
                                <span class="icon flaticon-file"></span>
                            </div>
                            <h5><a href="{{ route('categoryContents', $category->id) }}">{{ ucwords($category->name) }}</a>
                            </h5>
                            <hr>
                            <div class="clearfix">
                                <div class="pull-left">
                                    <div class="lectures">{{ $categoryCounts[$category->id] }} Resources</div>
                                </div>
                                {{-- <div class="pull-right">
                                    <div class="hours">54 Hours</div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>

            <div class="btn-box text-center">
                <a href="{{ route('categoriesView') }}" class="theme-btn btn-style-three"><span class="txt">See All
                        Categories <i class="fa fa-angle-right"></i></span></a>
            </div>

        </div>
    </section>
    <!-- End Banner Section -->
    <section class="courses-section">
        <div class="auto-container">
            <div class="sec-title centered">
                <h2>Our top Resources</h2>
                <div class="text">Free Contents with interactive resources from University of Dar es Salaam Open Education
                    Resources.
                </div>
            </div>
            <div class="row clearfix">

                @foreach ($course as $item)
                    <div class="cource-block col-lg-4 col-md-6 col-sm-12"
                        style="display: inline-block; width: 33.33%; box-sizing: border-box; padding: 10px;">
                        <div class="inner-box"
                            style="border: 1px solid #ccc; padding: 10px; height: 100%; display: flex; flex-direction: column;">

                            <div class="image">
                                @php
                                    $extension = pathinfo($item->cover, PATHINFO_EXTENSION);
                                @endphp


                                <a href="{{ route('coursedesc', $item->id) }}">
                                    @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                        <img src="{{ asset('/attachments/' . $item->cover) }}" alt="Image Preview"
                                            style="width: 100%; max-height: 180px;">
                                    @else
                                        <img src="https://via.placeholder.com/370x253" alt="Image Preview"
                                            style="width: 100%; max-height: 180px;">
                                    @endif
                                </a>
                            </div>
                            <div class="lower-content">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <h5><a href="{{ route('coursedesc', $item->id) }}">{{ $item->title }}</a></h5>
                                    </div>

                                </div>
                                <div class="text">
                                    {{ Illuminate\Support\Str::limit($item->introduction, 150, '...') }}
                                </div>
                                <div class="clearfix">
                                    {{-- <div class="pull-left">
                                        <div class="students">125 Student</div>
                                    </div> --}}
                                    <div class="pull-right">
                                        <a href="{{ route('coursedesc', $item->id) }}" class="enroll">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="btn-box text-center">
                <a href="{{ route('courses') }}" class="theme-btn btn-style-three"><span class="txt">See All Resources
                        <i class="fa fa-angle-right"></i></span></a>
            </div>
        </div>
    </section>
@endsection
