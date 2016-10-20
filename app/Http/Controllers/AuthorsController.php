<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AuthorsController extends Controller
{
    public function index()
    {
        return view('authors.index');
    }
}
