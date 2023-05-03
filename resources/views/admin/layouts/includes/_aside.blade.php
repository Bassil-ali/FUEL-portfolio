<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

<aside class="app-sidebar" style="::-webkit-scrollbar-track {box-shadow: inset 0 0 5px grey;border-radius: 10px;}">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="{{ auth('admin')->user()->image_path }}" alt="User Image">
        <div>
            <h2 class="app-sidebar__user-name">{{ auth('admin')->user()->fiest_name }}</p>
            {{-- <p class="app-sidebar__user-designation">{{ auth()->user()->roles->first()->name }}</p> --}}
        </div>
    </div>

    <ul class="app-menu">

        <li>
            <a class="app-menu__item {{ request()->is('*home*') ? 'active' : '' }}" href="{{ route('admin.index') }}">
                <i class="app-menu__icon fa fa-home"></i> 
                <span class="app-menu__label">@lang('site.home')</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ request()->is('*sliders*') ? 'active' : '' }}" href="{{ route('admin.sliders.index') }}">
                <i class="app-menu__icon fa fa-sliders"></i> 
                <span class="app-menu__label">@lang('site.sliders')</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ request()->is('*partners*') ? 'active' : '' }}" href="{{ route('admin.partners.index') }}">
                <i class="app-menu__icon fa fa-handshake"></i> 
                <span class="app-menu__label">@lang('site.partners')</span>
            </a>
        </li>


        <li class="treeview {{ request()->is('*managements*') ? 'is-expanded' : '' }}">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-tasks"></i>
                <span class="app-menu__label">@lang('site.managements')</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item {{ request()->is('*admins*') ? 'active' : '' }}" href="{{ route('admin.managements.admins.index') }}">
                        <i class="icon fa fa-users"></i>@lang('site.admins')
                    </a>
                </li>
                
            </ul>
        </li>

        {{--settings--}}
        <li class="treeview {{ request()->is('*settings*') ? 'is-expanded' : '' }}">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-gears"></i>
                <span class="app-menu__label">@lang('settings.settings')</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item {{ request()->is('*websit*') ? 'active' : '' }}" href="{{ route('admin.settings.websit') }}">
                        <i class="icon fa fa-globe"></i>@lang('settings.websit')
                    </a>
                </li>
                <li>
                    <a class="treeview-item {{ request()->is('*contact*') ? 'active' : '' }}" href="{{ route('admin.settings.contact') }}">
                        <i class="icon fa fa-phone"></i>@lang('settings.contact')
                    </a>
                </li>
                <li>
                    <a class="treeview-item {{ request()->is('*achievement*') ? 'active' : '' }}" href="{{ route('admin.settings.achievement') }}">
                        <i class="icon fa fa-briefcase"></i>@lang('settings.achievement')
                    </a>
                </li>

                <li>
                    <a class="treeview-item {{ request()->is('*about*') ? 'active' : '' }}" href="{{ route('admin.settings.about') }}">
                        <i class="icon fa fa-book"></i>@lang('settings.about')
                    </a>
                </li>

                <li>
                    <a class="treeview-item {{ request()->is('*feature*') ? 'active' : '' }}" href="{{ route('admin.settings.feature') }}">
                        <i class="icon fa fa-tags"></i>@lang('settings.feature')
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</aside>
