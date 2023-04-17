<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Create new project
     * 
     */
    public function create(Request $request){
        return response()->json(['status'=> true, 'data'=> $request->all()]);
    }
}
