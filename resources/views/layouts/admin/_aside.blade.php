<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

<aside class="app-sidebar" style="::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey;
  border-radius: 10px;
}">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="{{ auth()->user()->image_path }}" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">{{ auth()->user()->name }}</p>
            <p class="app-sidebar__user-designation">{{ auth()->user()->roles->first()->name }}</p>
        </div>
    </div>

    <ul class="app-menu">

        <li><a class="app-menu__item {{ request()->is('*home*') ? 'active' : '' }}" href="{{ route('admin.home') }}"><i class="app-menu__icon fa fa-home"></i> <span class="app-menu__label">@lang('site.home')</span></a></li>

        {{--statistics--}}
        <li class="treeview {{ request()->is('*statistics_chart*') || request()->is('*statistics_table*')  ? 'is-expanded' : '' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-chart-area"></i><span class="app-menu__label">@lang('statistics.statistics')</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item {{ request()->is('*statistics_chart*') ? 'active' : '' }}" href="{{ route('admin.statistics.chart') }}"><i class="icon fas fa-chart-line"></i>@lang('statistics.chart')</a></li>
                <li><a class="treeview-item {{ request()->is('*fuel_consumption*') ? 'active' : '' }}" href="{{ route('admin.chart.fuel_consumption.index') }}"><i class="icon fas fa-chart-line"></i>@lang('chart.fuel_consumption')</a></li>
{{--                <li><a class="treeview-item {{ request()->is('*statistics_table*') ? 'active' : '' }}" href="{{ route('admin.statistics.table') }}"><i class="icon fa-solid fa-table"></i>@lang('statistics.table')</a></li>--}}
            </ul>
        </li>

        {{--reports--}}
        <li class="treeview {{ request()->is('*reports*') ? 'is-expanded' : '' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">@lang('reports.reports')</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item {{ request()->segment(3) == 'spares_available' ? 'active' : '' }}" href="{{ route('admin.reports.spares_available') }}"><i class="icon fa-solid fa-server"></i>@lang('reports.spares_available')</a></li>
                <li><a class="treeview-item {{ request()->segment(3) == 'spares_used' ? 'active' : '' }}" href="{{ route('admin.reports.spares_used') }}"><i class="icon fa-solid fa-server"></i>@lang('reports.spares_used')</a></li>
                <li><a class="treeview-item {{ request()->segment(3) == 'breakdown_overview' ? 'active' : '' }}" href="{{ route('admin.reports.breakdown_overview') }}"><i class="icon fa-solid fa-server"></i>@lang('reports.breakdown_overview')</a></li>
                <li><a class="treeview-item {{ request()->segment(3) == 'material_delivery_time' ? 'active' : '' }}" href="{{ route('admin.reports.material_delivery_time') }}"><i class="icon fa-solid fa-server"></i>@lang('reports.material_delivery_time')</a></li>
                <li><a class="treeview-item {{ request()->segment(3) == 'total_fuel_consumption' ? 'active' : '' }}" href="{{ route('admin.reports.total_fuel_consumption') }}"><i class="icon fa-solid fa-server"></i>@lang('reports.total_fuel_consumption')</a></li>
                <li><a class="treeview-item {{ request()->segment(3) == 'total_equipment_expenditure' ? 'active' : '' }}" href="{{ route('admin.reports.total_equipment_expenditure') }}"><i class="icon fa-solid fa-server"></i>@lang('reports.total_equipment_expenditure')</a></li>
                <li><a class="treeview-item {{ request()->segment(3) == 'average_expenditure_per_km' ? 'active' : '' }}" href="{{ route('admin.reports.average_expenditure_per_km') }}"><i class="icon fa-solid fa-server"></i>@lang('reports.average_expenditure_per_km')</a></li>
                <li><a class="treeview-item {{ request()->segment(3) == 'eir_overview' ? 'active' : '' }}" href="{{ route('admin.reports.eir_overview') }}"><i class="icon fa-solid fa-server"></i>@lang('reports.eir_overview')</a></li>
                <li><a class="treeview-item {{ request()->segment(3) == 'equipments_overview' ? 'active' : '' }}" href="{{ route('admin.reports.equipments_overview') }}"><i class="icon fa-solid fa-server"></i>@lang('reports.equipments_overview')</a></li>
                <li><a class="treeview-item {{ request()->segment(3) == 'idle_equipments' ? 'active' : '' }}" href="{{ route('admin.reports.idle_equipments') }}"><i class="icon fa-solid fa-server"></i>@lang('reports.idle_equipments')</a></li>
                <li><a class="treeview-item {{ request()->segment(3) == 'total_hours_worked' ? 'active' : '' }}" href="{{ route('admin.reports.total_hours_worked') }}"><i class="icon fa-solid fa-server"></i>@lang('reports.total_hours_worked')</a></li>
                <li><a class="treeview-item {{ request()->segment(3) == 'average_mileage' ? 'active' : '' }}" href="{{ route('admin.reports.average_mileage') }}"><i class="icon fa-solid fa-server"></i>@lang('reports.average_mileage')</a></li>
                <li><a class="treeview-item {{ request()->segment(3) == 'total_insurance_cost' ? 'active' : '' }}" href="{{ route('admin.reports.total_insurance_cost') }}"><i class="icon fa-solid fa-server"></i>@lang('reports.total_insurance_cost')</a></li>
            </ul>
        </li>

        {{--equipments--}}
        @if (auth()->user()->hasPermission('read_equipments'))
            <li><a class="app-menu__item {{ request()->segment(2) == 'equipments' ? 'active' : '' }}" href="{{ route('admin.equipments.index') }}"><i class="app-menu__icon fas fa-tools"></i> <span class="app-menu__label">@lang('equipments.equipments')</span></a></li>
        @endif

        {{--statuses--}}
        @if (auth()->user()->hasPermission('read_status'))
            <li><a class="app-menu__item {{ request()->segment(2) == 'status' ? 'active' : '' }}" href="{{ route('admin.status.index') }}"><i class="app-menu__icon fa-solid fa-list-check"></i> <span class="app-menu__label">@lang('status.status')</span></a></li>
        @endif

        {{--spares--}}
        @if (auth()->user()->hasPermission('read_spares'))
            <li><a class="app-menu__item {{ request()->segment(2) == 'spares' ? 'active' : '' }}" href="{{ route('admin.spares.index') }}"><i class="app-menu__icon fa-solid fa-server"></i> <span class="app-menu__label">@lang('spares.spares')</span></a></li>
        @endif

        {{--eirs--}}
        @if (auth()->user()->hasPermission('read_eirs'))
            <li><a class="app-menu__item {{ request()->segment(2) == 'eirs' ? 'active' : '' }}" href="{{ route('admin.eirs.index') }}"><i class="app-menu__icon fa fa-user"></i> <span class="app-menu__label">@lang('eirs.eirs')</span></a></li>
        @endif

        {{--request_parts--}}
        @if (auth()->user()->hasPermission('read_request_parts'))
            <li><a class="app-menu__item {{ request()->segment(2) == 'request_parts' ? 'active' : '' }}" href="{{ route('admin.request_parts.index') }}"><i class="app-menu__icon fa-solid fa-code-compare"></i> </i> <span class="app-menu__label">@lang('request_parts.request_parts')</span></a></li>
        @endif

        {{--maintenances--}}
        @if (auth()->user()->hasPermission('read_maintenances'))
            <li><a class="app-menu__item {{ request()->segment(2) == 'maintenances' ? 'active' : '' }}" href="{{ route('admin.maintenances.index') }}"><i class="app-menu__icon fa-solid fa-wrench"></i> <span class="app-menu__label">@lang('maintenances.maintenances')</span></a></li>
        @endif

        {{--fuels--}}
        @if (auth()->user()->hasPermission('read_fuels'))
            <li><a class="app-menu__item {{ request()->segment(2) == 'fuels' ? 'active' : '' }}" href="{{ route('admin.fuels.index') }}"><i class="app-menu__icon fa-solid fa-gas-pump"></i> <span class="app-menu__label">@lang('fuels.fuels')</span></a></li>
        @endif

        {{--insurances--}}
        @if (auth()->user()->hasPermission('read_insurances'))
            <li><a class="app-menu__item {{ request()->segment(2) == 'insurances' ? 'active' : '' }}" href="{{ route('admin.insurances.index') }}"><i class="app-menu__icon fa-solid fa-car-burst"></i> <span class="app-menu__label">@lang('insurances.insurances')</span></a></li>
        @endif

        {{--countrys--}}
        @if (auth()->user()->hasPermission('read_countrys'))
            <li><a class="app-menu__item {{ request()->segment(2) == 'countrys' ? 'active' : '' }}" href="{{ route('admin.countrys.index') }}"><i class="app-menu__icon fa-solid fa-flag"></i> <span class="app-menu__label">@lang('countrys.countrys')</span></a></li>
        @endif

        {{--countrys--}}
        @if (auth()->user()->hasPermission('read_citys'))
            <li><a class="app-menu__item {{ request()->segment(2) == 'citys' ? 'active' : '' }}" href="{{ route('admin.citys.index') }}"><i class="app-menu__icon fa-solid fa-city"></i> <span class="app-menu__label">@lang('citys.citys')</span></a></li>
        @endif

        {{--specs--}}
        @if (auth()->user()->hasPermission('read_specs'))
            <li><a class="app-menu__item {{ request()->segment(2) == 'specs' ? 'active' : '' }}" href="{{ route('admin.specs.index') }}"><i class="app-menu__icon fas fa-check-double"></i> <span class="app-menu__label">@lang('specs.specs')</span></a></li>
        @endif

        {{--roles--}}
        @if (auth()->user()->hasPermission('read_roles'))
            <li><a class="app-menu__item {{ request()->segment(2) == 'roles' ? 'active' : '' }}" href="{{ route('admin.roles.index') }}"><i class="app-menu__icon fa fa-lock"></i> <span class="app-menu__label">@lang('roles.roles')</span></a></li>
        @endif

        {{--admins--}}
        @if (auth()->user()->hasPermission('read_admins'))
            <li><a class="app-menu__item {{ request()->segment(2) == 'admins' ? 'active' : '' }}" href="{{ route('admin.admins.index') }}"><i class="app-menu__icon fa-solid fa-users"></i> <span class="app-menu__label">@lang('admins.admins')</span></a></li>
        @endif
    
        {{--admins--}}
{{--        @if (auth()->user()->hasPermission('read_email_systems'))--}}
            <li><a class="app-menu__item {{ request()->segment(2) == 'email_systems' ? 'active' : '' }}" href="{{ route('admin.email_systems.index') }}"><i class="app-menu__icon fa-solid fas fa-envelope"></i> <span class="app-menu__label">@lang('email_systems.email_systems')</span></a></li>
{{--        @endif--}}

        {{--statistics--}}
        <li class="treeview {{ request()->is('*combo_boxs*') || request()->is('*combo_boxs*')  ? 'is-expanded' : '' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-chart-area"></i><span class="app-menu__label">@lang('combo_boxs.combo_boxs')</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">

                <li><a class="treeview-item {{ request()->is('*combo_boxs*') ? 'active' : '' }}" href="{{ route('admin.combo_boxs.index') }}"><i class="icon fas fa-chart-line"></i>@lang('combo_boxs.combo_boxs')</a></li>

                @php
                    $combo_boxs = ['make', 'model', 'owner_ship', 'equipment', 'type', 'rental_basis', 'operator', 'responsible_person', 'responsible_person_email', 'allocated_to', 'project_allocated_to', 'insurer', 'location', 'non_scheduled', 'unit', 'fuel_type', 'spec_type'];
                @endphp

                @foreach ($combo_boxs as $combo)

                    <li><a class="treeview-item {{ request()->is('*combo_boxs*') ? 'active' : '' }}" href="{{ route('admin.combo_boxs.index', ['combo_boxs' => $combo]) }}">
                        <i class="icon fa-solid fa-table"></i>@lang('combo_boxs.' . $combo)</a>
                    </li>
                    
                @endforeach

            </ul>
        </li>

        {{--countrys--}}
        {{-- @if (auth()->user()->hasPermission('read_types'))
            <li><a class="app-menu__item {{ request()->is('*types*') ? 'active' : '' }}" href="{{ route('admin.types.index') }}"><i class="app-menu__icon fa-solid fa-hurricane"></i> <span class="app-menu__label">@lang('types.types')</span></a></li>
        @endif --}}

        

        {{--settings--}}
        @if (auth()->user()->hasPermission('read_settings'))
            <li class="treeview {{ request()->is('*settings*') ? 'is-expanded' : '' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cogs"></i><span class="app-menu__label">@lang('settings.settings')</span><i class="treeview-indicator fa fa-angle-right"></i></a>

                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="{{ route('admin.settings.general') }}"><i class="icon fa fa-circle-o"></i>@lang('settings.general')</a></li>
                </ul>
            </li>
        @endif

        {{--profile--}}
        <li class="treeview {{ request()->is('*profile*') || request()->is('*password*')  ? 'is-expanded' : '' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user-circle"></i><span class="app-menu__label">@lang('users.profile')</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{ route('admin.profile.edit') }}"><i class="icon fa fa-circle-o"></i>@lang('users.edit_profile')</a></li>
                <li><a class="treeview-item" href="{{ route('admin.profile.password.edit') }}"><i class="icon fa fa-circle-o"></i>@lang('users.change_password')</a></li>
            </ul>
        </li>

    </ul>
</aside>
