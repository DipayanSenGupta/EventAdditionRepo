<?php

namespace App\Http\Controllers;

use App\Event;
use App\Menu;
use App\DemoItem;
use Illuminate\Http\Request;
use DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = Menu::pluck('name', 'id');

        return view('events.create')
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
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
    public function action(Request $request)
    {
        $items = null;

        if ($request->text) {
            $item = new DemoItem();
            $item->name = $request->text;
            $item->save();
            $itemsInserted = DemoItem::all();
            // $menu_id = $request->menu_id;
            // $itemsFetched = Menu::find($menu_id)->items;
            $id =0;
            foreach ($itemsInserted as $item) {
                $items .=    '<tr id=item' .$id . ' class="active">
                <td>' . $id . '</td>
                <td>' . $item->name . '</td>
                <td width="35%">
                <button class="btn btn-warning btn-detail open_modal" value=' . $item->id . '>Edit</button>
                <button class="btn btn-danger btn-delete delete-product" value=' . $item->id . '>Delete</button>
                </td>
              </tr>';
            $id++;
            }
        }
        $data = array(
            'items'  => $items
        );

        return response()->json($data);
    }
}
