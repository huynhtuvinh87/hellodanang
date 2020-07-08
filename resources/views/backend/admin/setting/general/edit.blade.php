@extends('backend.admin.layouts.app')

@section('styles')
    <link href="{{ asset('frontend/vendor/leaflet/leaflet.css') }}" rel="stylesheet" />

    <!-- Image Crop Css -->
    <link href="{{ asset('backend/vendor/croppie/croppie.css') }}" rel="stylesheet" />

@endsection

@section('content')

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800">{{ __('backend.setting.general-setting') }}</h1>
            <p class="mb-4">{{ __('backend.setting.general-setting-desc') }}</p>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row bg-white pt-4 pl-3 pr-3 pb-4">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="{{ route('admin.settings.general.update') }}" class="">
                        @csrf

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">{{ __('backend.setting.info') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="paypal-tab" data-toggle="tab" href="#paypal" role="tab" aria-controls="paypal" aria-selected="false">{{ __('backend.setting.paypal') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="seo-tab" data-toggle="tab" href="#seo" role="tab" aria-controls="seo" aria-selected="false">{{ __('backend.setting.seo') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="google-analytics-tab" data-toggle="tab" href="#google-analytics" role="tab" aria-controls="google-analytics" aria-selected="false">{{ __('backend.setting.google-analytics') }}</a>
                            </li>

                        </ul>
                        <div class="tab-content pt-3 pb-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">

                                <div class="row form-group">

                                    <div class="col-md-4">
                                        <label class="text-black" for="setting_site_name">{{ __('backend.setting.site-name') }}</label>
                                        <input id="setting_site_name" type="text" class="form-control @error('setting_site_name') is-invalid @enderror" name="setting_site_name" value="{{ old('setting_site_name') ? old('setting_site_name') : $all_general_settings->setting_site_name }}">
                                        @error('setting_site_name')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label class="text-black" for="setting_site_email">{{ __('backend.setting.site-email') }}</label>
                                        <input id="setting_site_email" type="text" class="form-control @error('setting_site_email') is-invalid @enderror" name="setting_site_email" value="{{ old('setting_site_email') ? old('setting_site_email') : $all_general_settings->setting_site_email }}">
                                        @error('setting_site_email')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label class="text-black" for="setting_site_phone">{{ __('backend.setting.site-phone') }}</label>
                                        <input id="setting_site_phone" type="text" class="form-control @error('setting_site_phone') is-invalid @enderror" name="setting_site_phone" value="{{ old('setting_site_phone') ? old('setting_site_phone') : $all_general_settings->setting_site_phone }}">
                                        @error('setting_site_phone')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row form-group">

                                    <div class="col-md-12">
                                        <label class="text-black" for="setting_site_address">{{ __('backend.setting.address') }}</label>
                                        <input id="setting_site_address" type="text" class="form-control @error('setting_site_address') is-invalid @enderror" name="setting_site_address" value="{{ old('setting_site_address') ? old('setting_site_address') : $all_general_settings->setting_site_address }}">
                                        @error('setting_site_address')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row form-group">

                                    <div class="col-md-3">
                                        <label class="text-black" for="setting_site_city">{{ __('backend.setting.city') }}</label>
                                        <input id="setting_site_city" type="text" class="form-control @error('setting_site_city') is-invalid @enderror" name="setting_site_city" value="{{ old('setting_site_city') ? old('setting_site_city') : $all_general_settings->setting_site_city }}">
                                        @error('setting_site_city')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label class="text-black" for="setting_site_state">{{ __('backend.setting.state') }}</label>
                                        <input id="setting_site_state" type="text" class="form-control @error('setting_site_state') is-invalid @enderror" name="setting_site_state" value="{{ old('setting_site_state') ? old('setting_site_state') : $all_general_settings->setting_site_state }}">
                                        @error('setting_site_state')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label class="text-black" for="setting_site_country">{{ __('backend.setting.country') }}</label>
                                        <input id="setting_site_country" type="text" class="form-control @error('setting_site_country') is-invalid @enderror" name="setting_site_country" value="{{ old('setting_site_country') ? old('setting_site_country') : $all_general_settings->setting_site_country }}">
                                        @error('setting_site_country')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label class="text-black" for="setting_site_postal_code">{{ __('backend.setting.postal-code') }}</label>
                                        <input id="setting_site_postal_code" type="text" class="form-control @error('setting_site_postal_code') is-invalid @enderror" name="setting_site_postal_code" value="{{ old('setting_site_postal_code') ? old('setting_site_postal_code') : $all_general_settings->setting_site_postal_code }}">
                                        @error('setting_site_postal_code')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row form-group">

                                    <div class="col-md-12">
                                        <label class="text-black" for="setting_site_about">{{ __('backend.setting.site-about') }}</label>
                                        <textarea rows="4" id="setting_site_about" type="text" class="form-control @error('setting_site_about') is-invalid @enderror" name="setting_site_about">{{ old('setting_site_about') ? old('setting_site_about') : $all_general_settings->setting_site_about }}</textarea>
                                        @error('setting_site_about')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row form-group">

                                    <div class="col-md-3">
                                        <label class="text-black" for="setting_site_location_country_id">{{ __('backend.setting.country') }}</label>
                                        <select class="custom-select @error('setting_site_location_country_id') is-invalid @enderror" name="setting_site_location_country_id" id="setting_site_location_country_id">
                                            @foreach($all_countries as $key => $country)
                                                <option {{ (old('setting_site_location_country_id') ? old('setting_site_location_country_id') : $all_general_settings->setting_site_location_country_id) == $country->id ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->country_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('setting_site_location_country_id')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label class="text-black" for="setting_site_location_lat">{{ __('backend.setting.lat') }}</label>
                                        <input id="setting_site_location_lat" type="text" class="form-control @error('setting_site_location_lat') is-invalid @enderror" name="setting_site_location_lat" value="{{ old('setting_site_location_lat') ? old('setting_site_location_lat') : $all_general_settings->setting_site_location_lat }}">
                                        <small id="latHelpBlock" class="form-text text-muted">
                                            <a class="lat_lng_select_button btn btn-sm btn-primary text-white">{{ __('backend.setting.select-map') }}</a>
                                        </small>
                                        @error('setting_site_location_lat')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label class="text-black" for="setting_site_location_lng">{{ __('backend.setting.lng') }}</label>
                                        <input id="setting_site_location_lng" type="text" class="form-control @error('setting_site_location_lng') is-invalid @enderror" name="setting_site_location_lng" value="{{ old('setting_site_location_lng') ? old('setting_site_location_lng') : $all_general_settings->setting_site_location_lng }}">
                                        <small id="lngHelpBlock" class="form-text text-muted">
                                            <a class="lat_lng_select_button btn btn-sm btn-primary text-white">{{ __('backend.setting.select-map') }}</a>
                                        </small>
                                        @error('setting_site_location_lng')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label class="text-black" for="setting_site_language">{{ __('backend.setting.language.language') }}</label>
                                        <select class="custom-select @error('setting_site_language') is-invalid @enderror" name="setting_site_language">
                                            <option value="">{{ __('backend.setting.language.select-language') }}</option>
                                            <option value="{{ \App\Setting::LANGUAGE_AR }}" {{ $all_general_settings->setting_site_language == \App\Setting::LANGUAGE_AR ? 'selected' : '' }}>{{ __('backend.setting.language.arabic') }}</option>
                                            <option value="{{ \App\Setting::LANGUAGE_CA }}" {{ $all_general_settings->setting_site_language == \App\Setting::LANGUAGE_CA ? 'selected' : '' }}>{{ __('backend.setting.language.catalan') }}</option>
                                            <option value="{{ \App\Setting::LANGUAGE_DE }}" {{ $all_general_settings->setting_site_language == \App\Setting::LANGUAGE_DE ? 'selected' : '' }}>{{ __('backend.setting.language.german') }}</option>
                                            <option value="{{ \App\Setting::LANGUAGE_EN }}" {{ $all_general_settings->setting_site_language == \App\Setting::LANGUAGE_EN ? 'selected' : '' }}>{{ __('backend.setting.language.english') }}</option>
                                            <option value="{{ \App\Setting::LANGUAGE_ES }}" {{ $all_general_settings->setting_site_language == \App\Setting::LANGUAGE_ES ? 'selected' : '' }}>{{ __('backend.setting.language.spanish') }}</option>
                                            <option value="{{ \App\Setting::LANGUAGE_FA }}" {{ $all_general_settings->setting_site_language == \App\Setting::LANGUAGE_FA ? 'selected' : '' }}>{{ __('backend.setting.language.persian-farsi') }}</option>
                                            <option value="{{ \App\Setting::LANGUAGE_FR }}" {{ $all_general_settings->setting_site_language == \App\Setting::LANGUAGE_FR ? 'selected' : '' }}>{{ __('backend.setting.language.french') }}</option>
                                            <option value="{{ \App\Setting::LANGUAGE_HI }}" {{ $all_general_settings->setting_site_language == \App\Setting::LANGUAGE_HI ? 'selected' : '' }}>{{ __('backend.setting.language.hindi') }}</option>
                                            <option value="{{ \App\Setting::LANGUAGE_NL }}" {{ $all_general_settings->setting_site_language == \App\Setting::LANGUAGE_NL ? 'selected' : '' }}>{{ __('backend.setting.language.dutch') }}</option>
                                            <option value="{{ \App\Setting::LANGUAGE_PT_BR }}" {{ $all_general_settings->setting_site_language == \App\Setting::LANGUAGE_PT_BR ? 'selected' : '' }}>{{ __('backend.setting.language.portuguese-brazil') }}</option>
                                            <option value="{{ \App\Setting::LANGUAGE_RU }}" {{ $all_general_settings->setting_site_language == \App\Setting::LANGUAGE_RU ? 'selected' : '' }}>{{ __('backend.setting.language.russian') }}</option>
                                            <option value="{{ \App\Setting::LANGUAGE_TR }}" {{ $all_general_settings->setting_site_language == \App\Setting::LANGUAGE_TR ? 'selected' : '' }}>{{ __('backend.setting.language.turkish') }}</option>
                                            <option value="{{ \App\Setting::LANGUAGE_ZH_CN }}" {{ $all_general_settings->setting_site_language == \App\Setting::LANGUAGE_ZH_CN ? 'selected' : '' }}>{{ __('backend.setting.language.chinese') }}</option>
                                        </select>
                                        @error('setting_site_language')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row form-group">

                                    <div class="col-md-4">
                                        <span class="text-lg text-gray-800">{{ __('backend.setting.website-logo') }}</span>
                                        <small class="form-text text-muted">
                                            {{ __('backend.setting.website-logo-help') }}
                                        </small>
                                        @error('setting_site_logo')
                                        <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <div class="row mt-3">
                                            <div class="col-8">
                                                <button id="upload_image" type="button" class="btn btn-primary btn-block mb-2">{{ __('backend.setting.select-image') }}</button>
                                                @if(empty($all_general_settings->setting_site_logo))
                                                    <img id="image_preview" src="{{ asset('frontend/images/placeholder/full_item_feature_image.jpg') }}" class="img-responsive">
                                                @else
                                                    <img id="image_preview" src="{{ Storage::disk('public')->url('setting/'. $all_general_settings->setting_site_logo) }}" class="img-responsive">
                                                @endif
                                                <input id="feature_image" type="hidden" name="setting_site_logo">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-3">
                                        <span class="text-lg text-gray-800">{{ __('backend.setting.favicon') }}</span>
                                        <small class="form-text text-muted">
                                            {{ __('backend.setting.favicon-help') }}
                                        </small>
                                        @error('setting_site_favicon')
                                        <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <div class="row mt-3">
                                            <div class="col-8">
                                                <button id="favicon_upload_image" type="button" class="btn btn-primary btn-block mb-2">{{ __('backend.setting.select-image') }}</button>
                                                @if(empty($all_general_settings->setting_site_favicon))
                                                    <img id="favicon_image_preview" src="{{ asset('favicon-96x96.ico') }}" class="img-responsive">
                                                @else
                                                    <img id="favicon_image_preview" src="{{ Storage::disk('public')->url('setting/'. $all_general_settings->setting_site_favicon) }}" class="img-responsive">
                                                @endif
                                                <input id="favicon_image" type="hidden" name="setting_site_favicon">
                                            </div>
                                        </div>

                                    </div>


                                </div>

                            </div>
                            <div class="tab-pane fade" id="paypal" role="tabpanel" aria-labelledby="paypal-tab">

                                <div class="row form-group">

                                    <div class="col-md-6">
                                        <label class="text-black" for="setting_site_paypal_mode">{{ __('backend.setting.mode') }}</label>
                                        <select class="custom-select @error('setting_site_paypal_mode') is-invalid @enderror" name="setting_site_paypal_mode">
                                            <option value="sandbox" {{ $all_general_settings->setting_site_paypal_mode == 'sandbox' ? 'selected' : '' }}>Sandbox</option>
                                            <option value="live" {{ $all_general_settings->setting_site_paypal_mode == 'live' ? 'selected' : '' }}>Live</option>
                                        </select>
                                        @error('setting_site_paypal_mode')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="text-black" for="setting_site_paypal_currency">{{ __('backend.setting.currency') }}</label>
                                        <select class="custom-select @error('setting_site_paypal_currency') is-invalid @enderror" name="setting_site_paypal_currency">
                                            <option value="AUD" {{ $all_general_settings->setting_site_paypal_currency == 'AUD' ? 'selected' : '' }}>Australian dollar - AUD</option>
                                            <option value="CAD" {{ $all_general_settings->setting_site_paypal_currency == 'CAD' ? 'selected' : '' }}>Canadian dollar - CAD</option>
                                            <option value="CZK" {{ $all_general_settings->setting_site_paypal_currency == 'CZK' ? 'selected' : '' }}>Czech koruna - CZK</option>
                                            <option value="DKK" {{ $all_general_settings->setting_site_paypal_currency == 'DKK' ? 'selected' : '' }}>Danish krone - DKK</option>
                                            <option value="EUR" {{ $all_general_settings->setting_site_paypal_currency == 'EUR' ? 'selected' : '' }}>Euro - EUR</option>
                                            <option value="HKD" {{ $all_general_settings->setting_site_paypal_currency == 'HKD' ? 'selected' : '' }}>Hong Kong dollar - HKD</option>
                                            <option value="ILS" {{ $all_general_settings->setting_site_paypal_currency == 'ILS' ? 'selected' : '' }}>Israeli new shekel - ILS</option>
                                            <option value="MXN" {{ $all_general_settings->setting_site_paypal_currency == 'MXN' ? 'selected' : '' }}>Mexican peso - MXN</option>
                                            <option value="NZD" {{ $all_general_settings->setting_site_paypal_currency == 'NZD' ? 'selected' : '' }}>New Zealand dollar - NZD</option>
                                            <option value="NOK" {{ $all_general_settings->setting_site_paypal_currency == 'NOK' ? 'selected' : '' }}>Norwegian krone - MOK</option>
                                            <option value="PHP" {{ $all_general_settings->setting_site_paypal_currency == 'PHP' ? 'selected' : '' }}>Philippine peso - PHP</option>
                                            <option value="PLN" {{ $all_general_settings->setting_site_paypal_currency == 'PLN' ? 'selected' : '' }}>Polish złoty - PLN</option>
                                            <option value="GBP" {{ $all_general_settings->setting_site_paypal_currency == 'GBP' ? 'selected' : '' }}>Pound sterling - GBP</option>
                                            <option value="RUB" {{ $all_general_settings->setting_site_paypal_currency == 'RUB' ? 'selected' : '' }}>Russian ruble - RUB</option>
                                            <option value="SGD" {{ $all_general_settings->setting_site_paypal_currency == 'SGD' ? 'selected' : '' }}>Singapore dollar - SGD</option>
                                            <option value="SEK" {{ $all_general_settings->setting_site_paypal_currency == 'SEK' ? 'selected' : '' }}>Swedish krona - SEK</option>
                                            <option value="CHF" {{ $all_general_settings->setting_site_paypal_currency == 'CHF' ? 'selected' : '' }}>Swiss franc - CHF</option>
                                            <option value="THB" {{ $all_general_settings->setting_site_paypal_currency == 'THB' ? 'selected' : '' }}>Thai baht - THB</option>
                                            <option value="USD" {{ $all_general_settings->setting_site_paypal_currency == 'USD' ? 'selected' : '' }}>United States dollar - USD</option>
                                        </select>
                                        @error('setting_site_paypal_currency')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row form-group">

                                    <div class="col-md-6">
                                        <label class="text-black" for="setting_site_paypal_sandbox_username">{{ __('backend.setting.sandbox-username') }}</label>
                                        <input id="setting_site_paypal_sandbox_username" type="text" class="form-control @error('setting_site_paypal_sandbox_username') is-invalid @enderror" name="setting_site_paypal_sandbox_username" value="{{ old('setting_site_paypal_sandbox_username') ? old('setting_site_paypal_sandbox_username') : $all_general_settings->setting_site_paypal_sandbox_username }}">
                                        @error('setting_site_paypal_sandbox_username')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-black" for="setting_site_paypal_sandbox_password">{{ __('backend.setting.sandbox-password') }}</label>
                                        <input id="setting_site_paypal_sandbox_password" type="text" class="form-control @error('setting_site_paypal_sandbox_password') is-invalid @enderror" name="setting_site_paypal_sandbox_password" value="{{ old('setting_site_paypal_sandbox_password') ? old('setting_site_paypal_sandbox_password') : $all_general_settings->setting_site_paypal_sandbox_password }}">
                                        @error('setting_site_paypal_sandbox_password')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row form-group">

                                    <div class="col-md-6">
                                        <label class="text-black" for="setting_site_paypal_sandbox_secret">{{ __('backend.setting.sandbox-secret') }}</label>
                                        <input id="setting_site_paypal_sandbox_secret" type="text" class="form-control @error('setting_site_paypal_sandbox_secret') is-invalid @enderror" name="setting_site_paypal_sandbox_secret" value="{{ old('setting_site_paypal_sandbox_secret') ? old('setting_site_paypal_sandbox_secret') : $all_general_settings->setting_site_paypal_sandbox_secret }}">
                                        @error('setting_site_paypal_sandbox_secret')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-black" for="setting_site_paypal_sandbox_certificate">{{ __('backend.setting.sandbox-certificate') }}</label>
                                        <input id="setting_site_paypal_sandbox_certificate" type="text" class="form-control @error('setting_site_paypal_sandbox_certificate') is-invalid @enderror" name="setting_site_paypal_sandbox_certificate" value="{{ old('setting_site_paypal_sandbox_certificate') ? old('setting_site_paypal_sandbox_certificate') : $all_general_settings->setting_site_paypal_sandbox_certificate }}">
                                        @error('setting_site_paypal_sandbox_certificate')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row form-group">

                                    <div class="col-md-6">
                                        <label class="text-black" for="setting_site_paypal_live_username">{{ __('backend.setting.live-username') }}</label>
                                        <input id="setting_site_paypal_live_username" type="text" class="form-control @error('setting_site_paypal_live_username') is-invalid @enderror" name="setting_site_paypal_live_username" value="{{ old('setting_site_paypal_live_username') ? old('setting_site_paypal_live_username') : $all_general_settings->setting_site_paypal_live_username }}">
                                        @error('setting_site_paypal_live_username')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-black" for="setting_site_paypal_live_password">{{ __('backend.setting.live-password') }}</label>
                                        <input id="setting_site_paypal_live_password" type="text" class="form-control @error('setting_site_paypal_live_password') is-invalid @enderror" name="setting_site_paypal_live_password" value="{{ old('setting_site_paypal_live_password') ? old('setting_site_paypal_live_password') : $all_general_settings->setting_site_paypal_live_password }}">
                                        @error('setting_site_paypal_live_password')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row form-group">

                                    <div class="col-md-6">
                                        <label class="text-black" for="setting_site_paypal_live_secret">{{ __('backend.setting.live-secret') }}</label>
                                        <input id="setting_site_paypal_live_secret" type="text" class="form-control @error('setting_site_paypal_live_secret') is-invalid @enderror" name="setting_site_paypal_live_secret" value="{{ old('setting_site_paypal_live_secret') ? old('setting_site_paypal_live_secret') : $all_general_settings->setting_site_paypal_live_secret }}">
                                        @error('setting_site_paypal_live_secret')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-black" for="setting_site_paypal_live_certificate">{{ __('backend.setting.live-certificate') }}</label>
                                        <input id="setting_site_paypal_live_certificate" type="text" class="form-control @error('setting_site_paypal_live_certificate') is-invalid @enderror" name="setting_site_paypal_live_certificate" value="{{ old('setting_site_paypal_live_certificate') ? old('setting_site_paypal_live_certificate') : $all_general_settings->setting_site_paypal_live_certificate }}">
                                        @error('setting_site_paypal_live_certificate')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                                <div class="row form-group">

                                    <div class="col-md-6">
                                        <label class="text-black" for="setting_site_seo_home_title">{{ __('backend.setting.homepage-title') }}</label>
                                        <input id="setting_site_seo_home_title" type="text" class="form-control @error('setting_site_seo_home_title') is-invalid @enderror" name="setting_site_seo_home_title" value="{{ old('setting_site_seo_home_title') ? old('setting_site_seo_home_title') : $all_general_settings->setting_site_seo_home_title }}">
                                        @error('setting_site_seo_home_title')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="text-black" for="setting_site_seo_home_keywords">{{ __('backend.setting.homepage-keywords') }}</label>
                                        <input id="setting_site_seo_home_keywords" type="text" class="form-control @error('setting_site_seo_home_keywords') is-invalid @enderror" name="setting_site_seo_home_keywords" value="{{ old('setting_site_seo_home_keywords') ? old('setting_site_seo_home_keywords') : $all_general_settings->setting_site_seo_home_keywords }}">
                                        <small class="form-text text-muted">
                                            Separate by comma
                                        </small>
                                        @error('setting_site_seo_home_keywords')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row form-group">

                                    <div class="col-md-12">
                                        <label class="text-black" for="setting_site_seo_home_description">{{ __('backend.setting.homepage-description') }}</label>
                                        <textarea rows="5" class="form-control @error('setting_site_seo_home_description') is-invalid @enderror" name="setting_site_seo_home_description">{{ old('setting_site_seo_home_description') ? old('setting_site_seo_home_description') : $all_general_settings->setting_site_seo_home_description }}</textarea>
                                        @error('setting_site_seo_home_description')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="google-analytics" role="tabpanel" aria-labelledby="google-analytics-tab">
                                <div class="row form-group">

                                    <div class="col-md-6 pl-2">
                                        <div class="form-check form-check-inline">
                                            <input {{ $all_general_settings->setting_site_google_analytic_enabled == \App\Setting::TRACKING_ON ? 'checked' : '' }} class="form-check-input @error('setting_site_google_analytic_enabled') is-invalid @enderror" type="checkbox" id="setting_site_google_analytic_enabled" name="setting_site_google_analytic_enabled" value="{{ \App\Setting::TRACKING_ON }}">
                                            <label class="form-check-label" for="setting_site_google_analytic_enabled">
                                                {{ __('backend.setting.google-analytics-enabled') }}
                                            </label>
                                        </div>

                                        @error('setting_site_google_analytic_enabled')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row form-group">

                                    <div class="col-md-6">
                                        <label class="text-black" for="setting_site_google_analytic_tracking_id">{{ __('backend.setting.google-analytics-tracking-id') }}</label>
                                        <input id="setting_site_google_analytic_tracking_id" type="text" class="form-control @error('setting_site_google_analytic_tracking_id') is-invalid @enderror" name="setting_site_google_analytic_tracking_id" value="{{ old('setting_site_google_analytic_tracking_id') ? old('setting_site_google_analytic_tracking_id') : $all_general_settings->setting_site_google_analytic_tracking_id }}">
                                        @error('setting_site_google_analytic_tracking_id')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row form-group">

                                    <div class="col-md-6 pl-2">
                                        <div class="form-check form-check-inline">
                                        <input {{ $all_general_settings->setting_site_google_analytic_not_track_admin == \App\Setting::NOT_TRACKING_ADMIN ? 'checked' : '' }} class="form-check-input @error('setting_site_google_analytic_not_track_admin') is-invalid @enderror" type="checkbox" id="setting_site_google_analytic_not_track_admin" name="setting_site_google_analytic_not_track_admin" value="{{ \App\Setting::NOT_TRACKING_ADMIN }}">
                                        <label class="form-check-label" for="setting_site_google_analytic_not_track_admin">
                                            {{ __('backend.setting.google-analytics-no-track-admin') }}
                                        </label>
                                        </div>

                                        @error('setting_site_google_analytic_not_track_admin')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>

                        <hr/>

                        <div class="row form-group justify-content-between">
                            <div class="col-8">
                                <button type="submit" class="btn btn-success py-2 px-4 text-white">
                                    {{ __('backend.shared.update') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Croppie Modal for logo -->
    <div class="modal fade" id="image-crop-modal" tabindex="-1" role="dialog" aria-labelledby="image-crop-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('backend.setting.crop-logo-image') }}</h5>
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
                                <label class="custom-file-label" for="upload_image_input">{{ __('backend.setting.choose-image') }}</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('backend.shared.cancel') }}</button>
                    <button id="crop_image" type="button" class="btn btn-primary">{{ __('backend.setting.crop-image') }}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Croppie Modal for favicon -->
    <div class="modal fade" id="favicon-image-crop-modal" tabindex="-1" role="dialog" aria-labelledby="image-crop-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('backend.setting.crop-favicon-image') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div id="favicon_image_demo"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="custom-file">
                                <input id="favicon_upload_image_input" type="file" class="custom-file-input">
                                <label class="custom-file-label" for="favicon_upload_image_input">{{ __('backend.setting.choose-image') }}</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('backend.shared.cancel') }}</button>
                    <button id="favicon_crop_image" type="button" class="btn btn-primary">{{ __('backend.setting.crop-image') }}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal - map -->
    <div class="modal fade" id="map-modal" tabindex="-1" role="dialog" aria-labelledby="map-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('backend.setting.select-lat-lng-map') }}</h5>
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

    <script>

        $(document).ready(function() {

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
                            width:200,
                            height:50,
                            type:'square'
                        },
                        boundary:{
                            width:500,
                            height:300
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

                $('#image-crop-modal').modal('hide');
            });
            /**
             * End the croppie image plugin
             */


            /**
             * Start the croppie image plugin for favicon
             */
            $favicon_image_crop = null;

            $('#favicon_upload_image').on('click', function(){

                $('#favicon-image-crop-modal').modal('show');
            });


            $('#favicon_upload_image_input').on('change', function(){

                if(!$favicon_image_crop)
                {
                    $favicon_image_crop = $('#favicon_image_demo').croppie({
                        enableExif: true,
                        mouseWheelZoom: false,
                        viewport: {
                            width:96,
                            height:96,
                            type:'square'
                        },
                        boundary:{
                            width:200,
                            height:200
                        }
                    });

                    $('#favicon-image-crop-modal .modal-dialog').css({
                        'max-width':'100%'
                    });
                }

                var reader = new FileReader();

                reader.onload = function (event) {

                    $favicon_image_crop.croppie('bind', {
                        url: event.target.result
                    }).then(function(){
                        console.log('jQuery bind complete');
                    });

                }
                reader.readAsDataURL(this.files[0]);
            });

            $('#favicon_crop_image').on("click", function(event){

                $favicon_image_crop.croppie('result', {
                    type: 'base64',
                    size: 'viewport'
                }).then(function(response){
                    $('#favicon_image').val(response);
                    $('#favicon_image_preview').attr("src", response);
                });

                $('#favicon-image-crop-modal').modal('hide');
            });
            /**
             * End the croppie image plugin for favicon
             */

            /**
             * Start map modal
             */
            var map = L.map('map-modal-body', {
                center: [37.0902, -95.7129],
                zoom: 5,
            });

            var layerGroup = L.layerGroup().addTo(map);
            var current_lat = 0;
            var current_lng = 0;

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            map.on('click', function(e) {

                // remove all the markers in one go
                layerGroup.clearLayers();
                L.marker([e.latlng.lat, e.latlng.lng]).addTo(layerGroup);

                current_lat = e.latlng.lat;
                current_lng = e.latlng.lng;

                $('#lat_lng_span').text("Lat, Lng : " + e.latlng.lat + ", " + e.latlng.lng);
            });

            $('#lat_lng_confirm').on('click', function(){

                $('#setting_site_location_lat').val(current_lat);
                $('#setting_site_location_lng').val(current_lng);
                $('#map-modal').modal('hide')
            });
            $('.lat_lng_select_button').on('click', function(){
                $('#map-modal').modal('show');
                setTimeout(function(){ map.invalidateSize()}, 500);
            });
            /**
             * End map modal
             */
        });
    </script>
@endsection
