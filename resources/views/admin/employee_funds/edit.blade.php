@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.employee-funds.title')</h3>
    
    {!! Form::model($employee_fund, ['method' => 'PUT', 'route' => ['admin.employee_funds.update', $employee_fund->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('fund_name', trans('quickadmin.employee-funds.fields.fund-name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('fund_name', old('fund_name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('fund_name'))
                        <p class="help-block">
                            {{ $errors->first('fund_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('employee_percentage', trans('quickadmin.employee-funds.fields.employee-percentage').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('employee_percentage', old('employee_percentage'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('employee_percentage'))
                        <p class="help-block">
                            {{ $errors->first('employee_percentage') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('employer_percentage', trans('quickadmin.employee-funds.fields.employer-percentage').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('employer_percentage', old('employer_percentage'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('employer_percentage'))
                        <p class="help-block">
                            {{ $errors->first('employer_percentage') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

