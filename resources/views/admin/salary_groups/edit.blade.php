@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.salary-groups.title')</h3>
    
    {!! Form::model($salary_group, ['method' => 'PUT', 'route' => ['admin.salary_groups.update', $salary_group->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('quickadmin.salary-groups.fields.name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('maximum_leave_days', trans('quickadmin.salary-groups.fields.maximum-leave-days').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('maximum_leave_days', old('maximum_leave_days'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('maximum_leave_days'))
                        <p class="help-block">
                            {{ $errors->first('maximum_leave_days') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ot_rate', trans('quickadmin.salary-groups.fields.ot-rate').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('ot_rate', old('ot_rate'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ot_rate'))
                        <p class="help-block">
                            {{ $errors->first('ot_rate') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('salary', trans('quickadmin.salary-groups.fields.salary').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('salary', old('salary'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('salary'))
                        <p class="help-block">
                            {{ $errors->first('salary') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

