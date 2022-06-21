<header>
    <div class="header-container">
        <a href="/">
            <h1>{{ config('app.name') }}</h1>
        </a>
        <nav>
            <ul>
                <li>
                    <a href="/">首页</a>
                </li>
                @if($navigation->isNotEmpty())
                    @foreach($navigation as $nav)
                        <li>
                            <a href="{{ $nav->uri }}">{{ $nav->title }}</a>
                        </li>
                    @endforeach
                @endif
                <li>
                    <a href="mailto:23735841@qq.com">你找我？</a>
                </li>
            </ul>
        </nav>
        <div class="header_sliding_sidebar_control header_control_wrapper">
            <a href="#" id="user_control_icon">
                <i class="iconfont icon-menu"></i>
            </a>
        </div>
    </div>
</header>
