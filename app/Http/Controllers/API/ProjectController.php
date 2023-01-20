<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(){
        return response()->json([
            "success" => true,
            "results" => Project::paginate(9)
        ]);
    }

        /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($slug){
        if($slug){
            return response()->json([
                "success" => true,
                "results" => Project::where('slug', $slug)->first()
            ]);
        } else {
            return response()->json([
                "results" => "a"
            ]);
        }
        
    }
}
