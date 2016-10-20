<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Autors;
use Validator;

class AuthorsController extends Controller
{
    public function index()
    {
        $authors = Autors::all();
        return response()->json($authors);
    }

    public function insert(Request $request)
    {
        $params = $request->all();

        $validator = Validator::make($params,[
                'name' => 'required|max:100|unique:authors',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'author name invalid or exists'
            ]);
        } else {
            Autors::create($params);
            $authors = Autors::all();
            //        $author = new Autors();
            //        $author->name = $params['name'];
            //        $author->save();
            return response()->json([
                'status' => 'success',
                'message' => 'author name is ok',
                'result' => $authors
            ]);
        }





    }
}
