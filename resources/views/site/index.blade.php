@extends('site.layouts')
@section('content')
    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-xl-6">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h5>{{json_decode($bannerContent->content,true)['title']}}</h5>
                            <h1>{{json_decode($bannerContent->content,true)['sub_title']}}</h1>
                            <p> {{json_decode($bannerContent->content,true)['desc']}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- feature_part start-->
    <section class="feature_part">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xl-3 align-self-center">
                    <div class="single_feature_text ">
                        <h2>Awesome <br> Feature</h2>
                        <p>Set have great you male grass yielding an yielding first their you're
                            have called the abundantly fruit were man </p>
                     </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-layers"></i></span>
                            <h4>Better Future</h4>
                            <p>Set have great you male grasses yielding yielding first their to
                                called deep abundantly Set have great you male</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-new-window"></i></span>
                            <h4>Qualified Trainers</h4>
                            <p>Set have great you male grasses yielding yielding first their to called
                                deep abundantly Set have great you male</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part single_feature_part_2">
                            <span class="single_service_icon style_icon"><i class="ti-light-bulb"></i></span>
                            <h4>Job Oppurtunity</h4>
                            <p>Set have great you male grasses yielding yielding first their to called deep
                                abundantly Set have great you male</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- upcoming_event part start-->


    <!-- member_counter counter start -->
    <section class="member_counter">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="single_member_counter">
                        <span class="counter">{{ \App\Models\Course::count() }}</span>
                        <h4>All Courses</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_member_counter">
                        <span class="counter">{{\App\Models\Student::count()}}</span>
                        <h4> All Students</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_member_counter">
                        <span class="counter">{{\App\Models\Trainer::count()}}</span>
                        <h4>All Trainers</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- member_counter counter end -->

    <!--::review_part start::-->
    <section class="special_cource padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <p> {{json_decode($coursesContent->content,true)['title']}}</p>
                        <h2> {{json_decode($coursesContent->content,true)['sub_title']}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @isset($courses)
                    @foreach($courses as $course)
                        <div class="col-sm-6 col-lg-4">
                        <div class="single_special_cource">
                            <img src="{{asset('uploads/courses/'.$course->image)}}" class="special_img" alt="">
                            <div class="special_cource_text">
                                <a href="{{ route('front.getCourseByCategoryId',$course->category->id) }}" class="btn_4">{{$course->category->name}}</a>
                                <h4>{{$course->price}}$</h4>
                                <a href="{{route('front.getCourseById',[$course->category->id,$course->id])}}"><h3>{{$course->name}}</h3></a>
                                <p>{{$course->small_desc}}</p>
                                <div class="author_info">
                                    <div class="author_img">
                                        <img src="{{asset('uploads/trainers/'.$course->trainer->img)}}" alt="">
                                        <div class="author_info_text">
                                            <p>Conduct by:</p>
                                            <h5>{{$course->trainer->name}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach
                @endisset
            </div>
        </div>
    </section>
    <!--::blog_part end::-->

    <!--::review_part start::-->
    <section class="testimonial_part padding_top pb-5">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <p>tesimonials</p>
                        <h2>Happy Students</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="textimonial_iner owl-carousel">
                        @isset($testimonies)
                            @foreach($testimonies as $testimony)
                                <div class="testimonial_slider">
                            <div class="row">
                                <div class="col-lg-8 col-xl-4 col-sm-8 align-self-center">
                                    <div class="testimonial_slider_text">
                                        <p>{{$testimony->desc}}</p>
                                        <h4>{{$testimony->name }}</h4>
                                        @if($testimony->spec !== null)
                                            <h5> {{$testimony->spec}}</h5>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-2 col-sm-4">
                                    <div class="testimonial_slider_img">
                                        <img src="{{asset('uploads/testimonies/'.$testimony->image)}}" alt="#">
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endforeach
                        @endisset
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--::blog_part end::-->

@endsection

