@extends('frontend.homepage.layout')
@section('content')
    @include('frontend.component.slide')
    @if(isset($widgets['web']) && !is_null($widgets['web']))
        @foreach($widgets['web']->object as $cat)
        @php
            $icon = $widgets['web']->album[0];
            $catName = $cat->languages->name;
            $catDescription = $cat->languages->description;
        @endphp
        <div class="panel-web">
            <div class="uk-container uk-container-center">
                <div class="panel-head">
                    <div class="overlay">
                        <div class="icon"><img src="{{ $icon }}" alt="icon"></div>
                        <h2 class="heading-1"><span>{{ $catName }}</span></h2>
                        <div class="description">
                            {!! $catDescription !!}
                        </div>
                        <div class="readmore">
                            Trượt để khám phá
                            <svg fill="#D13138" height="800px" width="800px" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 330 330" xml:space="preserve">
                                <path d="M15,180h263.787l-49.394,49.394c-5.858,5.857-5.858,15.355,0,21.213C232.322,253.535,236.161,255,240,255
                                    s7.678-1.465,10.606-4.394l75-75c5.858-5.857,5.858-15.355,0-21.213l-75-75c-5.857-5.857-15.355-5.857-21.213,0
                                    c-5.858,5.857-5.858,15.355,0,21.213L278.787,150H15c-8.284,0-15,6.716-15,15S6.716,180,15,180z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            @if(isset($cat->posts) && $cat->posts->count() > 0)
            <div class="panel-body">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($cat->posts as $post)
                        @php
                            $name = $post->languages[0]->name;
                            $image = $post->image;
                            $canonical = write_url($post->languages[0]->canonical);
                        @endphp
                        <div class="swiper-slide">
                            <a href="{{ $canonical }}" title="" class="image img-cover wow fadeInRight" data-wow-delay="0.8s">
                                <img src="{{ $image }}" alt="{{ $name }}">
                            </a>
                            <h3 class="title"><a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a></h3>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
        @endforeach
    @endif

    @if(isset($widgets['category']) && !is_null($widgets['category']))
        @foreach($widgets['category']->object as $cat)
        @php
            $catName = $cat->languages->name;
            $catCanonical = write_url($cat->languages->canonical);
        @endphp
        <div class="panel-category">
            <div class="uk-container uk-container-center">
                <div class="panel-head">
                    <h2 class="heading-2"><span>Danh mục {{ $catName }}</span></h2>
                </div>
                @if(!is_null($cat->childrens))
                <div class="panel-body">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($cat->childrens as $children)
                            @php
                                $name = $children->languages->name;
                                $image = $children->image;
                                $canonical = write_url($children->languages->canonical);
                            @endphp
                            <div class="swiper-slide">
                                <div class="category-item">
                                    <a href="{{ $canonical }}" title="" class="image img-cover wow fadeInRight" data-wow-delay="0.8s">
                                        <img src="{{ $image }}" alt="{{ $name }}">
                                    </a>
                                    <h3 class="title"><a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a></h3>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        @endforeach
    @endif

    <div class="panel-intro">
        <div class="uk-container uk-container-center">
            <div class="panel-head">
                <h2 class="heading-2"><span>Quan Hệ Cổ Đông</span></h2>
            </div>
            <div class="uk-grid uk-grid-medium">
                <div class="uk-width-large-1-2">
                    @if(!is_null($widgets['intro']))
                        @foreach($widgets['intro']->object as $key => $val)
                        @php
                            $name = $val->languages->name;
                            $canonical = write_url($val->languages->canonical);
                            $image = $val->image;
                            $description = $val->languages->description;
                        @endphp
                        <div class="intro-container">
                            
                            <div class="panel-body">
                                <h2 class="title"><a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a></h2>
                                <a href="{{ $canonical }}" class="image img-cover"><img src="{{ $image }}" alt="{{ $name }}"></a>
                                <div class="description">
                                    {!! $description !!}
                                </div>
                                <a class="readmore" href="{{ $canonical }}">
                                    Xem thêm
                                    <svg fill="#D13138" height="800px" width="800px" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 330 330" xml:space="preserve">
                                        <path d="M15,180h263.787l-49.394,49.394c-5.858,5.857-5.858,15.355,0,21.213C232.322,253.535,236.161,255,240,255
                                            s7.678-1.465,10.606-4.394l75-75c5.858-5.857,5.858-15.355,0-21.213l-75-75c-5.857-5.857-15.355-5.857-21.213,0
                                            c-5.858,5.857-5.858,15.355,0,21.213L278.787,150H15c-8.284,0-15,6.716-15,15S6.716,180,15,180z"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
                <div class="uk-width-large-1-2">
                    @if(!is_null($widgets['info']->object))
                        @foreach($widgets['info']->object as $key => $val)
                        <div class="info-container">
                            <h3 class="title"><span>{{ $val->languages->name }}</span></h3>
                            @if(isset($val->posts) && $val->posts->count() > 0)
                            <section class="report-list">
                                <div class="report-header">
                                    <div class="col date">NGÀY ĐĂNG</div>
                                    <div class="col title">TIÊU ĐỀ</div>
                                    <div class="col action">CHI TIẾT</div>
                                </div>
                                @foreach($val->posts as $post)
                                <div class="report-item">
                                    <div class="col date"> {{ \Carbon\Carbon::parse($post->released_at)->format('d-m-Y') }}</div>
                                    <div class="col title">
                                        {!! $post->languages[0]->name !!}
                                    </div>
                                    <div class="col action">
                                    <a href="{{ $post->files }}" download=""><img src="https://trungdo.vn/wp-content/uploads/2021/08/tai-file-pdf-150x150.png" alt="pdf"></a>
                                    </div>
                                </div>
                                @endforeach

                            </section>
                            @endif
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
