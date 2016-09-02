@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $article->title }}
                    </div>
                    <div class="panel-body">
                        {!! nl2br(e($article->body)) !!}
                    </div>
                    <div class="panel-footer">
                        {{ $article->user->name }}
                    </div>
                </div>
                <a href="{{ route('blog.home') }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
@endsection