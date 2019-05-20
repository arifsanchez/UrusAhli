<div class="sidebar">
    <nav class="sidebar-nav ps ps--active-y">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('organisasi_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle">
                        <i class="fas fa-cogs nav-icon">

                        </i>
                        {{ trans('global.organisasi.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('bahagian_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.bahagians.index") }}" class="nav-link {{ request()->is('admin/bahagians') || request()->is('admin/bahagians/*') ? 'active' : '' }}">
                                    <i class="fas fa-cogs nav-icon">

                                    </i>
                                    {{ trans('global.bahagian.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('cawangan_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.cawangans.index") }}" class="nav-link {{ request()->is('admin/cawangans') || request()->is('admin/cawangans/*') ? 'active' : '' }}">
                                    <i class="fas fa-cogs nav-icon">

                                    </i>
                                    {{ trans('global.cawangan.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('biro_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.biros.index") }}" class="nav-link {{ request()->is('admin/biros') || request()->is('admin/biros/*') ? 'active' : '' }}">
                                    <i class="fas fa-cogs nav-icon">

                                    </i>
                                    {{ trans('global.biro.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('ahli_perkim_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle">
                        <i class="fas fa-user-friends nav-icon">

                        </i>
                        {{ trans('global.ahliPerkim.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('user_profile_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.user-profiles.index") }}" class="nav-link {{ request()->is('admin/user-profiles') || request()->is('admin/user-profiles/*') ? 'active' : '' }}">
                                    <i class="far fa-user-circle nav-icon">

                                    </i>
                                    {{ trans('global.userProfile.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('rekod_pembayaran_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.rekod-pembayarans.index") }}" class="nav-link {{ request()->is('admin/rekod-pembayarans') || request()->is('admin/rekod-pembayarans/*') ? 'active' : '' }}">
                                    <i class="fas fa-file-invoice-dollar nav-icon">

                                    </i>
                                    {{ trans('global.rekodPembayaran.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('aktiviti_perkim_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle">
                        <i class="fas fa-calendar-alt nav-icon">

                        </i>
                        {{ trans('global.aktivitiPerkim.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('aktiviti_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.aktivitis.index") }}" class="nav-link {{ request()->is('admin/aktivitis') || request()->is('admin/aktivitis/*') ? 'active' : '' }}">
                                    <i class="far fa-clock nav-icon">

                                    </i>
                                    {{ trans('global.aktiviti.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('user_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle">
                        <i class="fas fa-users nav-icon">

                        </i>
                        {{ trans('global.userManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('permission_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                    <i class="fas fa-unlock-alt nav-icon">

                                    </i>
                                    {{ trans('global.permission.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <i class="fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('global.role.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <i class="fas fa-user nav-icon">

                                    </i>
                                    {{ trans('global.user.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('audit_log_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'active' : '' }}">
                                    <i class="fas fa-file-alt nav-icon">

                                    </i>
                                    {{ trans('global.auditLog.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('content_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle">
                        <i class="fas fa-book nav-icon">

                        </i>
                        {{ trans('global.contentManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('content_category_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.content-categories.index") }}" class="nav-link {{ request()->is('admin/content-categories') || request()->is('admin/content-categories/*') ? 'active' : '' }}">
                                    <i class="fas fa-folder nav-icon">

                                    </i>
                                    {{ trans('global.contentCategory.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('content_tag_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.content-tags.index") }}" class="nav-link {{ request()->is('admin/content-tags') || request()->is('admin/content-tags/*') ? 'active' : '' }}">
                                    <i class="fas fa-tags nav-icon">

                                    </i>
                                    {{ trans('global.contentTag.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('content_page_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.content-pages.index") }}" class="nav-link {{ request()->is('admin/content-pages') || request()->is('admin/content-pages/*') ? 'active' : '' }}">
                                    <i class="fas fa-file nav-icon">

                                    </i>
                                    {{ trans('global.contentPage.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <li class="nav-item">
                <a href="{{ route("admin.systemCalendar") }}" class="nav-link {{ request()->is('admin/system-calendar') || request()->is('admin/system-calendar/*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-calendar">

                    </i>
                    {{ trans('global.systemCalendar') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 869px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 415px;"></div>
        </div>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>