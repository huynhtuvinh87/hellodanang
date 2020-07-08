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
                            <h1>{{ trans_choice('frontend.blog.tag', 0) }}: {{ $tag->name }}</h1>
                            <p class="mb-0">{{ __('frontend.blog.tag-description', ['tag_name' => $tag->name]) }}</p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">

                <div class="col-md-8">

                    <div class="row mb-3 align-items-stretch">

                        @foreach($data['posts'] as $post)
                            <div class="col-md-6 col-lg-6 mb-4 mb-lg-4">
                                <div class="h-entry">
                                    @if(empty($post->featured_image))
                                        <div class="mb-3" style="min-height:300px;border-radius: 0.25rem;background-image:url({{ asset('frontend/images/placeholder/full_item_feature_image.jpg') }});background-size:cover;background-repeat:no-repeat;background-position: center center;"></div>
                                    @else
                                        <div class="mb-3" style="min-height:300px;border-radius: 0.25rem;background-image:url({{ url('laravel_project/public' . $post->featured_image) }});background-size:cover;background-repeat:no-repeat;background-position: center center;"></div>
                                    @endif
                                    <h2 class="font-size-regular"><a href="{{ route('page.blog.show', $post->slug) }}" class="text-black">{{ $post->title }}</a></h2>
                                    <div class="meta mb-3">
                                        {{ __('frontend.blog.by') }} {{ $post->user()->get()->first()->name }}<span class="mx-1">&bullet;</span>
                                        {{ $post->updated_at->diffForHumans() }} <span class="mx-1">&bullet;</span>
                                        @if($post->topic()->get()->count() != 0)
                                            <a href="{{ route('page.blog.topic', $post->topic()->get()->first()->slug) }}">{{ $post->topic()->get()->first()->name }}</a>
                                        @else
                                            {{ __('frontend.blog.uncategorized') }}
                                        @endif

                                    </div>
                                    <p>{{ str_limit(preg_replace("/&#?[a-z0-9]{2,8};/i"," ", strip_tags($post->body)), 200) }}</p>
                                </div>
                            </div>
                        @endforeach

                    </div>


                    <div class="col-12 text-center mt-5">
                        {{ $data['posts']->links() }}

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
@endsection
