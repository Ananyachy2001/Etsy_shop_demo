<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="index.html" class="app-brand-link">
      <span class="app-brand-logo demo">
        <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M20.3116 12.6473L20.8293 10.7154C21.4335 8.46034 21.7356 7.3328 21.5081 6.35703C21.3285 5.58657 20.9244 4.88668 20.347 4.34587C19.6157 3.66095 18.4881 3.35883 16.2331 2.75458C13.978 2.15033 12.8504 1.84821 11.8747 2.07573C11.1042 2.25537 10.4043 2.65945 9.86351 3.23687C9.27709 3.86298 8.97128 4.77957 8.51621 6.44561C8.43979 6.7254 8.35915 7.02633 8.27227 7.35057L8.27222 7.35077L7.75458 9.28263C7.15033 11.5377 6.84821 12.6652 7.07573 13.641C7.25537 14.4115 7.65945 15.1114 8.23687 15.6522C8.96815 16.3371 10.0957 16.6392 12.3508 17.2435L12.3508 17.2435C14.3834 17.7881 15.4999 18.0873 16.415 17.9744C16.5152 17.9621 16.6129 17.9448 16.7092 17.9223C17.4796 17.7427 18.1795 17.3386 18.7203 16.7612C19.4052 16.0299 19.7074 14.9024 20.3116 12.6473Z" fill="#696CFF"/>
          <path opacity="0.5" d="M16.4149 17.9745C16.2064 18.6128 15.8398 19.1903 15.347 19.6519C14.6157 20.3368 13.4881 20.6389 11.2331 21.2432C8.97798 21.8474 7.85044 22.1496 6.87466 21.922C6.10421 21.7424 5.40432 21.3383 4.86351 20.7609C4.17859 20.0296 3.87647 18.9021 3.27222 16.647L2.75458 14.7152C2.15033 12.4601 1.84821 11.3325 2.07573 10.3568C2.25537 9.5863 2.65945 8.88641 3.23687 8.3456C3.96815 7.66068 5.09569 7.35856 7.35077 6.75431C7.7774 6.64 8.16369 6.53649 8.51621 6.44534C8.51618 6.44545 8.51624 6.44524 8.51621 6.44534C8.43979 6.72513 8.3591 7.02657 8.27222 7.35081L7.75458 9.28266C7.15033 11.5377 6.84821 12.6653 7.07573 13.6411C7.25537 14.4115 7.65945 15.1114 8.23687 15.6522C8.96815 16.3371 10.0957 16.6393 12.3508 17.2435C14.3833 17.7881 15.4999 18.0873 16.4149 17.9745Z" fill="#8587FF"/>
          </svg>
      </span>
      <span class="app-brand-text demo menu-text fw-bold ms-2">Progmedia</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboards -->

    {{-- Admin Menus --}}
    @if(auth()->user()->user_role === 'Admin')
    <li class="menu-item {{ Request::is('dashboard') ? 'active open' : '' }}">
        <a href="{{ route('admin.dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div class="text-truncate" data-i18n="Dashboard">Dashboard</div>
        </a>
    </li>

    <li class="menu-item {{ Request::is('shops') || Request::is('shop-details') ? 'active open' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-store"></i>
        <div class="text-truncate" data-i18n="Shops">Shops</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ Request::is('shops') ? 'active' : '' }}">
          <a href="{{ url('shops') }}" class="menu-link">
            <div class="text-truncate" data-i18n="All Shops">All Shops</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-item {{ Request::is('order-list') || Request::is('order-details') ? 'active open' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-purchase-tag-alt"></i>
        <div class="text-truncate" data-i18n="Received Orders">Received Orders</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ Request::is('order-list') ? 'active' : '' }}">
          <a href="{{ url('order-list') }}" class="menu-link">
            <div class="text-truncate" data-i18n="Order List">Order list</div>
          </a>
        </li>

        <li class="menu-item {{ Request::is('order-details') ? 'active' : '' }}">
          <a href="{{ url('order-details') }}" class="menu-link">
            <div class="text-truncate" data-i18n="Order Details">Order Details</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-pin"></i>
        <div class="text-truncate" data-i18n="Listings">Listings</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="{{ url('customer-list') }}" class="menu-link">
            <div class="text-truncate" data-i18n="All Listings">All Listings</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{ url('customer-details') }}" class="menu-link">
            <div class="text-truncate" data-i18n="Listing Details">Listing Details</div>
          </a>
        </li>

      </ul>

    </li>

    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-layer"></i>
        <div class="text-truncate" data-i18n="Products">Products</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="{{ url('product-list') }}" class="menu-link">
            <div class="text-truncate" data-i18n="All Products">All Products</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{ url('product-details') }}" class="menu-link">
            <div class="text-truncate" data-i18n="Product Details">Product Details</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-item {{ Request::is('collections') || Request::is('file-sets') || Request::is('file-list') ? 'active open' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-food-menu"></i>
        <div class="text-truncate" data-i18n="Designs">Designs</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ Request::is('collections') ? 'active' : '' }}">
          <a href="{{ url('collections') }}" class="menu-link">
            <div class="text-truncate" data-i18n="Collections">Collections</div>
          </a>
        </li>
        <li class="menu-item {{ Request::is('file-sets') ? 'active' : '' }}">
          <a href="{{ url('file-sets') }}" class="menu-link">
            <div class="text-truncate" data-i18n="Sets">Sets</div>
          </a>
        </li>
        <li class="menu-item {{ Request::is('file-list') ? 'active' : '' }}">
          <a href="{{ url('file-list') }}" class="menu-link">
            <div class="text-truncate" data-i18n="Files">Files</div>
          </a>
        </li>
      </ul>
    </li>

    <!-- e-commerce-app menu start -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link">
        <i class="menu-icon tf-icons bx bx-folder-open"></i>
        <div class="text-truncate" data-i18n="File Access">File Access</div>
      </a>
    </li>

    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link">
        <i class="menu-icon tf-icons bx bx-news"></i>
        <div class="text-truncate" data-i18n="Newsletter">Newsletter</div>
      </a>
    </li>

    <li class="menu-item">
      <a href="{{ url('user-list') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div class="text-truncate" data-i18n="Users">Users</div>
      </a>
    </li>
    {{-- <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-check-shield"></i>
        <div class="text-truncate" data-i18n="Roles & Permissions">Roles & Permissions</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="{{ url('roles') }}" class="menu-link">
            <div class="text-truncate" data-i18n="Roles">Roles</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{ url('permissions') }}" class="menu-link">
            <div class="text-truncate" data-i18n="Permissions">Permissions</div>
          </a>
        </li>
      </ul>
    </li> --}}
    <li class="menu-item {{ Request::is('') ? 'active open' : '' }}">
      <a href="#" class="menu-link">
          <i class="menu-icon tf-icons bx bx-bell"></i>
          <div class="text-truncate" data-i18n="Notifications">Notifications</div>
      </a>
    </li>
    <li class="menu-item {{ Request::is('account*') ? 'active' : '' }}">
      <a href="{{ route('admin.account.connections') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-cog"></i>
        <div class="text-truncate" data-i18n="Settings">Settings</div>
      </a>
    </li>
    @endif

    {{-- Sidebar for Customers START --}}
    @if(auth()->user()->user_role === 'Customer')
    <li class="menu-item {{ Request::is('my-dashboard') ? 'active open' : '' }}">
        <a href="{{ route('customer.dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div class="text-truncate" data-i18n="Dashboard">Dashboard</div>
        </a>
    </li>

    <li class="menu-item {{ Request::is('') ? 'active open' : '' }}">
      <a href="#" class="menu-link">
          <i class="menu-icon tf-icons bx bxs-cube-alt"></i>
          <div class="text-truncate" data-i18n="My Orders">My Orders</div>
      </a>
    </li>
    <li class="menu-item {{ Request::is('') ? 'active open' : '' }}">
      <a href="#" class="menu-link">
          <i class="menu-icon tf-icons bx bx-images"></i>
          <div class="text-truncate" data-i18n="Purchased Files">Purchased Files</div>
      </a>
    </li>
    @endif

  </ul>
</aside>