<!-- 侧边栏滑出内容 -->
<div class="sliding_close_helper_overlay"></div>
<div class="site_side_container">
    <div class="info_sidebar">
        <div class="item-block">
            <form method="get" action="{{ route('article.search')}}">
                <h2>站内搜索</h2>
                <div class="item">
                    <input type="text" name="text" class="search-input" placeholder="请输入关键字">
                    <button type="submit" class="btn-search">
                        <i class="iconfont icon-sousuo"></i>
                    </button>
                </div>
            </form>
        </div>

        <div class="item-block side-nav-block">
            <h2>导航</h2>
            <div class="item">
                <ul class="nav-side">
                    <li>
                        <a href="/">
                            <i class="iconfont icon-shouye"></i> 首页
                        </a>
                    </li>
                    @if($navigation->isNotEmpty())
                        @foreach($navigation as $nav)
                            <li>
                                <a href="{{ $nav->uri }}">
                                    <i class="iconfont {{ $nav->icon }}"></i> {{ $nav->title }}
                                </a>
                            </li>
                        @endforeach
                    @endif
                    <li>
                        <a href="mailto:23735841@qq.com">
                            <i class="iconfont icon-youxiang"></i> 你找我？
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="side-copyright">
        © 2022 &nbsp; <a href="/" target="_blank">Dobeen.Net</a> All Rights Reserved.
    </div>
</div>
<!-- 侧边栏滑出内容 结束 -->
