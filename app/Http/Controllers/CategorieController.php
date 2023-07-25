<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Traits\image_upload;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
use image_upload;
    public function index()
    {
        //
        $cats=categorie::all();
        return view('dashboard.writer.categories.categories',compact('cats'));
    }




    public function store(Request $request)
    {

       $img= $this->StoreImage($request,'image','categories','image');

        categorie::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$img,
        ]);
        return redirect()->back()->with('add','create done');
    }




    public function edit($id)
    {
        //
        $categorie=categorie::find($id);
        return view('dashboard.writer.categories.editcategories',compact('categorie'));
    }


    public function update(Request $request, $id)
    {
        if($request->has('image'))
        {
            // delet old image
            $img=categorie::where('id',$id)->value('image');
            $this->DeletImage('image','categories/'.$img);
            // save new image
            $img= $this->StoreImage($request,'image','categories','image');

            // update data base
            $categorie=categorie::find($id);
            $categorie->update([
                'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$img,
            ]);
            return redirect()->route('categories.index')->with('edit','update done');

        }
        else
        {
          // update data base
          $categorie=categorie::find($id);
          $categorie->update([
              'name'=>$request->name,
          'description'=>$request->description,

          ]);
          return redirect()->route('categories.index')->with('update','update done');
        }
    }


    public function destroy($id)
    {
        $img=categorie::where('id',$id)->value('image');
        $this->DeletImage('image','categories/'.$img);

        categorie::destroy($id);
        return redirect()->back()->with('delete','delet done');
    }
}
