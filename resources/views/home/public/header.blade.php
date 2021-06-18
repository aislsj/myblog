<!doctype html>
<html>
<head>
    <meta charset="gbk">
    <title>樱花灿烂时，万物皆美好 - 一枚正在努力进步的php程序员个人博客网站</title>
    <meta name="keywords" content="{{$myconfig['keywords']}}" />
    <meta name="description" content="{{$myconfig['description']}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ URL::asset('/Style/home/css/base.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/Style/home/css/index.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/Style/home/css/m.css') }}" rel="stylesheet">
    <script src="{{ URL::asset('/Style/home/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('/Style/home/js/jquery.easyfader.min.js') }}"></script>
    <script src="{{ URL::asset('/Style/home/js/scrollReveal.js') }}"></script>
    <script src="{{ URL::asset('/Style/home/js/common.js') }}"></script>
    <script src="/Style/home/js/modernizr.js"></script>
{{--    <script src="https://cdn.jsdelivr.net/gh/yremp/yremp-js@1.5/sakura.js"></script>--}}
</head>
<body background="/Style/home/images/002.jpg">
<header>
    <!--PC端开始-->
    <div class="menu">
        <nav class="nav" id="topnav">
            <h1 class="logo"><a href="http://www.yangqq.com">樱花灿烂时</a></h1>
            <li><a href="/">网站首页</a> </li>
            <li><a href="/about">关于我</a> </li>
            @foreach($list as $value)
                <li><a href="javascript:void(0)">{{$value['name']}}</a>
                    @if(isset($value['son']))
                        <ul class="sub-nav">
                            @foreach($value['son'] as $data)
                                <li><a href="/category/{{$data['id']}}">{{$data['name']}}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach


            <li><a href="/time">时间轴</a> </li>
            <div id="search_bar" class="search_bar">
                <form  id="searchform" action="[!--news.url--]e/search/index.php" method="post" name="searchform">
                    <input class="input" placeholder="想搜点什么呢..." type="text" name="keyboard" id="keyboard">
                    <input type="hidden" name="show" value="title" />
                    <input type="hidden" name="tempid" value="1" />
                    <input type="hidden" name="tbname" value="news">
                    <input type="hidden" name="Submit" value="搜索" />
                    <span class="search_ico"></span>
                </form>
            </div>
        </nav>
    </div>
    <!--PC端结束-->


    <!--Phone端开始-->
    <div id="mnav">
        <h2><a href="/" class="mlogo">樱花灿烂时</a><span class="navicon"></span></h2>
        <dl class="list_dl">
            <dt class="list_dt"> <a href="/">网站首页</a> </dt>
            <dt class="list_dt"> <a href="/about">关于我</a> </dt>
            <dt class="list_dt"> <a href="list">学无止境</a> </dt>
            @foreach($list as $value)
                <li><a href="javascript:void(0)">{{$value['name']}}</a>
                    @if(isset($value['son']))
                        <ul class="sub-nav">
                            @foreach($value['son'] as $data)
                                <li><a href="/catrgory/{{$data['id']}}">{{$data['name']}}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
            <li><a href="/time">时间轴</a> </li>
        </dl>
    </div>
    <!--Phone端结束-->
</header>
<script src="https://eqcn.ajz.miesnfu.com/wp-content/plugins/wp-3d-pony/live2dw/lib/L2Dwidget.min.js"></script>
{{--    https://unpkg.com/live2d-widget-model-koharu@1.0.5/assets/koharu.model.json--}}
{{--    https://unpkg.com/live2d-widget-model-shizuku@1.0.5/assets/shizuku.model.json--}}

<!-- 上边的不同链接显示的是不同的小人，这个可以根据需要来选择 下边的初始化部分，可以修改宽高来修改小人的大小，或者是鼠标移动到小人上的透明度，也可以修改小人在页面出现的位置。 -->
<script>
    L2Dwidget.init({ "model": { jsonPath:
                "https://unpkg.com/live2d-widget-model-shizuku@1.0.5/assets/shizuku.model.json",
            "scale": 1 }, "display": { "position": "left", "width": 110, "height": 150,
            "hOffset": 0, "vOffset": -20 }, "mobile": { "show": true, "scale": 0.5 },
        "react": { "opacityDefault": 0.8, "opacityOnHover": 0.1 } });
</script>
<script type="text/javascript">
    (function($){
        $.fn.snow = function(options){
            var $flake = $('<div id="snowbox" />').css({'position': 'absolute','z-index':'9999', 'top': '-50px'}).html('❄'),
                documentHeight     = $(document).height(),
                documentWidth  = $(document).width(),
                defaults = {
                    minSize   : 10,
                    maxSize   : 20,
                    newOn     : 1000,
                    flakeColor : "#AFDAEF" /* 此处可以定义雪花颜色，若要白色可以改为#FFFFFF */
                },
                options = $.extend({}, defaults, options);
            var interval= setInterval( function(){
                var startPositionLeft = Math.random() * documentWidth - 100,
                    startOpacity = 0.5 + Math.random(),
                    sizeFlake = options.minSize + Math.random() * options.maxSize,
                    endPositionTop = documentHeight - 200,
                    endPositionLeft = startPositionLeft - 500 + Math.random() * 500,
                    durationFall = documentHeight * 10 + Math.random() * 5000;
                $flake.clone().appendTo('body').css({
                    left: startPositionLeft,
                    opacity: startOpacity,
                    'font-size': sizeFlake,
                    color: options.flakeColor
                }).animate({
                    top: endPositionTop,
                    left: endPositionLeft,
                    opacity: 0.2
                },durationFall,'linear',function(){
                    $(this).remove()
                });
            }, options.newOn);
        };
    })(jQuery);
    $(function(){
        $.fn.snow({
            minSize: 5, /* 定义雪花最小尺寸 */
            maxSize: 50,/* 定义雪花最大尺寸 */
            newOn: 300  /* 定义密集程度，数字越小越密集 */
        });
    });
</script>
