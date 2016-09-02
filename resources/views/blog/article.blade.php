@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>
                    {{ $article->title }}
                </h1>
                <div>
                    {{ $article->body }}
                </div>
                <div>
                    {{ $article->user->name }}
                </div>
                <a href="{{ route('blog.home') }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
@endsection