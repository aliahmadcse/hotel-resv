<?php

namespace App\Http\Controllers;

use App\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Cache::get('key');
        return view('roomTypes.index')
            ->with('roomTypes', RoomType::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function show(RoomType $roomType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomType $roomType)
    {
        return view('roomTypes.edit')
            ->with('roomType', $roomType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoomType $roomType)
    {
        $roomType->picture = $request->file('picture')->store('uploads', 'public');

        // for testing purpose
        // $roomType->picture = Storage::putFile(
        //     'public',
        //     $request->file('picture')
        // );

        $roomType->save();
        return redirect()->action('RoomTypeController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomType $roomType)
    {
        //
    }
}
