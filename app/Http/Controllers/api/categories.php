<?php

namespace App\Http\Controllers\api;

use App\Models\categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\categoriesresource;

class categories extends Controller
{
      public function index(Request $request)
    {
        //
            $cats=categorie::all();
        return categoriesresource::collection($cats);
    }
    public function show($id)
    {
        $cat= categorie::find($id);
        return new categoriesresource($cat);

    }
    

}
