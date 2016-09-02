@extends('layouts.app')

@section('header')
<script type="text/javascript">
$(function () {
   $('.articles').on('click', '.btnDelete', function () {
       $.ajax({
           method: "POST",
           url: "{{ route('blog.api.article.delete') }}",
           data: {
               article: $(this).data('id'),
               _token: "{{ csrf_token() }}"
           },
           success: function() {
               alert( "Delete Success!");
               window.location = "{{ route('blog.home') }}";
           }
       });

       return false;
   })
});
</script>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>
                    Articles
                </h1>
                <div>
                    <a href="{{ route('blog.article.add') }}" class="btn btn-primary">New Article</a>
                </div>
                <div class="articles">
                    @foreach($articles as $article)
                        <li>
                            <a href="{{ route('blog.article', ['article'=>$article->id])  }}">
                                {{ $article->title }}
                            </a>
                            {{ $article->user->name }}
                            @if($article->user->id == \Illuminate\Support\Facades\Auth::user()->id)
                                <a href="{{ route('blog.article.edit', ['article'=>$article->id])  }}">
                                    Edit
                                </a>
                                <a class="btnDelete" data-id="{{ $article->id }}">
                                    Delete
                                </a>
                            @endif
                        </li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection