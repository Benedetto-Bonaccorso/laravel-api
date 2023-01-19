@extends('layouts.app')

@section('content')

<h1><a href="{{route('technologies.create')}}" class="btn text-decoration-none bg-success text-white w-25 m-2">crea elementi</a></h1>

<div class="table-responsive m-2">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($technologies as $technology)
                <tr>
                    <td scope="row">{{$technology->id}}</td>
                    <td>{{$technology->name}}</td>
                    <td>
                        <a href="{{route('technologies.show', $technology->id)}}" class="btn bg-primary text-white w-100 my-2">View</a>    
                        
                        <a href="{{route('technologies.edit', $technology->id)}}" class="btn bg-dark text-white w-100 my-2">Edit</a>                             
                    
                        <form action="{{route('technologies.destroy', $technology->id)}}" method="post" class="">
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