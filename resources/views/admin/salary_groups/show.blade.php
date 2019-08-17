@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.salary-groups.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.salary-groups.fields.name')</th>
                            <td field-key='name'>{{ $salary_group->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.salary-groups.fields.maximum-leave-days')</th>
                            <td field-key='maximum_leave_days'>{{ $salary_group->maximum_leave_days }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.salary-groups.fields.ot-rate')</th>
                            <td field-key='ot_rate'>{{ $salary_group->ot_rate }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.salary-groups.fields.salary')</th>
                            <td field-key='salary'>{{ $salary_group->salary }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#employees" aria-controls="employees" role="tab" data-toggle="tab">Employees</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="employees">
<table class="table table-bordered table-striped {{ count($employees) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.employees.fields.first-name')</th>
                        <th>@lang('quickadmin.employees.fields.last-name')</th>
                        <th>@lang('quickadmin.employees.fields.birthday')</th>
                        <th>@lang('quickadmin.employees.fields.contact-no')</th>
                        <th>@lang('quickadmin.employees.fields.employee-no')</th>
                        <th>@lang('quickadmin.employees.fields.epf-no')</th>
                        <th>@lang('quickadmin.employees.fields.salary-group')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($employees) > 0)
            @foreach ($employees as $employee)
                <tr data-entry-id="{{ $employee->id }}">
                    <td field-key='first_name'>{{ $employee->first_name }}</td>
                                <td field-key='last_name'>{{ $employee->last_name }}</td>
                                <td field-key='birthday'>{{ $employee->birthday }}</td>
                                <td field-key='contact__no'>{{ $employee->contact__no }}</td>
                                <td field-key='employee_no'>{{ $employee->employee_no }}</td>
                                <td field-key='epf_no'>{{ $employee->epf_no }}</td>
                                <td field-key='salary_group'>{{ $employee->salary_group->name ?? '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('employee_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.employees.restore', $employee->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('employee_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.employees.perma_del', $employee->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('employee_view')
                                    <a href="{{ route('admin.employees.show',[$employee->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('employee_edit')
                                    <a href="{{ route('admin.employees.edit',[$employee->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('employee_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.employees.destroy', $employee->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="12">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.salary_groups.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


