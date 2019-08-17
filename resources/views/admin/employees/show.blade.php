@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.employees.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.employees.fields.first-name')</th>
                            <td field-key='first_name'>{{ $employee->first_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.employees.fields.last-name')</th>
                            <td field-key='last_name'>{{ $employee->last_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.employees.fields.birthday')</th>
                            <td field-key='birthday'>{{ $employee->birthday }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.employees.fields.contact-no')</th>
                            <td field-key='contact__no'>{{ $employee->contact__no }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.employees.fields.employee-no')</th>
                            <td field-key='employee_no'>{{ $employee->employee_no }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.employees.fields.epf-no')</th>
                            <td field-key='epf_no'>{{ $employee->epf_no }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.employees.fields.salary-group')</th>
                            <td field-key='salary_group'>{{ $employee->salary_group->name ?? '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.employees.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop

@section('javascript')
    @parent

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });
            
            $('.date').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "{{ App::getLocale() }}",
            });
            
        });
    </script>
            
@stop
