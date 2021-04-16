<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function create(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'color' => 'max:15'
        ]);
        $blog = blog::create($validateData);
        return response()->json(['msg' => $blog]);

    }

    public function show()
    {
        $blog = blog::orderBy('id','DESC')->get();
        return response()->json(['blog' => $blog]);

    }
}
