<form action="{{ route('page.search.do') }}" method="GET">
  <div class="row align-items-center">
    <div class="col-lg-12 mb-8 mb-xl-0 col-xl-7">
      <input name="search_query" type="text" class="form-control rounded @error('search_query') is-invalid @enderror" value="{{ old('search_query') ? old('search_query') : (isset($last_search_query) ? $last_search_query : '') }}" placeholder="{{ __('frontend.search.what-are-you-looking-for') }}">
      @error('search_query')
      <div class="invalid-tooltip">
        {{ $message }}
      </div>
      @enderror
    </div>
    <!-- <div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">
            <div id="multiple-datasets" class="wrap-icon">
                <span class="icon icon-room z-index-1000"></span>
                <input name="city_state" type="text" class="form-control rounded typeahead @error('city_state') is-invalid @enderror" value="{{ old('city_state') ? old('city_state') : (isset($last_search_city_state) ? $last_search_city_state : '') }}" placeholder="{{ __('frontend.search.state-or-city') }}" aria-describedby="basic-addon1">
                @error('city_state')
                <div class="invalid-tooltip state-city-invalid-tooltip">
                    {{ $message }}
                </div>
                @enderror
            </div>

        </div> -->
    <div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">
      <div class="select-wrap">
        <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
        <select class="form-control rounded @error('categories') is-invalid @enderror" name="categories">
          <option value="0">{{ __('frontend.search.all-categories') }}</option>
          @foreach($search_all_categories as $category)
          <option {{ $category->id == (old('categories') ? old('categories') : (isset($last_search_category) ? $last_search_category : 0)) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->category_name }}</option>
          @endforeach
        </select>
        @error('categories')
        <div class="invalid-tooltip">
          {{ $message }}
        </div>
        @enderror
      </div>
    </div>
    <div class="col-lg-12 col-xl-2 ml-auto text-right">
      <input type="submit" class="btn btn-primary btn-block bg-default br-default rounded text-white" value="{{ __('frontend.search.search') }}">
    </div>

  </div>
</form>