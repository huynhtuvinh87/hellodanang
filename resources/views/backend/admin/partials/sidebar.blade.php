<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.index') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-th"></i>
        </div>
        <div class="sidebar-brand-text mx-2">
            {{ empty($site_global_settings->setting_site_name) ? config('app.name', 'Laravel') : $site_global_settings->setting_site_name }}
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('backend.sidebar.dashboard') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        {{ __('backend.sidebar.main-content') }}
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_category" aria-expanded="true" aria-controls="collapse_category">
            <i class="fas fa-th-large"></i>
            <span>{{ __('backend.sidebar.category') }}</span>
        </a>
        <div id="collapse_category" class="collapse" aria-labelledby="collapse_category" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.categories.index') }}">{{ __('backend.sidebar.category') }}</a>
                <a class="collapse-item" href="{{ route('admin.custom-fields.index') }}">{{ __('backend.sidebar.custom-field') }}</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_listing" aria-expanded="true" aria-controls="collapse_listing">
            <i class="fas fa-sign"></i>
            <span>{{ __('backend.sidebar.listing') }}</span>
        </a>
        <div id="collapse_listing" class="collapse" aria-labelledby="collapse_listing" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.items.index') }}">{{ __('backend.sidebar.all-listings') }}</a>
                <a class="collapse-item" href="{{ route('admin.items.saved') }}">{{ __('backend.sidebar.saved-listings') }}</a>
                <a class="collapse-item" href="{{ route('admin.items.create') }}">{{ __('backend.sidebar.new-listing') }}</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_location" aria-expanded="true" aria-controls="collapse_location">
            <i class="fas fa-map-marked-alt"></i>
            <span>{{ __('backend.sidebar.location') }}</span>
        </a>
        <div id="collapse_location" class="collapse" aria-labelledby="collapse_location" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.countries.index') }}">{{ __('backend.sidebar.country') }}</a>
                <a class="collapse-item" href="{{ route('admin.states.index') }}">{{ __('backend.sidebar.state') }}</a>
                <a class="collapse-item" href="{{ route('admin.cities.index') }}">{{ __('backend.sidebar.city') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_message" aria-expanded="true" aria-controls="collapse_message">
            <i class="fas fa-comments"></i>
            <span>{{ __('backend.sidebar.messages') }}</span>
        </a>
        <div id="collapse_message" class="collapse" aria-labelledby="collapse_message" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.messages.index') }}">{{ __('backend.sidebar.all-messages') }}</a>
                <a class="collapse-item" href="{{ route('admin.messages.index', ['user_id' => \Illuminate\Support\Facades\Auth::user()->id]) }}">My messages</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_comment" aria-expanded="true" aria-controls="collapse_comment">
            <i class="fas fa-comment-alt"></i>
            <span>{{ __('backend.sidebar.comments') }}</span>
        </a>
        <div id="collapse_comment" class="collapse" aria-labelledby="collapse_comment" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.comments.index') }}">{{ __('backend.sidebar.all-comments') }}</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('canvas') }}" target="_blank">
            <i class="fas fa-external-link-alt"></i>
            <span>{{ __('backend.sidebar.blog') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        {{ __('backend.sidebar.interface') }}
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_section" aria-expanded="true" aria-controls="collapse_section">
            <i class="fas fa-stream"></i>
            <span>{{ __('backend.sidebar.sections') }}</span>
        </a>
        <div id="collapse_section" class="collapse" aria-labelledby="collapse_section" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.faqs.index') }}">{{ __('backend.sidebar.faq') }}</a>
                <a class="collapse-item" href="{{ route('admin.social-medias.index') }}">{{ __('backend.sidebar.social-media') }}</a>
                <a class="collapse-item" href="{{ route('admin.testimonials.index') }}">{{ __('backend.sidebar.testimonial') }}</a>
            </div>
        </div>
    </li>


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_page" aria-expanded="true" aria-controls="collapse_page">
            <i class="fas fa-copy"></i>
            <span>{{ __('backend.sidebar.pages') }}</span>
        </a>
        <div id="collapse_page" class="collapse" aria-labelledby="collapse_page" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.settings.page.about.edit') }}">{{ __('backend.sidebar.about') }}</a>
                <a class="collapse-item" href="{{ route('admin.settings.page.privacy-policy.edit') }}">{{ __('backend.sidebar.privacy-policy') }}</a>
                <a class="collapse-item" href="{{ route('admin.settings.page.terms-service.edit') }}">{{ __('backend.sidebar.terms-of-service') }}</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        {{ __('backend.sidebar.settings') }}
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.settings.general.edit') }}">
            <i class="fas fa-cog"></i>
            <span>{{ __('backend.sidebar.general') }}</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_subscription" aria-expanded="true" aria-controls="collapse_subscription">
            <i class="far fa-credit-card"></i>
            <span>{{ __('backend.sidebar.subscription') }}</span>
        </a>
        <div id="collapse_subscription" class="collapse" aria-labelledby="collapse_subscription" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.plans.index') }}">{{ __('backend.sidebar.plan') }}</a>
                <a class="collapse-item" href="{{ route('admin.subscriptions.index') }}">{{ __('backend.sidebar.subscription') }}</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.users.index') }}">
            <i class="fas fa-user-cog"></i>
            <span>{{ __('backend.sidebar.user') }}</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.users.profile.edit') }}">
            <i class="fas fa-address-card"></i>
            <span>{{ __('backend.sidebar.profile') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
