@extends('layouts.app')
@section('content')
    <!-- Page Title -->
    <section class="page-title">
        <div class="auto-container">
            <h1>Resources</h1>

            <!-- Search Boxed -->
            <div class="search-boxed">
                <div class="search-box">
                    <form method="get" action="{{ route('search') }}">
                        <div class="form-group">
                            <input type="search" id="search-input" name="search-field" value=""
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
    <section class="intro-section">
        <div class="patern-layer-one paroller" data-paroller-factor="0.40" data-paroller-factor-lg="0.20"
            data-paroller-type="foreground" data-paroller-direction="vertical"
            style="background-image: url(images/icons/icon-1.png)"></div>
        <div class="patern-layer-two paroller" data-paroller-factor="0.40" data-paroller-factor-lg="-0.20"
            data-paroller-type="foreground" data-paroller-direction="vertical"
            style="background-image: url(images/icons/icon-2.png)"></div>
        <div class="circle-one"></div>
        <div class="auto-container">
            <div class="sec-title">
                <h2>Contents</h2>
            </div>

            <div class="inner-container">
                <div class="row clearfix">

                    <!-- Content Column -->
                    <div class="content-column col">
                        <div class="inner-column">

                            <!-- Intro Info Tabs-->
                            <div class="intro-info-tabs">
                                <!-- Intro Tabs-->
                                <div class="intro-tabs tabs-box">

                                    <!--Tab Btns-->
                                    <ul class="tab-btns tab-buttons clearfix">
                                        <li data-tab="#prod-overview" class="tab-btn active-btn"><span
                                                class="icon flaticon-grid"></span></li>
                                        <li data-tab="#prod-curriculum" class="tab-btn"><span class="icon flaticon-list-1">
                                        </li>

                                    </ul>

                                    <!--Tabs Container-->
                                    <div class="tabs-content">

                                        <!--Tab / Active Tab-->
                                        <div class="tab active-tab" id="prod-overview">
                                            <div class="content">

                                                <!-- Cource Overview -->
                                                <div class="course-overview">
                                                    <div class="our-courses">

                                                        <!-- Options View -->


                                                        <div class="row clearfix">

                                                            <!-- Cource Block Two -->
                                                            @foreach ($course as $item1)
                                                                <div class="cource-block-two col-lg-4 col-md-6 col-sm-12">
                                                                    <div class="inner-box">
                                                                        <div class="image py-2">
                                                                            @php
                                                                                $extension = pathinfo(
                                                                                    $item1->cover,
                                                                                    PATHINFO_EXTENSION,
                                                                                );
                                                                            @endphp




                                                                            <a href="{{ route('coursedesc', $item1->id) }}">
                                                                                @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                                                                    <img src="{{ asset('/attachments/' . $item1->cover) }}" alt="Image Preview"
                                                                                        style="width: 100%; max-height: 180px;">
                                                                                @else
                                                                                    <img src="https://via.placeholder.com/370x253" alt="Image Preview"
                                                                                        style="width: 100%; max-height: 180px;">
                                                                                @endif
                                                                            </a>

                                                                        </div>
                                                                        <div class="lower-content">
                                                                            <h5><a
                                                                                    href="/coursedescription/{{ $item1->id }}">{{ Illuminate\Support\Str::limit($item1->title, 25, '...') }}</a>
                                                                            </h5>
                                                                            <div class="text">
                                                                                {{ Illuminate\Support\Str::limit($item1->introduction, 150, '...') }}
                                                                            </div>
                                                                            {{-- <div class="clearfix">
                                                                                <div class="pull-left">
                                                                                    <div class="students">12 Lecturer</div>
                                                                                </div>
                                                                                <div class="pull-right">
                                                                                    <div class="hours">54 Hours</div>
                                                                                </div>
                                                                            </div> --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach



                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <!-- Tab -->
                                        <div class="tab" id="prod-curriculum">
                                            <div class="content">

                                                <div class="our-courses">

                                                    @foreach ($course as $item2)
                                                        <div class="cource-block-three">
                                                            <div class="inner-box">
                                                                <div class="image">
                                                                    @php
                                                                        $extension = pathinfo(
                                                                            $item2->cover,
                                                                            PATHINFO_EXTENSION,
                                                                        );
                                                                    @endphp


                                                                    <a href="{{ route('coursedesc', $item2->id) }}">
                                                                        @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                                                            <img src="{{ asset('/attachments/' . $item2->cover) }}"
                                                                                alt="Image Preview"
                                                                                style="max-width:270px;">
                                                                        @else
                                                                            <img src="https://via.placeholder.com/370x253"
                                                                                alt="" style="max-width:270px;" />
                                                                        @endif
                                                                    </a>
                                                                </div>
                                                                <div class="content-box">
                                                                    <div class="box-inner">
                                                                        <h5><a
                                                                                href="/coursedescription/{{ $item2->id }}">{{ Illuminate\Support\Str::limit($item2->title, 50, '...') }}</a>
                                                                        </h5>
                                                                        <div class="text">
                                                                            {{ Illuminate\Support\Str::limit($item2->introduction, 250, '...') }}
                                                                        </div>
                                                                        <div class="clearfix">
                                                                            <div class="pull-left">
                                                                                <div class="level-box">
                                                                                    <span
                                                                                        class="icon flaticon-settings-1"></span>
                                                                                    Advance Level
                                                                                </div>
                                                                            </div>
                                                                            <div class="pull-right clearfix">
                                                                                <div class="students">12 Lecturer</div>
                                                                                <div class="hours">54 Hours</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
            </div>

        </div>
    </section>


    <!-- Popular Courses -->
    <section class="popular-courses-section">
        <div class="auto-container">
            <div class="sec-title">
                <h2>Most Popular Resources</h2>
            </div>

            <div class="row clearfix">
                @foreach ($topcontents as $items)
                    <div class="cource-block col-lg-4 col-md-6 col-sm-12"
                        style="display: inline-block; width: 33.33%; box-sizing: border-box; padding: 10px;">
                        <div class="inner-box"
                            style="border: 1px solid #ccc; padding: 10px; height: 100%; display: flex; flex-direction: column;">

                            <div class="image">
                                @php
                                    $extension = pathinfo($items->cover, PATHINFO_EXTENSION);
                                @endphp


                                <a href="{{ route('coursedesc', $items->id) }}">
                                    @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                        <img src="{{ asset('/attachments/' . $items->cover) }}" alt="Image Preview"
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
                                        <h5><a href="{{ route('coursedesc', $items->id) }}">{{ $items->title }}</a></h5>
                                    </div>

                                </div>
                                <div class="text">
                                    {{ Illuminate\Support\Str::limit($items->introduction, 150, '...') }}
                                </div>
                                <div class="clearfix">
                                    {{-- <div class="pull-left">
                                        <div class="students">125 Student</div>
                                    </div> --}}
                                    <div class="pull-right">
                                        <a href="{{ route('coursedesc', $items->id) }}" class="enroll">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>
    <!-- End Popular Courses -->
@endsection
