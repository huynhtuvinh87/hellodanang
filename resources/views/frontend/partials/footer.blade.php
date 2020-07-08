<footer class="site-footer">
  <div class="container">
    <div class="row">
      <div class="col-md-9 mb-3">
        <div class="row">
          <div class="col-md-6">
            <h2 class="footer-heading mb-4">{{ __('frontend.footer.about') }}</h2>
            <p>{{ $site_global_settings->setting_site_about }}</p>
          </div>

          <div class="col-md-3">
            <h2 class="footer-heading mb-4">{{ __('frontend.footer.navigations') }}</h2>
            <ul class="list-unstyled">
              <li><a href="{{ route('page.about') }}">{{ __('frontend.footer.about-us') }}</a></li>
              <li><a href="{{ route('page.contact') }}">{{ __('frontend.footer.contact-us') }}</a></li>
              @if($site_global_settings->setting_page_terms_of_service_enable == \App\Setting::TERM_PAGE_ENABLED)
              <li><a href="{{ route('page.terms-of-service') }}">{{ __('frontend.footer.terms-of-service') }}</a></li>
              @endif
              @if($site_global_settings->setting_page_privacy_policy_enable == \App\Setting::PRIVACY_PAGE_ENABLED)
              <li><a href="{{ route('page.privacy-policy') }}">{{ __('frontend.footer.privacy-policy') }}</a></li>
              @endif
            </ul>
          </div>
          <div class="col-md-3">
            <h2 class="footer-heading mb-4">{{ __('frontend.footer.follow-us') }}</h2>
            @foreach(\App\SocialMedia::orderBy('social_media_order')->get() as $key => $social_media)
            <a href="{{ $social_media->social_media_link }}" class="pl-0 pr-3">
              <i class="{{ $social_media->social_media_icon }}"></i>
            </a>
            @endforeach
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <h2 class="footer-heading mb-4">{{ __('frontend.footer.posts') }}</h2>
        <ul class="list-unstyled">
          @foreach(\Canvas\Post::published()->orderByDesc('published_at')->take(5)->get() as $key => $post)
          <li><a href="{{ route('page.blog.show', $post->slug) }}">{{ $post->title }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="row pt-2 mt-5 text-center">
      <div class="col-md-12">
        <div class="border-top pt-3">
          <p>
            {{ __('frontend.footer.copyright') }} &copy; {{ empty($site_global_settings->setting_site_name) ? config('app.name', 'Laravel') : $site_global_settings->setting_site_name }}
            <script>
              document.write(new Date().getFullYear());
            </script> {{ __('frontend.footer.rights-reserved') }}
          </p>
        </div>
      </div>

    </div>
  </div>
</footer>