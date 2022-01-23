
<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="{{asset(auth()->user()->profile_image) }}" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">{{ auth()->user()->name }}</div></a>
    <div class="dropdown-menu dropdown-menu-right">
        <a href="{{route("admin.users.profile",auth()->user()->id)}}" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profil
        </a>
        <a href="/" target="_blank" class="dropdown-item has-icon">
            <i class="fas fa-word"></i> Siteyi Göster
        </a>
        <div class="dropdown-divider"></div>

        <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
            <i class="fas fa-sign-out-alt"></i> Çıkış Yap
        </a>
        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>


    </div>
</li>
