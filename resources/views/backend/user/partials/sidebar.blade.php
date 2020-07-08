<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('user.index') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-th"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ empty($site_global_settings->setting_site_name) ? config('app.name', 'Laravel') : $site_global_settings->setting_site_name }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('user.index') }}">
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
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_listing" aria-expanded="true" aria-controls="collapse_listing">
            <i class="fas fa-sign"></i>
            <span>{{ __('backend.sidebar.listing') }}</span>
        </a>
        <div id="collapse_listing" class="collapse" aria-labelledby="collapse_listing" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('user.items.index') }}">{{ __('backend.sidebar.all-listings') }}</a>
                <a class="collapse-item" href="{{ route('user.items.saved') }}">{{ __('backend.sidebar.saved-listings') }}</a>
                <a class="collapse-item" href="{{ route('user.items.create') }}">{{ __('backend.sidebar.new-listing') }}</a>
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
                <a class="collapse-item" href="{{ route('user.messages.index') }}">{{ __('backend.sidebar.all-messages') }}</a>
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
                <a class="collapse-item" href="{{ route('user.comments.index') }}">{{ __('backend.sidebar.all-comments') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.subscriptions.index') }}">
            <i class="far fa-credit-card"></i>
            <span>{{ __('backend.sidebar.subscription') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        {{ __('backend.sidebar.settings') }}
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.profile.update') }}">
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
