
<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="keywords" content="程序员导航,程序员网址导航,Android导航,IOS导航,Android网址导航,IOS程序员导航,IT导航,Android程序员导航,IOS程序员导航,Html5网址导航,前端导航,前端程序猿导航,码农导航,面试,设计导航网站,上网导航,hello world 导航,网址大全,网址导航,hw798上网导航,hw798网址,hw798导航,hw798网址大全,hw798活动,网址之家,网址,在线工具,程序员,工具,开发人员工具,小工具,站长工具,代码格式化、压缩、加密、解密,下载链接转换">
    <meta name="description" content="hw798程序员导航是汇集全网优质网址及资源的程序员上网导航。让您的网络生活更简单精彩。程序员上网，从hw798导航开始。">
    <link rel="alternate" hreflang="zh-Hans" href="http://www.hw798.com"/>
    <link rel="Shortcut Icon" href="//cdn.hw798.com/ugc/2017/12/20/Fqjg83c6igxUlIZGQ2cJqCh3ftM0.ico">
    <title>{{ isset($title) && $title ? $title . "_HW798程序员网址导航": config('app.name', 'HW798_程序员网址导航')  }}</title>

    <link href="//cdn.hw798.com/hw798/css/dashboard.css" rel="stylesheet" />

    <script src="//cdn.hw798.com/hw798/js/require.min.js"></script>
    <script>
        requirejs.config({
            baseUrl: '..'
        });
    </script>

    <script src="//cdn.hw798.com/hw798/js/dashboard.js"></script>


    <script src="//cdn.hw798.com/hw798/plugins/input-mask/plugin.js"></script>

    <style>
        .btn-link-home {
            min-width: 12%;font-size: 15px;color: black;font-weight:400
        }
    </style>

</head>
<body class="">

<div class="page">
    <div class="page-main">
        @include('layouts.header')

        @include('layouts.nav')
        @include('layouts.alert')

        @yield('content')

    </div>
</div>




@include('layouts.footer')

</body>
</html>
