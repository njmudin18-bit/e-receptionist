<div>
  <div class="navbar-custom">
    <div class="topbar container-fluid">
      <div class="d-flex align-items-center gap-1">
        <!-- Topbar Brand Logo -->
        <div class="logo-topbar">
          <!-- Logo light -->
          <a href="{{ url('') }}" class="logo-light">
            <span class="logo-lg">
              <img src="{{ asset(config('appsproperties.APPS_LOGO')) }}" alt="Logo {{ config('appsproperties.APPS_NAME') }}">
            </span>
            <span class="logo-sm">
              <img src="{{ asset(config('appsproperties.APPS_ICON')) }}" alt="Small Logo {{ config('appsproperties.APPS_NAME') }}">
            </span>
          </a>

          <!-- Logo Dark -->
          <a href="{{ url('') }}" class="logo-dark">
            <span class="logo-lg">
                <img src="{{ asset(config('appsproperties.APPS_LOGO')) }}" alt="Dark Logo {{ config('appsproperties.APPS_NAME') }}">
            </span>
            <span class="logo-sm">
                <img src="{{ asset(config('appsproperties.APPS_ICON')) }}" alt="Small Logo {{ config('appsproperties.APPS_NAME') }}">
            </span>
          </a>
        </div>

        <!-- Sidebar Menu Toggle Button -->
        <button class="button-toggle-menu">
            <i class="ri-menu-line"></i>
        </button>

        <!-- Horizontal Menu Toggle Button -->
        <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
            <div class="lines">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>

        <!-- Topbar Search Form -->
        <div class="app-search d-none d-lg-block">
            <form>
                <div class="input-group">
                    <input type="search" class="form-control" placeholder="Search...">
                    <span class="ri-search-line search-icon text-muted"></span>
                </div>
            </form>
        </div>
      </div>

      <ul class="topbar-menu d-flex align-items-center gap-3">
        <li class="dropdown d-lg-none">
          <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
              aria-haspopup="false" aria-expanded="false">
            <i class="ri-search-line fs-22"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
            <form class="p-3">
              <input type="search" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
            </form>
          </div>
        </li>

        <li class="dropdown notification-list">
          <a class="nav-link dropdown-toggle arrow-none" href="{{ route('visitor.index') }}" role="button"
              aria-haspopup="false" aria-expanded="false" title="Cek Form Register" target="_blank">
            <i class="ri-share-circle-line fs-22"></i>
          </a>
        </li>

        <li class="d-none d-sm-inline-block">
          <a class="nav-link" data-bs-toggle="offcanvas" href="#theme-settings-offcanvas">
            <i class="ri-settings-3-line fs-22"></i>
          </a>
        </li>

        <li class="d-none d-sm-inline-block">
          <div class="nav-link" id="light-dark-mode">
            <i class="ri-moon-line fs-22"></i>
          </div>
        </li>

        <li class="dropdown">
          <a class="nav-link dropdown-toggle arrow-none nav-user" data-bs-toggle="dropdown" href="#" role="button"
            aria-haspopup="false" aria-expanded="false">
            <span class="account-user-avatar">
              <img src="{{ asset('assets/images/users/profile.png') }}" alt="{{ Auth::user()->name }}" width="32" class="rounded-circle">
            </span>
            <span class="d-lg-block d-none">
              <h5 class="my-0 fw-normal">{{ ucfirst(Auth::user()->name) }}
                <i class="ri-arrow-down-s-line d-none d-sm-inline-block align-middle"></i>
              </h5>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
            <!-- item-->
            <div class="dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome !</h6>
            </div>

            <!-- item-->
            <a href="#" class="dropdown-item">
              <i class="ri-account-circle-line fs-18 align-middle me-1"></i>
              <span>{{ ucfirst(Auth::user()->name) }}</span>
            </a>

            <!-- item-->
            <!-- <a href="#" class="dropdown-item">
              <i class="ri-settings-4-line fs-18 align-middle me-1"></i>
              <span>Settings</span>
            </a> -->

            <!-- item-->
            <!-- <a href="#" class="dropdown-item">
              <i class="ri-customer-service-2-line fs-18 align-middle me-1"></i>
              <span>Support</span>
            </a> -->

            <!-- item-->
            <a href="{{ route('password.index') }}" class="dropdown-item">
              <i class="ri-lock-password-line fs-18 align-middle me-1"></i>
              <span>Update password</span>
            </a>

            <!-- item-->
            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="ri-logout-box-line fs-18 align-middle me-1"></i>
              <span>Logout</span>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>