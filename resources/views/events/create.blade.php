@extends('layouts.app')

@section('content')
<div class="row">
    {!! Form::open(['route' => 'events.store'], ['class' => 'form']) !!}
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('type', 'Type' . ':*') !!}
            {!! Form::select('type', ['Bia' => __('Bia'), 'Holud' => 'Holud'], null, ['class' => 'form-control select2', 'placeholder' => __('Select Event Type'), 'required']); !!}
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('venu', 'Type' . ':*') !!}
            {!! Form::select('venue', ['Sena Maloncho' => __('Sena Maloncho'), 'PSC' => 'PSC', 'RAWA' => 'RAWA'], null, ['class' => 'form-control select2', 'placeholder' => __('Select Event Type'), 'required']); !!}
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">

            {!! Form::label('attendence', 'Attendence', ['class' => 'control-label']) !!}
            {!! Form::text('attendence', null,
            [
            'class' => 'form-control input-lg',
            'placeholder' => 'attendence'
            ])
            !!}
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('menu', 'Type' . ':*') !!}
            {!! Form::select('menu', $menu, null, ['class' => 'form-control select2', 'placeholder' => __('Select Menu'), 'required']); !!}
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('booking_time', 'Booking Time'. ':*') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </span>
                {!! Form::text('booking_time', null, ['class' => 'form-control', 'readonly', 'required']); !!}
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('event_time', 'Event Time'. ':*') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </span>
                {!! Form::text('event_time', null, ['class' => 'form-control', 'readonly', 'required']); !!}
            </div>
        </div>
    </div>




    {!! Form::close() !!}
</div>
</div>



@endsection