@extends('layouts.app')

@section('content')
    <h1><a href="{{route('projects.create')}}" class="btn text-decoration-none bg-success text-white w-25 m-2">crea elementi</a></h1>

    <div class="table-responsive m-2">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">title</th>
                    <th scope="col">slug</th>
                    <th scope="col">cathegory</th>
                    <th scope="col">cover image</th>
                    <th scope="col">author</th>
                    <th scope="col">deadline</th>
                    <th scope="col">link</th>
                    <th scope="col">actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                    <tr>
                        <td scope="row">{{$project->id}}</td>
                        <td>{{$project->title}}</td>
                        <td>{{$project->slug}}</td>
                        <td>{{$project->category_id}}</td>
                        <td><img src="{{asset('storage/' . $project->cover_image)}}" alt="{{$project->title}}"></td>
                        <td>{{$project->author}}</td>
                        <td>{{$project->deadline}}</td>
                        <td>{{$project->link}}</td>
                        <td>
                            <a href="{{route('projects.show', $project->id)}}" class="btn bg-primary text-white w-100 my-2">View</a>    
                            
                            <a href="{{route('projects.edit', $project->id)}}" class="btn bg-dark text-white w-100 my-2">Edit</a>                             
                        
                            <form action="{{route('projects.destroy', $project->id)}}" method="post" class="">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn bg-danger text-white w-100 my-2">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
@endsection