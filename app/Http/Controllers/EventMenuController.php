<?php

namespace App\Http\Controllers;

use App\EventMenu;
use App\Menu;

use Illuminate\Http\Request;

class EventMenuController extends Controller
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
        $menus = Menu::pluck('name', 'id');

        return view('eventMenus.create')
            ->with(compact('menus'));
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
     * @param  \App\EventMenu  $eventMenu
     * @return \Illuminate\Http\Response
     */
    public function show(EventMenu $eventMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EventMenu  $eventMenu
     * @return \Illuminate\Http\Response
     */
    public function edit(EventMenu $eventMenu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EventMenu  $eventMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventMenu $eventMenu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventMenu  $eventMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventMenu $eventMenu)
    {
        //
    }
    public function action(Request $request){

    }
}
