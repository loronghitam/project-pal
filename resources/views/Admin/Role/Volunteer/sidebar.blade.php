<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{url('/dashboard')}}" class="app-brand-link">
            <img src="{{asset('assets/admin/assets/img/logo.png')}}" alt="" width="150px">
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ (request()->is('dashboard*')) ? 'active' : '' }}">
            <a href="{{url('/dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <!-- Berita -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Berita</span>
        </li>
        <li class="menu-item {{ (request()->is('news*')) ? 'active' : '' }}">
            <a href="{{url('/news')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Berita</div>
            </a>
        </li>
    </ul>
</aside>
