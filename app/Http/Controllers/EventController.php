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
        $item = new DemoItem();

        if ($request->text) {
            $item->name = $request->text;
            $item->save();
            $itemsInserted = DemoItem::all();
        } else {
            $itemsInserted = DemoItem::all();
        }
        foreach ($itemsInserted as $item) {
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
    public function itemDel($id)
    {
        DemoItem::find($id)->delete($id);
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
