<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::orderBy('id', 'desc')->paginate(8);
        return view('types.index')
        ->with(compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = Type::updateOrCreate(
        [ 'id' => $request->type_id ],
        [  'name' => $request->name ]
        );
        return Response::json($type);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return Response::json($type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();
    }

    public function action(Request $request)
    {
        $items = null;
        if($request->get){
            $items = Type::all();
        }
        if($request->add){
            $item_name = $request->add;
            $menu_id = $request->menu_id;
            $item = new Item();
            $item->name = $item_name;
            $item->menu_id = $menu_id;
            $item->save();
            $items = Menu::find($menu_id)->items;
        }
        
        else if ($request->menu_id) {
            $menu_id = $request->menu_id;
            $items = Menu::find($menu_id)->items;
        }
        if($items){
            foreach ($items as $item) {
                $items.=    '<tr id="item' . $item->id . ' class="active">
            <td>' . $item->id . '</td>
            <td>' . $item->name . '</td>
            <td width="35%">
            <button
            class="btn btn btn-danger" id = "Item" value=' . $item->id . '>Delete</button>
            <button
            class="btn btn btn-danger" id = "deleteItem" value=' . $item->id . '>Delete</button>
            </td>
          </tr>';
            }
        }
        else{
           $items.= '<tr id="item' .' class="active">
            <td> No item to show' .'</td>
          </tr>';
        }

        $data = array(
            'items'  => $items
        );
        return response()->json($data);
    }
}
