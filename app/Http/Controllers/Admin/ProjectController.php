<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Project;
use App\models\Technology;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $technologies = Technology::all();
        //dd($categories);
        return view('admin.projects.create', compact('categories', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreprojectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        
        $data = $request->all();

        $validator = Validator::make($data, [
            "title" => "required|unique:projects,title|min:5|max:100",
            "slug" => "nullable",
            "cover_image" => "nullable|image|max:300",
            "author" => "nullable|max:255",
            "deadline" => "nullable",
            "link" => "nullable",
            'category_id' => 'nullable|exists:categories,id',
        ]);

        if($validator->fails()){
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ]);
        }

        $newProject = new Project();
        $newProject->fill($data);
        $newProject->save();

        $newProject->technologies()->attach($request->technologies);

        return to_route("projects.index");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', ["project" => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $categories = Category::all();
        $technologies = Technology::all();
        return view("admin.projects.edit", [
            "project" => $project,
            "categories" => $categories,
            "technologies" => $technologies
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateprojectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
            if ($project->cover_image) {
                Storage::delete($project->cover_image);
            }
            
            $data = [
                'title' => $request['title'],
                'category_id' => $request["category_id"],
                'cover_image' => Storage::disk('public')->put('projects_img', $request->cover),
                'author' => $request['author'],
                'deadline' => $request['deadline'],
                'link' => $request['link'],
            ];
            
            $project->update($data);

            $project->technologies()->attach($request->technologies);

            return to_route('projects.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(project $project)
    {
        $project->delete();
        return to_route('projects.index');
    }
}
