@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('HomePage') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Grazie ') }}{{ Auth::user()->name }} {{ __('per aver effettuato il log in') }}
                    
                    <hr>

                    <p>Clicca qui per andare all'indice dei tuoi progetti: <a href="{{route('projects.index')}}" class="btn bg-primary text-white">Indice progetti</a></p>
                    <p>Clicca qui per andare all'indice delle tecnologie: <a href="{{route('technologies.index')}}" class="btn bg-primary text-white">Indice tecnologie</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
