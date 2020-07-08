@extends('frontend.layouts.app')

@section('styles')
@endsection

@section('content')

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('frontend/images/placeholder/header-inner.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                    <div class="row justify-content-center mt-5">
                        <div class="col-md-10 text-center">
                            <h1>{{ $data['post']->title }}</h1>
                            @if($data['post']->topic()->get()->count() != 0)
                                <p class="mb-0">{{ $data['post']->topic()->get()->first()->name }}</p>
                            @else
                                <p class="mb-0">{{ __('frontend.blog.uncategorized') }}</p>
                            @endif
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">

            <div class="row mb-5">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('page.blog') }}">{{ __('frontend.blog.title') }}</a></li>
                            @if($data['post']->topic()->get()->count() != 0)
                                <li class="breadcrumb-item"><a href="{{ route('page.blog.topic', $data['post']->topic()->get()->first()->slug) }}">{{ $data['post']->topic()->get()->first()->name }}</a></li>
                            @endif
                            <li class="breadcrumb-item active" aria-current="page">{{ $data['post']->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>


            <div class="row">

                <div class="col-md-8">

                    @if(empty($data['post']->featured_image))
                        <div class="mb-3" style="min-height:627px;border-radius: 0.25rem;background-image:url({{ asset('frontend/images/placeholder/full_item_feature_image.jpg') }});background-size:cover;background-repeat:no-repeat;background-position: center center;"></div>
                    @else
                        <div class="mb-3" style="min-height:627px;border-radius: 0.25rem;background-image:url({{ url('laravel_project/public' . $data['post']->featured_image) }});background-size:cover;background-repeat:no-repeat;background-position: center center;"></div>
                    @endif

                        <hr/>
                        <h2 class="font-size-regular text-black">{{ $data['post']->title }}</h2>
                        <div class="mb-5">
                            {{ __('frontend.blog.by') }} {{ $data['post']->user()->get()->first()->name }}<span class="mx-1">&bullet;</span>
                            {{ $data['post']->updated_at->diffForHumans() }} <span class="mx-1">&bullet;</span>
                            @if($data['post']->topic()->get()->count() != 0)
                                <a href="{{ route('page.blog.topic', $data['post']->topic()->get()->first()->slug) }}">{{ $data['post']->topic()->get()->first()->name }}</a>
                            @else
                                {{ __('frontend.blog.uncategorized') }}
                            @endif

                        </div>

                        <div class="row post-body mb-3">
                            <div class="col-12">
                                {!! clean($data['post']->body) !!}
                            </div>
                        </div>

                        @if($data['post']->tags()->get()->count() > 0)
                            <hr/>
                            <div class="row mb-3">
                                <div class="col-1">
                                    <h3 class="h5 text-black">{{ trans_choice('frontend.blog.tag', 1) }}</h3>
                                </div>
                                <div class="col-11">
                                    @foreach($data['post']->tags()->get() as $key => $tag)
                                        <a class="mr-2 mb-2 float-left bg-info text-white pl-2 pr-2 pt-1 pb-1" href="{{ route('page.blog.tag', $tag->slug) }}">{{ $tag->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <hr/>
                        <div class="row mb-3">
                            <div class="col-12">
                                <h3 class="h5 text-black mb-3">{{ trans_choice('frontend.blog.comment', 1) }}</h3>
                                @comments([
                                    'model' => $blog_post,
                                    'approved' => true,
                                    'perPage' => 10
                                ])
                            </div>
                        </div>

                        <h4 class="h5 mb-4 mt-4 text-black">{{ __('frontend.item.share') }}</h4>
                        <div class="row">
                            <div class="col-12">

                                <!-- Create link with share to Facebook -->
                                <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="facebook">
                                    <i class="fab fa-facebook-f"></i>
                                    {{ __('social_share.facebook') }}
                                </a>
                                <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="twitter">
                                    <i class="fab fa-twitter"></i>
                                    {{ __('social_share.twitter') }}
                                </a>
                                <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="linkedin">
                                    <i class="fab fa-linkedin-in"></i>
                                    {{ __('social_share.linkedin') }}
                                </a>
                                <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="blogger">
                                    <i class="fab fa-blogger-b"></i>
                                    {{ __('social_share.blogger') }}
                                </a>
                                <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="pinterest">
                                    <i class="fab fa-pinterest-p"></i>
                                    {{ __('social_share.pinterest') }}
                                </a>
                                <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="evernote">
                                    <i class="fab fa-evernote"></i>
                                    {{ __('social_share.evernote') }}
                                </a>
                                <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="reddit">
                                    <i class="fab fa-reddit-alien"></i>
                                    {{ __('social_share.reddit') }}
                                </a>
                                <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="buffer">
                                    <i class="fab fa-buffer"></i>
                                    {{ __('social_share.buffer') }}
                                </a>
                                <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="wordpress">
                                    <i class="fab fa-wordpress-simple"></i>
                                    {{ __('social_share.wordpress') }}
                                </a>
                                <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="weibo">
                                    <i class="fab fa-weibo"></i>
                                    {{ __('social_share.weibo') }}
                                </a>
                                <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="skype">
                                    <i class="fab fa-skype"></i>
                                    {{ __('social_share.skype') }}
                                </a>
                                <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="telegram">
                                    <i class="fab fa-telegram-plane"></i>
                                    {{ __('social_share.telegram') }}
                                </a>
                                <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="viber">
                                    <i class="fab fa-viber"></i>
                                    {{ __('social_share.viber') }}
                                </a>
                                <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="whatsapp">
                                    <i class="fab fa-whatsapp"></i>
                                    {{ __('social_share.whatsapp') }}
                                </a>
                                <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="wechat">
                                    <i class="fab fa-weixin"></i>
                                    {{ __('social_share.wechat') }}
                                </a>
                                <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="line">
                                    <i class="fab fa-line"></i>
                                    {{ __('social_share.line') }}
                                </a>

                            </div>
                        </div>

                </div>

                <div class="col-md-3 ml-auto">
                    @include('frontend.blog.partials.sidebar')

                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('frontend/vendor/goodshare/goodshare.min.js') }}"></script>

    <script>
        $(document).ready(function(){
        });
    </script>
@endsection
