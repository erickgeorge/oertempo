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
    <section class="intro-section">
        <div class="patern-layer-one paroller" data-paroller-factor="0.40" data-paroller-factor-lg="0.20"
            data-paroller-type="foreground" data-paroller-direction="vertical"></div>
        <div class="patern-layer-two paroller" data-paroller-factor="0.40" data-paroller-factor-lg="-0.20"
            data-paroller-type="foreground" data-paroller-direction="vertical"></div>
        <div class="auto-container">
            <div class="sec-title">
                <h2>Resources</h2>
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
                                                                <div class="cource-block-two col-lg-4 col-md-6 col-sm-12"
                                                                    style="display: flex; flex-direction: column; height: 400px; padding: 10px;">
                                                                    <div class="inner-box"
                                                                        style="border: 1px solid #ccc; padding: 10px; height: 100%;">
                                                                        <div class="image py-2" style="flex: 1;">
                                                                            @php
                                                                                $extension = pathinfo($item1->cover, PATHINFO_EXTENSION);
                                                                                $imageUrl = in_array($extension, ['jpg', 'jpeg', 'png', 'gif']) ? asset('/attachments/' . $item1->cover) : 'https://via.placeholder.com/370x253';
                                                                            @endphp
                                                                            <a href="{{ route('coursedesc', $item1->id) }}">
                                                                                <img src="{{ $imageUrl }}"
                                                                                    alt="Image Preview"
                                                                                    style="width: 100%; max-height: 100%; object-fit: contain;">
                                                                            </a>
                                                                        </div>
                                                                        <div class="lower-content">
                                                                            <h5><a
                                                                                    href="/coursedescription">{{ Illuminate\Support\Str::limit($item1->title, 25, '...') }}</a>
                                                                            </h5>
                                                                            <div class="text">
                                                                                {{ Illuminate\Support\Str::limit($item1->introduction, 150, '...') }}
                                                                            </div>
                                                                            <div class="clearfix">
                                                                                <div class="pull-left">
                                                                                    <div class="students">12 Lecturer</div>
                                                                                </div>
                                                                                <div class="pull-right">
                                                                                    <div class="hours">54 Hours</div>
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
                                                                            $item2->attachement,
                                                                            PATHINFO_EXTENSION,
                                                                        );
                                                                    @endphp


                                                                    <a href="{{ route('coursedesc', $item2->id) }}">
                                                                        @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                                                            <img src="{{ asset('/attachments/' . $item2->attachement) }}"
                                                                                alt="Image Previe   w"
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
                                                                                href="course-detail.html">{{ Illuminate\Support\Str::limit($item1->title, 50, '...') }}</a>
                                                                        </h5>
                                                                        <div class="text">
                                                                            {{ Illuminate\Support\Str::limit($item1->introduction, 250, '...') }}
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


    <!-- End Popular Courses -->
@endsection
