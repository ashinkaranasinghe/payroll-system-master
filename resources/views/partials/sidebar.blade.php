@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
            
            @can('salary_group_access')
            <li>
                <a href="{{ route('admin.salary_groups.index') }}">
                    <i class="fa fa-group"></i>
                    <span>@lang('quickadmin.salary-groups.title')</span>
                </a>
            </li>@endcan
            
            @can('employee_access')
            <li>
                <a href="{{ route('admin.employees.index') }}">
                    <i class="fa fa-user"></i>
                    <span>@lang('quickadmin.employees.title')</span>
                </a>
            </li>@endcan
            
            @can('import_attendance_access')
            <li>
                <a href="{{ route('admin.import_attendances.create') }}">
                    <i class="fa fa-calendar"></i>
                    <span>@lang('quickadmin.import-attendance.title')</span>
                </a>
            </li>@endcan
            
            @can('employee_fund_access')
            <li>
                <a href="{{ route('admin.employee_funds.index') }}">
                    <i class="fa fa-money"></i>
                    <span>@lang('quickadmin.employee-funds.title')</span>
                </a>
            </li>@endcan
            

            

            



            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('quickadmin.qa_change_password')</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>

