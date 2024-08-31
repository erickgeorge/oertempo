@extends('layouts.app')

@section('content')
    <!-- Page Title -->
    <section class="page-title">
        <div class="auto-container">
            <h1>Resources Topics</h1>

            <!-- Search Boxed -->
            <div class="search-boxed">
                <div class="search-box">
                    <form method="get" action="{{ route('search') }}">
                        <div class="form-group">
                            <input type="search" name="search-field" value="" placeholder="What do you want to learn?"
                                required>
                            <button type="submit"><span class="icon fa fa-search"></span></button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
    <!--End Page Title-->

    <!-- Topics Courses -->
    <section class="topics-section">
        <div class="patern-layer-one paroller" data-paroller-factor="0.40" data-paroller-factor-lg="0.20"
            data-paroller-type="foreground" data-paroller-direction="vertical"
            style="background-image: url(images/icons/icon-1.png)"></div>
        <div class="patern-layer-two paroller" data-paroller-factor="0.40" data-paroller-factor-lg="-0.20"
            data-paroller-type="foreground" data-paroller-direction="vertical"
            style="background-image: url(images/icons/icon-2.png)"></div>
        <div class="auto-container">
            <div class="sec-title centered">
                <h2>Choose a topic</h2>
                <div class="text">OER offers Resources and materials related to a wide range of collections. Below
                    are some categories available for you to explore:</div>
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
                                <div class="pull-right">
                                    <div class="hours">54 Hours</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Topic Block -->

            </div>



        </div>
    </section>
    <!-- End Topics Courses -->
    <hr>
    <!-- Popular Courses -->
    <section class="popular-courses-section">
        <div class="auto-container">
            <div class="sec-title centered">
                <br>
                <h2>Popular Courses</h2>
                <div class="text">Free Contents with interactive Resources from University of Dar es Salaam Open Education
                    Resources.</div>
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
                <!-- Cource Block -->


            </div>
        </div>
    </section>
    <!-- End Popular Courses -->
@endsection
