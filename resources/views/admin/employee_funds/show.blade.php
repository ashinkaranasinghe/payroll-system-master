@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.employee-funds.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.employee-funds.fields.fund-name')</th>
                            <td field-key='fund_name'>{{ $employee_fund->fund_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.employee-funds.fields.employee-percentage')</th>
                            <td field-key='employee_percentage'>{{ $employee_fund->employee_percentage }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.employee-funds.fields.employer-percentage')</th>
                            <td field-key='employer_percentage'>{{ $employee_fund->employer_percentage }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.employee_funds.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


