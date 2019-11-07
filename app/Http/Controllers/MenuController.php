<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Item;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $menu = Menu::pluck('name', 'id');
        // return view('menus.index') 
        // ->with(compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $menu = Menu::pluck('name', 'id');
        
        return view('menus.create')
        ->with(compact('menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }

    public function action(Request $request)
    {
        $items = null;
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
        else if($request->delete_id){
            $delete_id = $request->delete_id;
            $menu_id = $request->menu_id;
            Menu::find($menu_id)->items()->detach($delete_id);
            $items = Menu::find($menu_id)->items;
        }
        foreach ($items as $item) {
            $items .=    '<tr data-id=' . $item->id . ' class="active">
        <td>' . $item->id . '</td>
        <td>' . $item->name . '</td>
        <td width="35%">
        <button class="btn btn-danger btn-delete delete-product" id=' . $item->id . '>Delete</button>
        </td>
      </tr>';
        }
        $data = array(
            'items'  => $items
        );
        return response()->json($data);
    }
}
