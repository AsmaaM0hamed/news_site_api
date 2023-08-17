<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\post;
use Illuminate\Http\Request;

class posts extends Controller
{
    public function index()
    {
        return post::all();
    }

    public function store(Request $request)
    {
        post::create($request->all());

        return response(
         [   'msg'=>'create done',]
        );
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=post::find($id);
        $post->update($request->all());
        return response(
            [   'msg'=>'update done',]
           );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
            post::destroy($id);
            return response(
                [   'msg'=>'delet done',]
               );
    }
}
