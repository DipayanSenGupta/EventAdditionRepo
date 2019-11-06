@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
        {!! Form::open(['route' => 'events.store', 'method' => 'post'], ['class' => 'form']) !!}

        <div class="form-group">

            {!! Form::label('refNo', 'Ref No', ['class' => 'control-label']) !!}
            {!! Form::text('refNo', null,
            [
            'class' => 'form-control input-lg',
            'placeholder' => 'Ref No'
            ])
            !!}
        </div>

        <div class="form-group">
            {!! Form::label('customer_name', 'Customer Name',
            ['class' => 'control-label'])
            !!}
            {!! Form::text('customer_name', null,
            [
            'class' => 'form-control input-lg',
            'placeholder' => 'Customer Name'
            ])
            !!}
        </div>

        <div class="form-group">
            {!! Form::label('city', 'City',
            ['class' => 'control-label'])
            !!}
            {!! Form::text('city', null,
            [
            'class' => 'form-control input-lg',
            'placeholder' => 'City'
            ])
            !!}
        </div>


        <div class="form-group">
            {!! Form::label('country', 'Country',
            ['class' => 'control-label'])
            !!}
            {!! Form::text('country', null,
            [
            'class' => 'form-control input-lg',
            'placeholder' => 'Country'
            ])
            !!}
        </div>

        <div class="form-group">
            {!! Form::label('telephone', 'Telephone',
            ['class' => 'control-label'])
            !!}
            {!! Form::text('telephone', null,
            [
            'class' => 'form-control input-lg',
            'placeholder' => 'Telephone number'
            ])
            !!}
        </div>

        <div class="form-group">
            {!! Form::label('mobile', 'Mobile',
            ['class' => 'control-label'])
            !!}
            {!! Form::text('mobile', null,
            [
            'class' => 'form-control input-lg',
            'placeholder' => 'Mobile number'
            ])
            !!}
        </div>

        <div class="form-group">
            {!! Form::label('fax', 'Fax',
            ['class' => 'control-label'])
            !!}
            {!! Form::text('fax', null,
            [
            'class' => 'form-control input-lg',
            'placeholder' => 'Fax number'
            ])
            !!}
        </div>

        <div class="form-group">
            {!! Form::label('contact_person', 'Contact Person',
            ['class' => 'control-label'])
            !!}
            {!! Form::text('contact_person', null,
            [
            'class' => 'form-control input-lg',
            'placeholder' => 'Contact Person'
            ])
            !!}
        </div>

        <div class="form-group">
            {!! Form::label('email_id', 'Email id',
            ['class' => 'control-label'])
            !!}
            {!! Form::text('email_id', null,
            [
            'class' => 'form-control input-lg',
            'placeholder' => 'Email id'
            ])
            !!}
        </div>

        <div class="form-group">
            {!! Form::label('address', 'Address',
            ['class' => 'control-label'])
            !!}
            {!! Form::textarea('address', null,
            [
            'class' => 'form-control input-lg',
            'placeholder' => 'Address'
            ])
            !!}
        </div>

        <div class="form-group">
            {!! Form::label('bank_name', 'Bank name',
            ['class' => 'control-label'])
            !!}
            {!! Form::text('bank_name', null,
            [
            'class' => 'form-control input-lg',
            'placeholder' => 'Bank name'
            ])
            !!}
        </div>

        <div class="form-group">
            {!! Form::label('account_number', 'Account number',
            ['class' => 'control-label'])
            !!}
            {!! Form::text('account_number', null,
            [
            'class' => 'form-control input-lg',
            'placeholder' => 'account number'
            ])
            !!}
        </div>

        <div class="form-group">
            {!! Form::label('account_details', 'Account details',
            ['class' => 'control-label'])
            !!}
            {!! Form::textarea('account_details', null,
            [
            'class' => 'form-control input-lg',
            'placeholder' => 'Account details'
            ])
            !!}
        </div>

        <div class="form-group">
            {!! Form::label('swift_code', 'Swift code',
            ['class' => 'control-label'])
            !!}
            {!! Form::text('swift_code', null,
            [
            'class' => 'form-control input-lg',
            'placeholder' => 'Swift Code'
            ])
            !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Add Customer',
            ['class' => 'btn btn-info btn-lg',
            'style' => 'width:100%'
            ])
            !!}

        </div>

        {!! Form::close() !!}
    </div>
</div>

@endsection