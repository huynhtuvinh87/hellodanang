@extends('backend.admin.layouts.app')

@section('styles')
    <link href="{{ asset('frontend/vendor/leaflet/leaflet.css') }}" rel="stylesheet" />

    <!-- Image Crop Css -->
    <link href="{{ asset('backend/vendor/croppie/croppie.css') }}" rel="stylesheet" />

    <!-- Bootstrap FD Css-->
    <link href="{{ asset('backend/vendor/bootstrap-fd/bootstrap.fd.css') }}" rel="stylesheet" />

@endsection

@section('content')

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800">{{ __('backend.item.add-item') }}</h1>
            <p class="mb-4">{{ __('backend.item.add-item-desc') }}</p>
        </div>
        <div class="col-3 text-right">
            <a href="{{ route('admin.items.index') }}" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-backspace"></i>
                </span>
                <span class="text">{{ __('backend.shared.back') }}</span>
            </a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row bg-white pt-4 pl-3 pr-3 pb-4">
        <div class="col-12">

            <div class="row mb-4">
                <div class="col-12">
                    <div class="row mb-2">
                        <div class="col-12">
                            <form class="form-inline" action="{{ route('admin.items.create') }}" method="GET">
                                <div class="form-group mr-2">
                                    <select class="custom-select @error('category') is-invalid @enderror" name="category" onchange="$('#item-create-form').remove();">
                                        <option>{{ __('backend.item.select-category') }}</option>
                                        @foreach($all_categories as $key => $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                    <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">{{ __('backend.item.load-form') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    @if($category_id > 0)
                    <form method="POST" action="{{ route('admin.items.store') }}" id="item-create-form">
                        @csrf

                        <hr/>
                        <div class="form-row mb-3">
                            <div class="col-md-12">
                                <span class="text-lg text-gray-800">{{ __('backend.item.general-info') }}</span>
                                <small class="form-text text-muted">
                                </small>
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col-md-4">
                                <label for="item_title" class="text-black">{{ __('backend.item.title') }}</label>
                                <input id="item_title" type="text" class="form-control @error('item_title') is-invalid @enderror" name="item_title" value="{{ old('item_title') }}">
                                @error('item_title')
                                <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input name="category" value="{{ $category_id }}" type="hidden" id="input_category_id">
                            </div>

                            <div class="col-md-4">
                                <label for="item_status" class="text-black">{{ __('backend.item.status') }}</label>
                                <select class="custom-select @error('item_status') is-invalid @enderror" name="item_status">

                                    <option value="{{ \App\Item::ITEM_SUBMITTED }}">{{ __('backend.item.submitted') }}</option>
                                    <option value="{{ \App\Item::ITEM_PUBLISHED }}" selected>{{ __('backend.item.published') }}</option>
                                    <option value="{{ \App\Item::ITEM_SUSPENDED }}">{{ __('backend.item.suspended') }}</option>

                                </select>
                                @error('item_status')
                                <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="item_featured" class="text-black">{{ __('backend.item.featured') }}</label>
                                <select class="custom-select @error('item_featured') is-invalid @enderror" name="item_featured">

                                    <option value="0" selected>{{ __('backend.shared.no') }}</option>
                                    <option value="{{ \App\Item::ITEM_FEATURED }}">{{ __('backend.shared.yes') }}</option>

                                </select>
                                @error('item_featured')
                                <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row mb-3">

                            <div class="col-md-4">
                                <label for="item_address" class="text-black">{{ __('backend.item.address') }}</label>
                                <input id="item_address" type="text" class="form-control @error('item_address') is-invalid @enderror" name="item_address" value="{{ old('item_address') }}">
                                @error('item_address')
                                <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="city_id" class="text-black">{{ __('backend.city.city') }}</label>
                                <select id="select_city_id" class="custom-select @error('city_id') is-invalid @enderror" name="city_id">
                                    <option selected>{{ __('backend.item.select-city') }}</option>
                                </select>
                                @error('city_id')
                                <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="item_phone" class="text-black">{{ __('backend.item.phone') }}</label>
                                <input id="item_phone" type="text" class="form-control @error('item_phone') is-invalid @enderror" name="item_phone" value="{{ old('item_phone') }}" aria-describedby="lngHelpBlock">
                                @error('item_phone')
                                <span class="invalid-tooltip">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-row mb-3">

                            <div class="col-md-12">
                                <label for="item_description" class="text-black">{{ __('backend.item.description') }}</label>
                                <textarea class="form-control @error('item_description') is-invalid @enderror" id="item_description" rows="5" name="item_description">{{ old('item_description') }}</textarea>
                                @error('item_description')
                                <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Start web & social media -->
                        <div class="form-row mb-3">
                            <div class="col-md-3">
                                <label for="item_website" class="text-black">{{ __('backend.item.website') }}</label>
                                <input id="item_website" type="text" class="form-control @error('item_website') is-invalid @enderror" name="item_website" value="{{ old('item_website') }}">
                                <small id="linkHelpBlock" class="form-text text-muted">
                                    {{ __('backend.shared.url-help') }}
                                </small>
                                @error('item_website')
                                <span class="invalid-tooltip">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="item_social_facebook" class="text-black">{{ __('backend.item.facebook') }}</label>
                                <input id="item_social_facebook" type="text" class="form-control @error('item_social_facebook') is-invalid @enderror" name="item_social_facebook" value="{{ old('item_social_facebook') }}">
                                <small id="linkHelpBlock" class="form-text text-muted">
                                    {{ __('backend.shared.url-help') }}
                                </small>
                                @error('item_social_facebook')
                                <span class="invalid-tooltip">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="item_social_twitter" class="text-black">{{ __('backend.item.twitter') }}</label>
                                <input id="item_social_twitter" type="text" class="form-control @error('item_social_twitter') is-invalid @enderror" name="item_social_twitter" value="{{ old('item_social_twitter') }}">
                                <small id="linkHelpBlock" class="form-text text-muted">
                                    {{ __('backend.shared.url-help') }}
                                </small>
                                @error('item_social_twitter')
                                <span class="invalid-tooltip">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="item_social_linkedin" class="text-black">{{ __('backend.item.linkedin') }}</label>
                                <input id="item_social_linkedin" type="text" class="form-control @error('item_social_linkedin') is-invalid @enderror" name="item_social_linkedin" value="{{ old('item_social_linkedin') }}">
                                <small id="linkHelpBlock" class="form-text text-muted">
                                    {{ __('backend.shared.url-help') }}
                                </small>
                                @error('item_social_linkedin')
                                <span class="invalid-tooltip">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                        <!-- End web & social media -->

                        <!-- Start custom field section -->
                        <div class="form-row mb-3">
                            <div class="col-md-12">
                                <span class="text-lg text-gray-800">{{ __('backend.item.custom-fields') }}</span>
                                <small class="form-text text-muted">
                                    {{ __('backend.item.custom-field-help') }}
                                </small>
                            </div>
                        </div>
                        <div class="form-row">
                            @foreach($all_customFields as $key => $customField)
                                <div class="col-md-3 mb-3">
                                    @if($customField->custom_field_type == \App\CustomField::TYPE_STRING)
                                        <label for="{{ str_slug($customField->custom_field_name . $customField->id) }}" class="text-black">{{ $customField->custom_field_name }}</label>
                                        <input class="form-control @error(str_slug($customField->custom_field_name . $customField->id)) is-invalid @enderror" id="{{ str_slug($customField->custom_field_name . $customField->id) }}" rows="5" name="{{ str_slug($customField->custom_field_name . $customField->id) }}" value="{{ old(str_slug($customField->custom_field_name . $customField->id)) }}">
                                        @error(str_slug($customField->custom_field_name . $customField->id))
                                        <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    @endif
                                    @if($customField->custom_field_type == \App\CustomField::TYPE_TEXT)
                                        <label for="{{ str_slug($customField->custom_field_name . $customField->id) }}" class="text-black">{{ $customField->custom_field_name }}</label>
                                        <textarea class="form-control @error(str_slug($customField->custom_field_name . $customField->id)) is-invalid @enderror" id="{{ str_slug($customField->custom_field_name . $customField->id) }}" rows="5" name="{{ str_slug($customField->custom_field_name . $customField->id) }}">{{ old(str_slug($customField->custom_field_name . $customField->id)) }}</textarea>
                                        @error(str_slug($customField->custom_field_name . $customField->id))
                                        <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    @endif
                                    @if($customField->custom_field_type == \App\CustomField::TYPE_SELECT)
                                        <label for="{{ str_slug($customField->custom_field_name . $customField->id) }}" class="text-black">{{ $customField->custom_field_name }}</label>
                                            <select class="custom-select" name="{{ str_slug($customField->custom_field_name . $customField->id) }}" id="{{ str_slug($customField->custom_field_name . $customField->id) }}">
                                                @foreach(explode(',', $customField->custom_field_seed_value) as $key => $custom_field_value)
                                                    <option value="{{ $custom_field_value }}" {{ old(str_slug($customField->custom_field_name . $customField->id)) == $custom_field_value ? 'selected' : '' }}>{{ $custom_field_value }}</option>
                                                @endforeach
                                            </select>
                                        @error(str_slug($customField->custom_field_name . $customField->id))
                                        <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    @endif
                                    @if($customField->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT)
                                        <label for="{{ str_slug($customField->custom_field_name . $customField->id) }}" class="text-black">{{ $customField->custom_field_name }}</label>
                                        <select multiple class="custom-select" name="{{ str_slug($customField->custom_field_name . $customField->id) }}[]" id="{{ str_slug($customField->custom_field_name . $customField->id) }}">
                                            @foreach(explode(',', $customField->custom_field_seed_value) as $key => $custom_field_value)
                                                <option value="{{ $custom_field_value }}" {{ old(str_slug($customField->custom_field_name . $customField->id)) == $custom_field_value ? 'selected' : '' }}>{{ $custom_field_value }}</option>
                                            @endforeach
                                        </select>
                                        @error($customField->custom_field_name . $customField->id)
                                        <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    @endif
                                    @if($customField->custom_field_type == \App\CustomField::TYPE_LINK)
                                        <label for="{{ str_slug($customField->custom_field_name . $customField->id) }}" class="text-black">{{ $customField->custom_field_name }}</label>
                                        <input id="{{ str_slug($customField->custom_field_name . $customField->id) }}" type="text" class="form-control @error(str_slug($customField->custom_field_name . $customField->id)) is-invalid @enderror" name="{{ str_slug($customField->custom_field_name . $customField->id) }}" value="{{ old(str_slug($customField->custom_field_name . $customField->id)) }}" aria-describedby="linkHelpBlock">
                                        <small id="linkHelpBlock" class="form-text text-muted">
                                            {{ __('backend.shared.url-help') }}
                                        </small>
                                        @error(str_slug($customField->custom_field_name . $customField->id))
                                        <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <!-- End custom field section -->

                        <div class="form-row mb-3">
                            <div class="col-md-6">
                                <span class="text-lg text-gray-800">{{ __('backend.item.feature-image') }}</span>
                                <small class="form-text text-muted">
                                    {{ __('backend.item.feature-image-help') }}
                                </small>
                                @error('feature_image')
                                <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="row mt-3">
                                    <div class="col-8">
                                        <button id="upload_image" type="button" class="btn btn-primary btn-block mb-2">{{ __('backend.item.select-image') }}</button>
                                        <img id="image_preview" src="{{ asset('frontend/images/placeholder/full_item_feature_image.jpg') }}" class="img-responsive">
                                        <input id="feature_image" type="hidden" name="feature_image">
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <span class="text-lg text-gray-800">{{ __('backend.item.gallery-images') }}</span>
                                <small class="form-text text-muted">
                                    {{ __('backend.item.gallery-images-help') }}
                                </small>
                                @error('image_gallery')
                                <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <button id="upload_gallery" type="button" class="btn btn-primary btn-block mb-2">{{ __('backend.item.select-images') }}</button>
                                        <div class="row" id="selected-images">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr/>
                        <div class="form-row mb-3">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success py-2 px-4 text-white">
                                    {{ __('backend.shared.create') }}
                                </button>
                            </div>
                        </div>

                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal - feature image -->
    <div class="modal fade" id="image-crop-modal" tabindex="-1" role="dialog" aria-labelledby="image-crop-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('backend.item.crop-feature-image') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div id="image_demo"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="custom-file">
                                <input id="upload_image_input" type="file" class="custom-file-input">
                                <label class="custom-file-label" for="upload_image_input">{{ __('backend.item.choose-image') }}</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('backend.shared.cancel') }}</button>
                    <button id="crop_image" type="button" class="btn btn-primary">{{ __('backend.item.crop-image') }}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal - map -->
    <div class="modal fade" id="map-modal" tabindex="-1" role="dialog" aria-labelledby="map-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('backend.item.select-map-title') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div id="map-modal-body"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <span id="lat_lng_span"></span>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('backend.shared.cancel') }}</button>
                    <button id="lat_lng_confirm" type="button" class="btn btn-primary">{{ __('backend.shared.confirm') }}</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="{{ asset('frontend/vendor/leaflet/leaflet.js') }}"></script>

    <!-- Image Crop Plugin Js -->
    <script src="{{ asset('backend/vendor/croppie/croppie.js') }}"></script>

    <!-- Bootstrap Fd Plugin Js-->
    <script src="{{ asset('backend/vendor/bootstrap-fd/bootstrap.fd.js') }}"></script>

    <script>

        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            /**
             * End state, city selector
             */

            /**
             * Start image gallery uplaod
             */
            $('#upload_gallery').on('click', function(){
                window.selectedImages = [];

                $.FileDialog({
                    accept: "image/*",
                    class: "sasdsd"
                }).on("files.bs.filedialog", function (event) {
                    var html = "";
                    for (var a = 0; a < event.files.length; a++) {

                        if(a === 12) {break;}
                        selectedImages.push(event.files[a]);
                        html += "<div class='col-3 mb-2' id='item_image_gallery_" + a + "'>" +
                            "<img style='max-width: 120px;' src='" + event.files[a].content + "'>" +
                            "<br/><button class='btn btn-danger btn-sm text-white mt-1' onclick='$(\"#item_image_gallery_" + a + "\").remove();'>Delete</button>" +
                            "<input type='hidden' value='" + event.files[a].content + "' name='image_gallery[]'>" +
                            "</div>";
                    }
                    document.getElementById("selected-images").innerHTML += html;
                });
            });
            /**
             * End image gallery uplaod
             */

            /**
             * Start the croppie image plugin
             */
            $image_crop = null;

            $('#upload_image').on('click', function(){

                $('#image-crop-modal').modal('show');
            });


            $('#upload_image_input').on('change', function(){

                if(!$image_crop)
                {
                    $image_crop = $('#image_demo').croppie({
                        enableExif: true,
                        mouseWheelZoom: false,
                        viewport: {
                            width:800,
                            height:687,
                            type:'square'
                        },
                        boundary:{
                            width:850,
                            height:720
                        }
                    });

                    $('#image-crop-modal .modal-dialog').css({
                        'max-width':'100%'
                    });
                }

                var reader = new FileReader();

                reader.onload = function (event) {

                    $image_crop.croppie('bind', {
                        url: event.target.result
                    }).then(function(){
                        console.log('jQuery bind complete');
                    });

                }
                reader.readAsDataURL(this.files[0]);
            });

            $('#crop_image').on("click", function(event){

                $image_crop.croppie('result', {
                    type: 'base64',
                    size: 'viewport'
                }).then(function(response){
                    $('#feature_image').val(response);
                    $('#image_preview').attr("src", response);
                });

                $('#image-crop-modal').modal('hide')
            });
            /**
             * End the croppie image plugin
             */

        });
    </script>

@endsection
