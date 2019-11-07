@extends('layouts.app')

@section('content')
<div class="row">
    {!! Form::open(['route' => 'menus.store'], ['class' => 'form']) !!}

    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('menu_id', 'Menu Type' . ':*') !!}
            {!! Form::select('menu_id', $menu, 1,['class' => 'form-control select2', 'placeholder' =>'Select Menu Type','required']); !!}


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
@section('customScripts')
<script>
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

        $("#add_item").on('keypress', function(e) {
            e.preventDefault();
            if (e.which == 13) {
                var itemName = $(this).val();
                var menu_id = $("#menu_id").val();
                console.log(menu_id);

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
        });
        $('.delete-product').click(function() {
            e.preventDefault();
            var product_id = $(this).attr("id")
            $.ajax({
                type: "DELETE",
                url: "{{ route('menus.action') }}",
                data: {
                    delete_id: product_id,
                    menu_id: menu_id,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    console.log(data);
                    addItem(null);
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });

        $("#menu_id").change(function() {
            var menu_id = $(this).val();
            showItem(menu_id)
        });
        showItem();
    });
</script>
@endsection