@extends('app')

@section('title', $article->title)
@section('style')
    <link rel="stylesheet" href="/css/highlight/atom-one-dark.min.css">
    <link rel="stylesheet" href="/css/viewer.css" crossorigin="anonymous">
    
    
@endsection

@section('top-banner')
    <figure class="top-image" style="background-image: url(/storage/{{ $article->category->banner }});"></figure>
@endsection

@section('content')

    <article>
        <h1 class="title">{{ $article->title }}</h1>
        <div class="meta">
            <span class="category">
                <a target="_blank" href="{{ route('list.category', $article->category) }}">{{ $article->category->name }}</a>
            </span>
            <span class="dateline pipe">
                {{ $article->created_at->format('Y年n月j日 A g:i') }}
            </span>
            <span class="viewcount pipe">
                {{ $article->view_count }} 次浏览
            </span>
        </div>
        <div class="body">
            {!! $article->content !!}
        </div>
    </article>

@endsection


@section('script')
    <script src="/js/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>
    <script src="/js/viewer.js" crossorigin="anonymous"></script>
    <script src="/js/jquery-viewer.js"></script>
    <script>
        $(function () {
            var $images = $('article .body img[src^="/storage"]');
            $images.viewer({
                navbar: false,
                title: false,
                toolbar: false,
                tooltip: false,
                loop: false,
                keyboard: false,
                rotatable: false,
                scalable: false,
                slideOnTouch: false,
                className: 'abcccc'
            });
        });
    </script>

        

    
@endsection
