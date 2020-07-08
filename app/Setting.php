<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    const ABOUT_PAGE_ENABLED = 1;
    const ABOUT_PAGE_DISABLED = 0;

    const TERM_PAGE_ENABLED = 1;
    const TERM_PAGE_DISABLED = 0;

    const PRIVACY_PAGE_ENABLED = 1;
    const PRIVACY_PAGE_DISABLED = 0;

    const TRACKING_ON = 1;
    const TRACKING_OFF = 0;
    const NOT_TRACKING_ADMIN = 1;
    const TRACKING_ADMIN = 0;

    const LANGUAGE_AR = 'ar';
    const LANGUAGE_CA = 'ca';
    const LANGUAGE_DE = 'de';
    const LANGUAGE_EN = 'en';
    const LANGUAGE_ES = 'es';
    const LANGUAGE_FA = 'fa';
    const LANGUAGE_FR = 'fr';
    const LANGUAGE_HI = 'hi';
    const LANGUAGE_NL = 'nl';
    const LANGUAGE_PT_BR = 'pt-br';
    const LANGUAGE_RU = 'ru';
    const LANGUAGE_TR = 'tr';
    const LANGUAGE_ZH_CN = 'zh-CN';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'setting_site_logo', 'setting_site_name', 'setting_site_address',
        'setting_site_state', 'setting_site_city', 'setting_site_country',
        'setting_site_postal_code', 'setting_site_email', 'setting_site_about',
        'setting_page_about_enable', 'setting_page_about', 'setting_page_terms_of_service_enable',
        'setting_page_terms_of_service', 'setting_page_privacy_policy_enable', 'setting_page_privacy_policy',
        'setting_site_google_analytic_enabled', 'setting_site_google_analytic_tracking_id',
        'setting_site_google_analytic_not_track_admin',
    ];
}
