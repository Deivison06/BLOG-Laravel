@extends('master')

@section('header-intro')
    <div class="post-header text-center py-4 bg-light">
        @if ($post->thumb)
            <div class="post-banner mb-4">
                <img src="{{ asset($post->thumb) }}" alt="{{ $post->title }}" class="img-fluid rounded shadow">
            </div>
        @endif
        <h1 class="display-4 mb-3">{{ $post->title }}</h1>
        <p class="lead">
            <i class="fas fa-user-circle mr-2"></i> {{ $post->user->fullName }}
            <span class="mx-2">|</span>
            <i class="fas fa-comments mr-2"></i> {{ $post->comments->count() }} comentários
        </p>
    </div>
@endsection


@section('main')
    <article class="post-content my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <p class="card-text">{{ $post->content }}</p>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <hr class="my-5">

    @if (auth()->check())
        @if (session()->has('error_create_comment'))
            <div class="alert alert-danger text-center" role="alert">
                {{ session()->get('error_create_comment') }}
            </div>
        @endif

        <div class="comment-form mt-4 p-4 bg-light rounded">
            @if ($errors->has('comment'))
                <div class="alert alert-danger">{{ $errors->first('comment') }}</div>
            @endif

            <form action="{{ route('comment', $post->id) }}" method="post">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="form-group">
                    <textarea name="comment" class="form-control" rows="4" placeholder="Deixe seu comentário..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Comentar</button>
            </form>
        </div>
    @endif

    <div class="comments-section mt-4">
        <h4 class="mb-3">Comentários</h4>
        @forelse ($post->comments as $comment)
            <div class="comment mb-3 p-3 bg-white rounded shadow-sm">
                <p class="mb-1">{{ $comment->comment }}</p>
                <small class="text-muted">
                    Autor: {{ $comment->user->fullName }}
                    @if (auth()->check() && auth()->user()->id === $comment->user->id)
                        | <a href="{{ route('comment.destroy', $comment->id) }}" class="text-danger">Deletar</a>
                    @endif
                </small>
            </div>
        @empty
            <p class="text-muted">Nenhum comentário para esse post</p>
        @endforelse
    </div>


@endsection
