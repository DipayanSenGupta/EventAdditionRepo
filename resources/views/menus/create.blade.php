@extends('layouts.app')

@section('content')
<div class="row">
    {!! Form::open(['route' => 'menus.store'], ['class' => 'form']) !!}

    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('menu_id', 'Menu (Active)' . ':*') !!}
            {!! Form::select('menu_id', $menus, 1,['class' => 'form-control select2', 'placeholder' =>'Select Menu Type','required']); !!}
        </div>
    </div>


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

    <div class="col-sm-3">
        <div class="form-group">

            {!! Form::label('add_menu', 'Add Menu', ['class' => 'control-label']) !!}
            {!! Form::text('add_menu', null,
            [
            'class' => 'form-control input-lg',
            'placeholder' => 'add Menu'
            ])
            !!}
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="col-sm-3">
        <div class="form-group">

            {!! Form::label('change_menu_name', 'Change Menu Name', ['class' => 'control-label']) !!}
            {!! Form::text('change_menu_name', null,
            [
            'class' => 'form-control input-lg',
            'placeholder' => 'add Menu'
            ])
            !!}
        </div>
    </div>
    <div class="col-sm-3">
        <br>
        <button type="button" class="btn btn-danger" id="MenuDelete">Menu Delete</button>
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

    {!! Form::close() !!}
</div>
</div>

@endsection
@section('customScripts')
<script>
        $('#booking_time').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });

    $('#event_time').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
    $(document).ready(function() {
        function showItem(menu_id = "1") {
            $.ajax({
                type: 'POST',
                url: "{{ route('menus.action') }}",
                data: {
                    menu_id: menu_id,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    $('#items-list').html(data.items);
                }
            });
        }

        function addItem(menu_id, itemName) {
            $.ajax({
                type: 'POST',
                url: "{{ route('menus.action') }}",
                data: {
                    add: itemName,
                    menu_id: menu_id,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    $('#items-list').html(data.items);
                }
            });
        }


        function addMenu(menuName) {
            $.ajax({
                type: 'POST',
                url: "{{ route('menus.action') }}",
                data: {
                    menuName: menuName,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    $('#items-list').html(data.items);
                    if (data.newMenuId) {
                        $('#menu_id').append($('<option>', {
                            value: data.newMenuId,
                            text: data.newMenuName
                        }));
                        $("#menu_id").val(data.newMenuId)
                        showItem(data.newMenuId);
                    }
                }
            });
        }

        function changeMenuName(menu_id, new_menu_name) {
            $.ajax({
                type: 'POST',
                url: "{{ route('menus.action') }}",
                data: {
                    new_menu_name: new_menu_name,
                    menu_id: menu_id,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    $('#items-list').html(data.items);
                    if (data.newMenuName) {
                        console.log(typeof(data.newMenuName));
                        $("#menu_id").find("option:selected").text(data.newMenuName);
                        showItem(data.newMenuId);
                    }
                }
            });
        }

        function deleteItem(itemId, menu_id) {
            console.log(itemId);

            $.ajax({
                type: 'POST',
                url: "{{ route('menus.action') }}",
                data: {
                    itemId: itemId,
                    menu_id: menu_id,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    $('#items-list').html(data.items);
                }
            });
        }
        $("#add_item").on('keypress', function(e) {
            if (e.which == 13) {
                var itemName = $(this).val();
                var menu_id = $("#menu_id").val();
                console.log(menu_id);
                e.preventDefault();
                addItem(menu_id, itemName);
            }
        });

        $("#add_menu").on('keypress', function(e) {
            var menuName = $(this).val();
            if (e.which == 13) {

                var itemName = $(this).val();
                e.preventDefault();
                addMenu(menuName);
            }
        });

        $("#change_menu_name").on('keypress', function(e) {
            if (e.which == 13) {
                var new_menu_name = $(this).val();
                var menu_id = $("#menu_id").val();
                e.preventDefault();
                changeMenuName(menu_id, new_menu_name);
            }
        });

        $(document).on('click', "#deleteItem", function(e) {
            try {
                var itemId = $(this).val();;
                var menu_id = $("#menu_id").val();
                deleteItem(itemId, menu_id);
            } catch (ex) {
                alert('An error occurred and I need to write some code to handle this!');
            }
            e.preventDefault();
        });

        $("#menu_id").change(function() {
            var menu_id = $(this).val();
            showItem(menu_id)
        });
        showItem();
    });
</script>
@endsection