@extends('app')

@section('title', isset($category) ? $category->name : '首页 - '.config('app.name'))

@section('top-banner')
    <figure class="top-image" style="background-image: url( @if(isset($category))/storage/{{ $category->banner }} @else /image/top-banner-index.jpg @endif );"></figure>
@endsection

@section('content')

    @if(!empty($category))
        <div class="category-header">
            <h2>
                <i class="iconfont icon-yuandianxiao"></i> {{ $category->name }}
            </h2>
        </div>
    @endif


    <div class="article-container">
        @if($articles->isNotEmpty())
            @foreach($articles as $article)
                <div class="item">
                    <div class="time-image">
                        <div class="datetime">
                            {{ $article->created_at->format('d') }}
                            <span>{{ $article->created_at->format('Y年 - m月') }}</span>
                        </div>
                        <div class="preview">
                            <a href="{{ route('article.show', $article) }}">
                                <img src="/storage/{{ $article->thumb }}" alt="{{ $article->title }}">
                            </a>
                        </div>
                    </div>
                    <div class="content">
                        <h2 class="title">
                            <a href="{{ route('article.show', $article) }}">{{ $article->title }}</a>
                        </h2>
                        <div class="meta">
                            <span class="category">
                                <a href="{{ route('list.category', $article->category) }}">{{ $article->category->name }}</a>
                            </span>
                            <span class="dateline pipe">
                                {{ $article->created_at->format('Y年n月j日 A g:i') }}
                            </span>
                            <span class="viewcount pipe">
                                {{ $article->view_count }} 次浏览
                            </span>
                        </div>
                        <div class="summary">
                            {!! strip_tags(Str::limit($article->content, 300)) !!}
                        </div>
                    </div>
                </div>
            @endforeach
            @if (!request()->routeIs('article.search'))
                <div class="pagination">
                    <a class="loadmore" id="loadmore" href="javascript:;">
                        <img src="/image/icon-loadmore.jpg">
                    </a>
                </div>
            @endif
        @endif
    </div>
@endsection

@section('script')
    <script>

    </script>
    <script>
        var nextPage = 2;
        var categoryID = 0;
        @if(isset($category))
            categoryID = {{ $category->id }};
        @endif
        $('#loadmore').click(function (){
            var pagination = $(this).parent();
            var params = '?' + (categoryID > 0 ? 'c=' + categoryID : '') + (categoryID > 0 ? '&' : '') + 'page=' + nextPage;
            $.ajax({
                url: '{{ route('list.page') }}' + params,
                type: 'get',
                dataType: 'json',
                success: function (serverdata){
                    if(serverdata.error == 0){
                        if(serverdata.count > 0){
                            nextPage++;
                            pagination.before(serverdata.articles);
                        }else{
                            pagination.html('<p class="nomore">^_^ &nbsp;&nbsp; 已经刷到底啦 ！</p>');
                        }

                    }
                }
            });
        });




    </script>
@endsection
