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
        <!-- Components -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Program</span></li>
        <!-- Cards -->
        <li class="menu-item {{ (request()->is('programs*')) ? 'active' : '' }}">
            <a href="{{url('programs')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Program</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{url('donates')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Transaksi Donasi</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{url('donates')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Laporan Transaksi Donasi</div>
            </a>
        </li>

        <!-- Forms & Tables -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Bergabung</span></li>
        <!-- Tables -->
        <li class="menu-item {{ (request()->is('joinus')) ? 'active' : '' }}">
            <a href="{{url('joinus')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Tables">Bergabung</div>
            </a>
        </li>
        <li class="menu-item {{ (request()->is('joinuslist*')) ? 'active' : '' }}">
            <a href="{{url('joinuslist')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Tables">List Bergabung</div>
            </a>
        </li>
    </ul>
</aside>
