<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-6">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
    </form>
    <!-- message -->
    <ul class="navbar-nav navbar-right">
    {{-- @include("admin.layouts.header.message") --}}
    <!-- End message -->
    <!-- notifications -->
        {{--   @include("admin.layouts.header.notifications") --}}

    <!-- End notifications -->
    <!-- Profile -->
    @include("admin.layouts.header.profile")
    <!-- End Profile -->
    </ul>
</nav>