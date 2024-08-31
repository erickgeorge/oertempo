@extends('layouts.app')

@section('content')
@section('title')
    Description
@endsection






<!-- Page Title -->
<section class="page-title">
    <div class="auto-container">
        <h1>Resource Description</h1>


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
<!-- Intro Courses -->
<section class="intro-section">
    <div class="patern-layer-one paroller" data-paroller-factor="0.40" data-paroller-factor-lg="0.20"
        data-paroller-type="foreground" data-paroller-direction="vertical"></div>
    <div class="patern-layer-two paroller" data-paroller-factor="0.40" data-paroller-factor-lg="-0.20"
        data-paroller-type="foreground" data-paroller-direction="vertical"></div>
    <div class="circle-one"></div>
    <div style="padding-left:50px ; padding-right: 50px;" class="auto">
        <div class="sec-title">
            <h2>{{ $course->title }}</h2>
        </div>

        <div class="inner-container">
            <div class="row clearfix">



                <!-- Video Column -->
                <div class="content-column col-lg-3 col-md-12 col-sm-12">
                    <div class="inner-column">




                        <!-- Tab -->
                        <div class="tab">
                            <div class="content">

                                <!-- Accordion Box -->
                                <ul class="accordion-box">

                                    <!-- Block -->
                                    <li class="accordion block">
                                        <div class="acc-btn active">
                                            <div class="icon-outer"><span
                                                    class="icon icon-plus flaticon-angle-arrow-down"></span></div>
                                            Downloads
                                        </div>
                                        <div class="acc-content">
                                            <div class="content">




                                                @php
                                                $x = 1;
                                            @endphp
                                           @foreach($attachment as $attach)
                                           @if ($attach->image)
                                               <a  target="_blank" href="{{ asset('attachments/' . $attach->image) }}" class="theme-btn btn-style-one"><span
                                                class="txt"><i class="fa fa-download"></i>  Attachment {{$x}}
                                                </i></span></a>
                                           @php
                                            $x++;
                                           @endphp
                                           @endif
                                           @endforeach

                                                <div class="pull-right">

                                                </div>
                                            </div>

                                        </div>
                                    </li>



                                    <!-- Block -->
                                    <li class="accordion block">
                                        <div class="acc-btn">
                                            <div class="icon-outer"><span
                                                    class="icon icon-plus flaticon-angle-arrow-down"></span></div>
                                            Resources Info
                                        </div>
                                        <div class="acc-content">
                                            <div class="content">
                                                <div class="clearfix">
                                                    <div class="pull-left">
                                                        <h6>  <div class="text">Department: {{ $course['creator']['depart']->name }}
                                                            <div class="text">Category: {{ $course['categ']->name }}
                                                        </div></h6>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </li>

                                    <!-- Block -->
                                    <li class="accordion block">
                                        <div class="acc-btn">
                                            <div class="icon-outer"><span
                                                    class="icon icon-plus flaticon-angle-arrow-down"></span></div>
                                            Instructor
                                        </div>
                                        <div class="acc-content">



                                            <!-- Student Block -->
                                            <div class="student-block">
                                                <div class="block-inner">
                                                    <div class="image">
                                                        <img src="https://via.placeholder.com/278x319" alt="" />
                                                    </div>
                                                    <h2>{{ $course['creator']->name }}</h2>

                                                    <br>

                                                    <div class="social-box">
                                                        <a href="#" class="fa fa-facebook-square"></a>
                                                        <a href="#" class="fa fa-twitter-square"></a>
                                                        <a href="#" class="fa fa-linkedin-square"></a>
                                                        <a href="#" class="fa fa-github"></a>
                                                    </div>
                                                    {{-- <a href="#" class="more">Know More <span
                                                            class="fa fa-angle-right"></span></a> --}}
                                                </div>
                                            </div>




                                        </div>
                                    </li>

                                </ul>

                            </div>
                        </div>





                    </div>
                </div>

                <!-- Video Column -->
                <div style="background:#fff" class="col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column sticky-top">



                        <!-- Cource Overview -->
                        <div class="course-overview">
                            <div class="inner-box">
                                <br>
                                <h4>Resource Description</h4>
                                <p>{!! nl2br(e($course->introduction)) !!}</p>
                                <!-- <ul class="student-list">
                                                            <li>23,564 Total Students</li>
                                                            <li><span class="theme_color">4.5</span> <span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span> (1254 Rating)</li>
                                                            <li>256 Reviews</li>
                                                        </ul> -->

                                <p>{{$course->description}} </p>
                                <p>{!! nl2br(e($course->paragraph)) !!}</p>


                                <ul class="like-option">
                                    <li>
                                        <a href="#" class="like-button" data-course-id="{{ $course->id }}">
                                            @if($course->isLikedByGuest())
                                                Liked <span class="icon fa fa-thumbs-up"></span>
                                            @else
                                                Like <span class="icon fa fa-thumbs-o-up"></span>
                                            @endif
                                        </a>
                                        <span class="like-count" id="like-count-{{ $course->id }}">{{ $course->likes()->count() }}</span>
                                    </li>
                                </ul>






                            </div>
                        </div>
                    </div>
                </div>


                            <!-- Video Column -->
                            <div class="video-column col-lg-3 col-md-12 col-sm-12">
                                <div class="inner-column sticky-top">

                                    <!-- Video Box -->
                                    <div class="intro-video">
                                        @php
                                            $extension = pathinfo($attachmentsingle->image, PATHINFO_EXTENSION);
                                        @endphp

                                        @if (in_array($extension, ['pdf', 'doc', 'epub']))
                                            <embed src="{{ asset('/attachments/' . $attachmentsingle->image) }}"
                                                style="width: 100%; height: auto;"
                                                type="application/{{ $extension }}">
                                        @elseif (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                            <img src="{{ asset('/attachments/' . $attachmentsingle->image) }}"
                                                alt="Image Preview" style="width: 100%; height: auto;">
                                        @elseif (in_array($extension, ['mp4', 'avi', 'mov']))
                                            <video src="{{ asset('/attachments/' . $attachmentsingle->image) }}"
                                                style="width: 100%; height: auto;" controls></video>
                                        @elseif (in_array($extension, ['mp3', 'wav']))
                                            <audio src="{{ asset('/attachments/' . $attachmentsingle->image) }}"
                                                controls style="width: 100%;"></audio>
                                        @elseif ($extension === 'link')
                                            <a href="{{ $attachmentsingle->image }}" target="_blank">Open Link</a>
                                        @else
                                            <p>Unsupported file type</p>
                                        @endif
                                    </div>
                                    <!-- End Video Box -->

                                </div>
                            </div>


            </div>
        </div>

    </div>
</section>
<!-- End intro Courses -->



	<!--Sidebar Page Container-->
    <div class="sidebar-page-container">
		<div class="patern-layer-one paroller" data-paroller-factor="0.40" data-paroller-factor-lg="0.20" data-paroller-type="foreground" data-paroller-direction="vertical" style="background-image: url(images/icons/icon-1.png)"></div>
		<div class="patern-layer-two paroller" data-paroller-factor="0.40" data-paroller-factor-lg="-0.20" data-paroller-type="foreground" data-paroller-direction="vertical" style="background-image: url(images/icons/icon-2.png)"></div>
		<div class="circle-one"></div>
		<div class="circle-two"></div>
    	<div class="auto-container">
        	<div class="row clearfix">

				<!-- Sidebar Side -->
                <div class="sidebar-side style-two blog-sidebar col-lg-3 col-md-12 col-sm-12">
					<div class="sidebar-inner sticky-top">
						<aside class="sidebar ">

							<!-- Popular Posts -->
							<div class="sidebar-widget popular-posts">

								<!-- Sidebar Title -->
								<div class="sidebar-title">
									<h5>Related Contents</h5>
								</div>

								<div class="widget-content">




                                @foreach ($course3 as $item)
									<article class="post">
										<div class="post-inner">
											<figure class="post-thumb"><a href="blog-detail.html">


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


                                        </a></figure>
											<div class="text"><a href="{{ route('coursedesc', $item->id) }}">{{ $item->title }}</a></div>
											<div class="post-info">By {{ $item['creator']->name }}</div>
										</div>
									</article>
                                @endforeach

								</div>
							</div>


						</aside>
					</div>
				</div>

				<!-- Content Side -->
                <div class="content-side blog-detail-column col-lg-9 col-md-12 col-sm-12">
                	<div class="blog-detail">


						<!-- Comments Area -->
						<div class="comments-area">


							<div class="group-title">
								<h4>Recent Comments</h4>
							</div>

							<div class="comment-box">
                                @foreach ($message as $message)
								<div class="comment">
									<div class="author-thumb"><img src="/user.png"  alt=""></div>
									<div class="comment-info clearfix"><strong>{{$message->name}} , {{$message->email}}</strong><div class="comment-time">{{$message->created_at}}</div></div>
									<div class="text">{{$message->body}}</div>
								</div>
                               @endforeach
							</div>




						</div>

                      

						<!-- Comment Form -->
						<div class="comment-form">

                            <div class="py-3">

                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif


                            </div>


							<div class="group-title"><h4>Leave Comment</h4></div>

							<!--Comment Form-->
                            <form method="post"  action="{{route('sendmessage',[$course->id])}}" >
                                @csrf
								<div class="row clearfix">

									<div class="col-lg-6 col-md-6 col-sm-12 form-group">
										<input type="text" name="name" placeholder="Full Name*" required>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12 form-group">
										<input type="email" name="email" placeholder="Email Address*" required>
									</div>

									<div class="col-lg-12 col-md-12 col-sm-12 form-group">
										<textarea class="" name="body" placeholder="Write your comment..."></textarea>
									</div>

									<div class="col-lg-12 col-md-12 col-sm-12 form-group">
										<button class="theme-btn btn-style-three" type="submit" name="submit-form"><span class="txt">Submit Your Comment <i class="fa fa-angle-right"></i></span></button>
									</div>

								</div>
							</form>

						</div>
						<!--End Comment Form -->

					</div>

				</div>

			</div>

		</div>
	</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
                $(document).ready(function() {
                $('.like-button').click(function(e) {
                    e.preventDefault();

                    var courseId = $(this).data('course-id');
                    var button = $(this);

                    $.ajax({
                        url: '{{ route("like.course") }}',
                        method: 'POST',
                        data: {
                            course_id: courseId,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.status === 'liked') {
                                button.html('Liked <span class="icon fa fa-thumbs-up"></span>');
                            } else {
                                button.html('Like <span class="icon fa fa-thumbs-o-up"></span>');
                            }

                            // Update the like count
                            $('#like-count-' + courseId).text(response.like_count);
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText);
                        }
                    });
                });
            });

    </script>





@endsection
