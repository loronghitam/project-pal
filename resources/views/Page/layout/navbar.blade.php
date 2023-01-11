<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <a class="navbar-brand logo_h" href="{{url('/')}}">
        <img src="{{asset('assets/admin/assets/img/logo.png')}}" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
        <ul class="nav navbar-nav menu_nav ml-auto">
            <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
                <a class="nav-link" href="{{url('/')}}">Home</a>
            </li>
            <li class="nav-item {{ (request()->is('program*')) ? 'active' : '' }}">
                <a class="nav-link" href="{{url('/program')}}">Donasi Online</a>
            </li>
            <li class="nav-item {{ (request()->is('berita*')) ? 'active' : '' }}">
                <a class="nav-link" href="{{url('/berita')}}">Berita</a>
            </li>
            <li class="nav-item {{ (request()->is('bergabung*')) ? 'active' : '' }}">
                <a class="nav-link" href="{{url('/bergabung')}}">Bergabung</a>
            </li>
            <li class="nav-item {{ (request()->is('contact*')) ? 'active' : '' }}">
                <a class="nav-link" href="{{url('/contact')}}">Profile</a>
            </li>
        </ul>
    </div>
</div>
