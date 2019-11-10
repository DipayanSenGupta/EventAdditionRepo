@extends('layouts.app')

@section('content')
<div class="row">
    {!! Form::open(['route' => 'event-menus.store'], ['class' => 'form']) !!}

    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('menu_id', 'Menu Type' . ':*') !!}
            {!! Form::select('menu_id', $menus, 1,['class' => 'form-control select2', 'placeholder' =>'Select Menu Type','required']); !!}
        </div>
    </div>

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

    <div class="clearfix"></div>

    <div class="col-sm-3">
        <div class="form-group">

            {!! Form::label('add_extra_item', 'Add Extra item (exclusive to the event)', ['class' => 'control-label']) !!}
            {!! Form::text('add_extra_item', null,
            [
            'class' => 'form-control input-lg',
            'placeholder' => 'add extra item'
            ])
            !!}
        </div>
    </div>


    <div class="col-sm-3">
        <div class="form-group">

            {!! Form::label('event_name', 'Event Name', ['class' => 'control-label']) !!}
            {!! Form::text('event_name', null,
            [
            'class' => 'form-control input-lg',
            'placeholder' => 'Event Name'
            ])
            !!}
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('attendences', 'Attendence', ['class' => 'control-label']) !!}
            {!! Form::text('attendences', null,
            [
            'class' => 'form-control input-lg',
            'placeholder' => 'attendences'
            ])
            !!}
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
    <div class="col-md-3 col-md-offset-2">
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

    <div class="col-md-3 col-md-offset-2">
        <table class="table table-striped table-hover ">
            <thead>
                <tr class="info">
                    <th>ID </th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="added-items-list" name="added-items-list">

            </tbody>
        </table>
    </div>

    <div class="clearfix"></div>
    <div class="form-group">
        {!! Form::submit('Add Event',
        ['class' => 'btn btn-info btn-lg',
        'style' => 'width:100%'
        ])
        !!}
    </div>
    {!! Form::close() !!}
</div>
</div>

@endsection
@section('customScripts')
<script>
    $(document).ready(function() {
        function showItem(menu_id = "1") {
            $.ajax({
                type: 'POST',
                url: "{{ route('eventMenus.action') }}",
                data: {
                    menu_id: menu_id,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    $('#items-list').html(data.items);
                    if (data.addedItems) {
                        $('#added-items-list').html(data.addedItems);
                    }
                }
            });
        }

        $("#menu_id").change(function() {
            var menu_id = $(this).val();
            showItem(menu_id)
        });
        showItem();

        function addEvent(event_name, menu_id) {
            $.ajax({
                type: 'POST',
                url: "{{ route('eventMenus.action') }}",
                data: {
                    event_name: event_name,
                    menu_id: menu_id,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {}
            });
        }

        $("#event_name").on('keypress', function(e) {
            var event_name = $(this).val();
            var menu_id = $("#menu_id").val();
            if (e.which == 13) {
                e.preventDefault();
                addEvent(event_name, menu_id);
            }
        });

        function addItem(item_id, menu_id) {
            $.ajax({
                type: 'POST',
                url: "{{ route('eventMenus.action') }}",
                data: {
                    add: item_id,
                    menu_id: menu_id,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    $('#items-list').html(data.items);
                    if (data.addedItems) {
                        $('#added-items-list').html(data.addedItems);
                    }
                }
            });
        }

        $(document).on('click', "#addItem", function(e) {
            try {
                var item_id = $(this).val();;
                var menu_id = $("#menu_id").val();
                addItem(item_id, menu_id);
            } catch (ex) {
                alert('An error occurred and I need to write some code to handle this!');
            }
            e.preventDefault();
        });

        function addExtraItem(add_extra_item, menu_id) {
            $.ajax({
                type: 'POST',
                url: "{{ route('eventMenus.action') }}",
                data: {
                    add_extra_item: add_extra_item,
                    menu_id: menu_id,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    $('#items-list').html(data.items);
                    console.log(data);
                    if (data.addedItems) {
                        $('#added-items-list').html(data.addedItems);
                    }
                }
            });
        }

        $("#add_extra_item").on('keypress', function(e) {
            if (e.which == 13) {
                var add_extra_item = $(this).val();
                var menu_id = $("#menu_id").val();
                e.preventDefault();
                addExtraItem(add_extra_item, menu_id);
            }
        });


        function deleteItem(item_id, menu_id) {
            $.ajax({
                type: 'POST',
                url: "{{ route('eventMenus.action') }}",
                data: {
                    delete: item_id,
                    menu_id: menu_id,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    $('#items-list').html(data.items);
                    if (data.addedItems) {
                        $('#added-items-list').html(data.addedItems);
                    }
                }
            });
        }

        $(document).on('click', "#deleteItem", function(e) {
            try {
                var item_id = $(this).val();
                var menu_id = $("#menu_id").val();
                deleteItem(item_id, menu_id);
            } catch (ex) {
                alert('An error occurred and I need to write some code to handle this!');
            }
            e.preventDefault();
        });
    });
</script>
@endsection