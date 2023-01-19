@extends('layouts.app')

@section('content')

    <h1 class="m-4">Use the form below to create a new technology</h1>

    <form action="{{route('technologies.store')}}" method="post" enctype="multipart/form-data">
        
        @csrf

        <div class="form-group m-4">
            <label for="name">name</label>
            <input type="name" title="name" name="name" id="name" value="{{old('name')}}">

            <button type="submit">submit</button>
        </div>
    </form>
@endsection