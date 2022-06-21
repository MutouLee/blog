<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport">
    <link rel='stylesheet' href='{{ mix('/css/app.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='/css/nprogress.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='/css/iconfont/iconfont.css' type='text/css' media='all' />
    <script type='text/javascript' src="/js/jquery.min.js"></script>
    <script src="/js/nprogress.min.js"></script>
    <title>@yield('title', config('app.name'))</title>
    @yield('style')
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?e74388c8b695a7858c4828f503ec4a86";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</head>
<body>
<script>NProgress.start();</script>
@include('header')
<div class="header-banner">
    <section class="hero">
        <div class="inner"></div>
    </section>
    @yield('top-banner')
{{--    <canvas id="wave-canvas"></canvas>--}}
</div>
<div class="wrapper">
    @yield('content')
</div>

@include('footer')

@include('sider-bar')

<div id="backtop" class="show"></div>
<script type='text/javascript' src='/js/script.js'></script>
<script>
    $(document).ready(
        function () {
            NProgress.done();
        }
    );
    (function ($, window) {
        $(document).on('touchend click', ".header_control_wrapper #user_control_icon", function (e) {
            e.preventDefault();
            $(".site_side_container").toggleClass("opened");
            $("html, body").toggleClass("side_container_opened");
            $('.site_side_container .load_on_click').each(function () {
                $(this).removeClass('load_on_click').addClass('lazyload');
            });
        });
        $(document).on('touchend click', ".sliding_close_helper_overlay", function (e) {
            e.preventDefault();
            $("html.side_container_opened, body.side_container_opened").removeClass("side_container_opened");
            $(".site_side_container.opened").removeClass("opened");
        });
    }(jQuery, window));
</script>

@yield('script')
</body>
</html>
