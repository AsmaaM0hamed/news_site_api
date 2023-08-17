<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\post;
use App\Traits\image_upload;
use Illuminate\Http\Request;

class PostController extends Controller
{
 use image_upload;
    public function index()
    {
        //
        $posts=post::all();
        return view('dashboard.writer.posts.posts',compact('posts'));

    }


    public function create()
    {
        $categories=categorie::all();
        return view('dashboard.writer.posts.addposts',compact('categories'));
    }


    public function store(Request $request)
    {
        //
        $img= $this->StoreImage($request,'image','posts','image');

        post::create([
            'title'=>$request->name,
            'description'=>$request->description,
            'image'=>$img,
            'bady'=>$request->body,
            'categorie_id'=>$request->categorie_id,
        ]);
        return redirect()->route('posts.index')->with('add','posts done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
    }

    public function edit($id)
    {
        //
        $post=post::find($id);
        return view('dashboard.writer.posts.editposts',compact('post'));
    }


    public function update(Request $request, $id)
    {
        //
        if($request->has('image'))
        {
            // delet old image
            $img=post::where('id',$id)->value('image');
            $this->DeletImage('image','posts/'.$img);
            // save new image
            $img= $this->StoreImage($request,'image','posts','image');

            // update data base
            $post=post::find($id);
            $post->update([
                'title'=>$request->name,
            'description'=>$request->description,
            'image'=>$img,
            'bady'=>$request->body,
            ]);


        }
        else
        {
          // update data base
          $post=post::find($id);
          $post->update([
              'name'=>$request->name,
          'description'=>$request->description,
          'bady'=>$request->body,
          ]);

        }
        return redirect()->route('posts.index')->with('update','update done');
    }


    public function destroy($id)
    {
        $img=post::where('id',$id)->value('image');
        $this->DeletImage('image','posts/'.$img);

        post::destroy($id);
        return redirect()->back()->with('delete','delet done');
    }
}
