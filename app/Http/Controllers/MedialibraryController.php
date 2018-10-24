<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medialibrary;

class MedialibraryController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Medialibrary $media)
    {
        //

        //dd($request->media);
        if($request->hasFile('media')){

            $media->addMedia($request->media)->toMediaCollection('media');

            $media->name = request('name');

            $media->description = request('description');

            $media->save();

        }else if( empty(request('name')) && empty(request('description')) ){


            return back()->with('error', 'all fields are empty');

        }else{

            $media->name = request('name');

            $media->description = request('description');

            $media->save();

        }


        return back()->with('success', '1 item added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Medialibrary $media)
    {
        //

        $media->destroy($id);

        return back()->with('success', 'Element deleted :X');

    }
}
