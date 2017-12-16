<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="">

    <title>婚恋</title>

    <!-- Bootstrap Core CSS -->
    <link href="/home/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="/home/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/home/fonts/stylesheet.css">
    <link href="/home/css/mb-comingsoon-iceberg.css" rel="stylesheet"/>

    <!-- Custom Fonts -->
    <link href="/home/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- jQuery and Modernizr-->
    <script src="/home/js/jquery-2.1.1.js"></script>
    <script src="/home/js/modernizr.custom.97074.js"></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="/home/js/html5shiv.js"></script>
    <script src="/home/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="sub-page">

<!-- /////////////////////////////////////////Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">Your Wedding</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav nav-justified ">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li class="active">
                    <a class="page-scroll" href="/home/index">首页</a>
                </li>
                <li>
                    <a class="page-scroll" href="/home/chat">聊天</a>
                </li>
                <li>
                    <a class="page-scroll" href="/home/user/{{$_SESSION['user_id']}}">个人中心</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<!-- Navigation -->

<header>
    <div class="logo" class="hidden-xs">
        <a href="#">
            <div class="name t-right">Jason <span> Satrovsky  </span></div>
            <div class="and">&amp;</div>
            <div class="name t-left"> Sophie <span> Angela</span></div>
        </a>
    </div>
</header>
<!-- Header -->

<!-- /////////////////////////////////////////Content -->
<div id="page-content">
    <div class="container">
        <div class="row">
            <div id="main-content" class="col-md-8">
                <article class="contact">
                    <div class="art-header">
                        <h2 class="center">说说</h2>
                    </div>
                    <div class="art-content">
                        <div id="contact_form">
                            <form name="form1" id="ff" method="post" action="/home/blog">
                                <input class="hidden" name="user_id" value="{{$_SESSION['user_id']}}">
                                <label>
                                    <input type="text" name="content" required>
                                </label>
                                <input class="sendButton" type="submit" value="发布">
                            </form>
                        </div>
                    </div>
                </article>

                <div class="widget wid-about">
                    @foreach($blog as $value)
                        <div class="heading">
                            <h4>{{$value->created_at}}</h4>
                            <a href="">👍</a>
                        </div>
                        <div class="content">
                            <p>{{$value->content}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div id="sidebar" class="col-md-4">
                <div class="widget wid-about">
                    <div class="heading"><h4>{{$user->name}}</h4></div>
                    <div class="content">
                        <p>{{$user->introduction}}</p>
                    </div>
                    <div id="contact_form">
                        <a href="/home/user/logout">退出</a>
                    </div>
                </div>
                <div class="widget wid-tags">
                    <div class="heading"><h4>访客</h4></div>
                    <div class="content">
                        <ul class="list-inline">
                            @foreach($visit as $value)
                                <li>
                                    <a href="/home/user/{{$value[0]->user_id}}">{{$value[0]->user->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="widget wid-tags">
                    <div class="heading"><h4>点赞列表</h4></div>
                    <div class="content">
                        <ul class="list-inline">
                            <li><a href="#">点赞人1</a></li>
                            <li><a href="#">点赞人2</a></li>
                            <li><a href="#">点赞人3</a></li>
                        </ul>
                    </div>
                </div>
                <div class="widget wid-links">
                    <div class="heading"><h4>关注列表</h4></div>
                    <div class="content">
                        <ul>
                            <li>关注1 <a href="#">取关</a></li>
                            <li>关注2 <a href="#">取关</a></li>
                            <li>关注3 <a href="#">取关</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Core JavaScript Files -->

<script src="/home/js/bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="/home/js/agency.js"></script>

<!-- Plugin JavaScript -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="/home/js/classie.js"></script>
<script src="/home/js/cbpAnimatedHeader.js"></script>

<!-- Countdown -->
<script src="/home/js/jquery.mb-comingsoon.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('#myCounter').mbComingsoon({expiryDate: new Date(2016, 0, 1, 9, 30), speed: 100});
        setTimeout(function () {
            $(window).resize();
        }, 200);
    });
</script>

<!-- Img Hover -->
<script type="text/javascript" src="/home/js/jquery.hoverdir.js"></script>
<script type="text/javascript">
    $(function () {

        $(' #da-thumbs > li ').each(function () {
            $(this).hoverdir();
        });

    });
</script>

</body>

</html>
