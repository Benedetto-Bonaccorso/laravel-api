@extends('layouts.app')

@section('content')
    <div class="project-info py-4">
        <h1 class="m-2">Project ID: {{$project->id}}</h1>
        <div class="m-2"><h1>Project Image: </h1><img src="{{asset('storage/' . $project->cover_image)}}" alt="{{$project->title}}"></div>
        <div class="category m-2">
            <h3>Category: {{ $project->category ? $project->category->name : 'Uncategorized'}}</h3>
            
        </div>
        <h3 class="m-2">Project Title: {{$project->title}}</h3>
        <h3 class="m-2">Project Author: {{$project->author}}</h3>
        <h3 class="m-2">Project Deadline: {{$project->deadline}}</h3>
    </div>
@endsection