@extends('layouts.app')

@section('content')
<div class="row">

    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('add_type', 'Add Event Type', ['class' => 'control-label']) !!}
            {!! Form::text('add_type', null,
            [
            'class' => 'form-control input-lg',
            'placeholder' => 'add type'
            ])
            !!}
        </div>
    </div>

    <div class="col-sm-3">
        <br>
        <button type="button" class="btn btn-info" id="addType">Add Type</button>
    </div>

</div>
<div class="col-md-5 col-md-offset-2">
    <table class="table table-striped table-hover ">
        <thead>
            <tr class="info">
                <th>ID </th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="types-list" name="types-list">

        </tbody>
    </table>
</div>
@endsection

@section('typeCRUDScripts')
<script>
    $(document).ready(function() {
        function showItem() {
            console.log('yo');
            $.ajax({
                type: 'POST',
                url: "{{ route('types.action') }}",
                data: {
                    get: true
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
                showItem();
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

        // $("#menu_id").change(function() {
        //     var menu_id = $(this).val();
        //     showItem(menu_id)
        // });
        showItem()
    });
</script>
@endsection