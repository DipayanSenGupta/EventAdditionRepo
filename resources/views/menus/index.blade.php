@extends('layouts.app')

@section('content')
<div class="row">
    {!! Form::open(['route' => 'events.store'], ['class' => 'form']) !!}
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('type', 'Event Type' . ':*') !!}
            {!! Form::select('type', ['Bia' => __('Bia'), 'Holud' => 'Holud'], null, ['class' => 'form-control select2', 'placeholder' =>'Select Event Type', 'required']); !!}
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('venu', 'Venue Type' . ':*') !!}
            {!! Form::select('venue', ['Sena Maloncho' => __('Sena Maloncho'), 'PSC' => 'PSC', 'RAWA' => 'RAWA'], null, ['class' => 'form-control select2', 'placeholder' => 'Select Event Type', 'required']); !!}
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
            {!! Form::label('menu_id', 'Menu Type' . ':*') !!}
            {!! Form::select('menu_id', $menu, null,['class' => 'form-control select2', 'placeholder' =>'Select Menu Type','required']); !!}


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
                {!! Form::text('booking_time', null, ['class' => 'form-control', 'readonly','required']); !!}
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
    <div class="clearfix"></div>

    <div class="col-sm-3">
        <div class="form-group">

            {!! Form::label('add_item', 'Add Item', ['class' => 'control-label']) !!}
            {!! Form::text('add_item', null,
            [
            'class' => 'form-control input-lg',
            'placeholder' => 'add item'
            ])
            !!}
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="col-md-5 col-md-offset-2">
        <table class="table table-striped table-hover ">
            <thead>
                <tr class="info">
                    <th>ID </th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="items-list" name="items-list">

            </tbody>
        </table>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-3 col-md-offset-3">
        <!-- <button type="button" id="submit" class="btn btn-primary">Submit</button> -->
        <div class="form-group">
            {!! Form::submit('Add Customer',
            ['class' => 'btn btn-info btn-lg',
            'style' => 'width:100%'
            ])
            !!}

        </div>
    </div>

    {!! Form::close() !!}
</div>
</div>

@endsection
