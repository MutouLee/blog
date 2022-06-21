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
@endif
