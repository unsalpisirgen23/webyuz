<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route("admin.home")}}">WebYüz</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{route("admin.home")}}">WY</a>
        </div>
        <ul class="sidebar-menu">



                <li class="menu-header">Başlangıç</li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("admin.home")}}"><i class="fas fa-home"></i>Anasayfa</a>
                </li>


                @if(session()->has("database_name"))
            @if(permission("Create","Posts") or permission("List","Posts") or permission("List","Comments") or permission("List","Categories"))
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>İçerik</span></a>
                <ul class="dropdown-menu">
                    @permission("Create","Posts")  <li><a class="nav-link" href="{{route("admin.posts.create")}}">İçerik Ekle</a></li>     @endpermission
                    @permission("List","Posts")  <li><a class="nav-link" href="{{route("admin.posts.index")}}">İçerik Listeleme</a></li> @endpermission
                    @permission("List","Comments") <li><a class="nav-link" href="{{route("admin.comments.index")}}">Yorumlar</a></li>       @endpermission
                    @permission("List","Categories") <li><a class="nav-link" href="{{route("admin.categories.index")}}">Kategoriler</a></li>  @endpermission
                </ul>
            </li>
            @endif
                 @endif


            @if(session()->has("database_name"))
            @permission("Sidebar Show","Pages")
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-window-maximize"></i><span>Sayfalar</span></a>
                <ul class="dropdown-menu">
                    @permission("Create","Pages")<li><a href="{{route("admin.pages.create")}}">Sayfa Ekle</a></li>@endpermission
                    @permission("Create","Pages")<li><a href="{{route("admin.pages.index")}}">Sayfaları Listele</a></li>@endpermission
                </ul>
            </li>
            @endpermission
            @endif

            @if(session()->has("database_name"))
            @permission("List","Multimedia")
            <li class="nav-item">
                <a href="{{route("admin.multimedia.index")}}" class="nav-link"><i class="fas fa-video"></i> <span>Multimedya</span></a>
            </li>
            @endpermission
            @endif

            <li class="menu-header">İşlemler</li>


            @permission("Sidebar Show","Template Settings")
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i> <span>Tema Yerleşimleri</span></a>
                <ul class="dropdown-menu">
                    @permission("Create","Sites")<li><a class="nav-link beep beep-sidebar" href="{{route("admin.TemplateHooks.create")}}">Bileşen Ekle</a></li>@endpermission
                    @permission("List","Sites")<li><a class="nav-link" href="{{route("admin.TemplateHooks.index")}}">Bileşen Listele</a></li>@endpermission
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i> <span>Component İşlemleri</span></a>
                <ul class="dropdown-menu">
                    @permission("Create","Sites")<li><a class="nav-link beep beep-sidebar" href="{{route("admin.ComponentWidgets.create")}}">Component Ekle</a></li>@endpermission
                    @permission("List","Sites")<li><a class="nav-link" href="{{route("admin.ComponentWidgets.index")}}">Component Listele</a></li>@endpermission
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i> <span>İlişki İşlemleri</span></a>
                <ul class="dropdown-menu">
                    @permission("Create","Sites")<li><a class="nav-link beep beep-sidebar" href="{{route("admin.TemplateHooksComponentWidgets.create")}}">İlişki Ekle</a></li>@endpermission
                    @permission("List","Sites")<li><a class="nav-link" href="{{route("admin.TemplateHooksComponentWidgets.index")}}">İlişki Listele</a></li>@endpermission
                </ul>
            </li>
            @endpermission

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-palette"></i> <span>Tasarım</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route("admin.appearance.menus.index")}}">Menüler</a></li>
                    <li><a class="nav-link" href="{{route("admin.appearance.temps.index")}}">Tema Seçimi</a></li>
                    <li><a class="nav-link" href="{{route("admin.templates.create")}}">Tema Oluştur</a></li>
                    <li><a class="nav-link" href="{{route("admin.templates.index")}}">Temalar</a></li>
                </ul>
            </li>


            @permission("Sidebar Show","Users")
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i> <span>Kullanıcılar</span></a>
                <ul class="dropdown-menu">
                    @permission("Create","Sites")<li><a class="nav-link beep beep-sidebar" href="{{route("admin.users.create")}}">Kullanıcı Ekle</a></li>@endpermission
                    @permission("List","Sites")<li><a class="nav-link" href="{{route("admin.users.index")}}">Kullanıcı Listeleme</a></li>@endpermission
                </ul>
            </li>
            @endpermission

            @permission("Sidebar Show","UserGroup")
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-friends"></i> <span>Kullanıcı Grupları</span></a>
                <ul class="dropdown-menu">
                    @permission("Create","UserGroup") <li><a class="nav-link beep beep-sidebar" href="{{route("admin.user_roles.create")}}">Grup Ekle</a></li>@endpermission
                    @permission("List","UserGroup") <li><a class="nav-link" href="{{route("admin.user_roles.index")}}">Grupları Listeleme</a></li>@endpermission
                </ul>
            </li>
            @endpermission
            @permission("List","GroupPolicy") @endpermission
            @permission("Sidebar Show","Policies")       @endpermission
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-shield-alt"></i><span>Güvenlik Politikası</span></a>
                <ul class="dropdown-menu">
                   <li style="margin-left: -5px;"><a class="nav-link" href="{{route("admin.security_policy.permissionPolicy")}}"><i class="fas fa-award"></i><span style="margin-left: -18px;">Grup Politikaları</span></a></li>
                     <li style="margin-left: -5px;"><a class="nav-link" href="{{route("admin.security_policy.GroupPolicyIndex")}}"><i class="fas fa-book-open"></i><span style="margin-left: -18px;">Grup Politikası Atama</span></a></li>
                </ul>
            </li>

            @permission("Assignment","GroupPolicy") @endpermission

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown">  <i class="fas fa-chalkboard-teacher"></i> <span>Site İşlemleri</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link beep beep-sidebar" href="{{route("admin.site_builder.create")}}">Site Oluştur</a></li>
                    <li><a class="nav-link beep beep-sidebar" href="{{route("admin.site_builder.index")}}">Siteleri Listele</a></li>

                </ul>
            </li>

            <li class="menu-header">Müdüller</li>

            @permission("Sidebar Show","Modules")
            {!! adminHook()->doAction("admin_menu_bar") !!}
            @endpermission


            <li class="menu-header">Diğer Özellikler</li>


            <li class="nav-item">
                <a href="{{route("admin.base_modules.index")}}" class="nav-link"><i class="fas fa-plug"></i><span>Modül İşlemleri</span></a>
            </li>




            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i> <span>Genel Ayarlar</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route("admin.settings.site_setting_edit")}}">Site Ayarları</a></li>
                </ul>
            </li>




            <li class="menu-header" style="height: 30px;"></li>
        </ul>
    </aside>
</div>