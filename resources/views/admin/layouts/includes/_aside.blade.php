<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

<aside class="app-sidebar" style="::-webkit-scrollbar-track {box-shadow: inset 0 0 5px grey;border-radius: 10px;}">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="{{ auth()->user()->image_path }}" alt="User Image">
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
                <i class="app-menu__icon fa fa-home"></i> 
                <span class="app-menu__label">@lang('site.sliders')</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ request()->is('*partners*') ? 'active' : '' }}" href="{{ route('admin.partners.index') }}">
                <i class="app-menu__icon fa fa-home"></i> 
                <span class="app-menu__label">@lang('site.partners')</span>
            </a>
        </li>


        <li class="treeview {{ request()->is('*managements*') ? 'is-expanded' : '' }}">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-user-circle"></i>
                <span class="app-menu__label">@lang('site.managements')</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{ route('admin.managements.admins.index') }}">
                        <i class="icon fa fa-circle-o"></i>@lang('site.admins')
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{ route('admin.managements.roles.index') }}">
                        <i class="icon fa fa-circle-o"></i>@lang('site.roles')
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{ route('admin.managements.languages.index') }}">
                        <i class="icon fa fa-circle-o"></i>@lang('site.languages')
                    </a>
                </li>
            </ul>
        </li>

        {{--settings--}}
        <li class="treeview {{ request()->is('*settings*') ? 'is-expanded' : '' }}">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-user-circle"></i>
                <span class="app-menu__label">@lang('settings.settings')</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{ route('admin.settings.websit') }}">
                        <i class="icon fa fa-circle-o"></i>@lang('settings.websit')
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{ route('admin.settings.contact') }}">
                        <i class="icon fa fa-circle-o"></i>@lang('settings.contact')
                    </a>
                </li>
            </ul>
        </li>

        {{--equipments--}}
        {{-- @if (auth()->user()->hasPermission('read_equipments'))
            <li><a class="app-menu__item {{ request()->segment(2) == 'equipments' ? 'active' : '' }}" href="{{ route('admin.equipments.index') }}"><i class="app-menu__icon fas fa-tools"></i> <span class="app-menu__label">@lang('equipments.equipments')</span></a></li>
        @endif --}}

        
        {{--settings--}}


        {{--profile--}}
        {{-- <li class="treeview {{ request()->is('*profile*') || request()->is('*password*')  ? 'is-expanded' : '' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user-circle"></i><span class="app-menu__label">@lang('users.profile')</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{ route('admin.profile.edit') }}"><i class="icon fa fa-circle-o"></i>@lang('users.edit_profile')</a></li>
                <li><a class="treeview-item" href="{{ route('admin.profile.password.edit') }}"><i class="icon fa fa-circle-o"></i>@lang('users.change_password')</a></li>
            </ul>
        </li> --}}

    </ul>
</aside>
