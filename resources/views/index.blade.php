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

<body class="index-page">

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
            <a class="navbar-brand page-scroll" href="#page-top">婚恋</a>
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

    <!-- Carousel -->
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="images/1.jpg" alt="First slide">
                <!-- Static Header -->
                <div class="header-text hidden-xs">
                    <div class="col-md-12 text-center">
                        <div class="logo">
                            <a href="#">
                                <div class="name t-right">Jason <span> Satrovsky  </span></div>
                                <div class="and">&amp;</div>
                                <div class="name t-left"> Sophie <span> Angela</span></div>
                            </a>
                        </div>
                    </div>
                </div><!-- /header-text -->
            </div>
            <div class="item">
                <img src="images/2.jpg" alt="Second slide">
                <!-- Static Header -->
                <div class="header-text hidden-xs">
                    <div class="col-md-12 text-center">
                        <div class="logo">
                            <a href="#">
                                <div class="name t-right">Jason <span> Satrovsky  </span></div>
                                <div class="and">&amp;</div>
                                <div class="name t-left"> Sophie <span> Angela</span></div>
                            </a>
                        </div>
                    </div>
                </div><!-- /header-text -->
            </div>
            <div class="item">
                <img src="images/3.jpg" alt="Third slide">
                <!-- Static Header -->
                <div class="header-text hidden-xs">
                    <div class="col-md-12 text-center">
                        <div class="logo">
                            <a href="#">
                                <div class="name t-right">Jason <span> Satrovsky  </span></div>
                                <div class="and">&amp;</div>
                                <div class="name t-left"> Sophie <span> Angela</span></div>
                            </a>
                        </div>
                    </div>
                </div><!-- /header-text -->
            </div>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div><!-- /carousel -->

</header>
<!-- /Section: intro -->

<!-- /////////////////////////////////////////Content -->
<div id="page-content">

    <!-- ////////////Content Box 01 -->
    <section class="box-content box-1">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 ">
                    <div class="box-item">
                        <a href="#"><img src="/home/images/bride.jpg" title="icon-name" class="img-circle"></a>
                        <h3>Jason Story</h3>
                    </div>
                </div>
                <div class="col-sm-6 ">
                    <div class="box-item">
                        <a href="#"><img src="/home/images/groom.jpg" title="icon-name" class="img-circle"></a>
                        <h3>Sophie Story</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ////////////Content Box 02 -->
    <section class="box-content box-2 box-style-1">
        <div class="container">
            <div class="row heading">
                <div class="col-lg-12">
                    <h2>已经结婚多少天了</h2>
                    <hr class="line">
                </div>
            </div>
            <div class="row">
                <div class="box-item">
                    <div class="centered text-center" id="myCounter"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- ////////////Content Box 03 -->
    <section class="box-content box-3">
        <div class="container">
            <div class="row heading">
                <div class="col-lg-12">
                    <h2>照片墙</h2>
                    <hr class="line">
                </div>
            </div>
            <div class="row box-item">
                <ul id="da-thumbs" class="da-thumbs">
                    <li>
                        <a href="#">
                            <img src="/home/images/4.jpg"/>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="/home/images/5.jpg"/>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="/home/images/6.jpg"/>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="/home/images/7.jpg"/>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="/home/images/8.jpg"/>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="/home/images/9.jpg"/>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </section>

    <!-- ////////////Content Box 04 -->
    <section class="box-content box-4 box-style-2">
        <div class="container">
            <div class="row">
                <div class="box-item">
                    <blockquote><p>有情人终成眷属</p></blockquote>
                </div>
            </div>
        </div>
    </section>

</div>

<!-- Core JavaScript Files -->
<script src="/home/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->

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
<script type="text/javascript" src="js/jquery.hoverdir.js"></script>
<script type="text/javascript">
    $(function () {

        $(' #da-thumbs > li ').each(function () {
            $(this).hoverdir();
        });

    });
</script>

</body>

</html>
