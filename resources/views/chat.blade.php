<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="">

    <title>聊天</title>

    <!-- Bootstrap Core CSS -->
    <link href="/home/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="/home/css/style.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/home/fonts/stylesheet.css">
    <link href="/home/css/mb-comingsoon-iceberg.css" rel="stylesheet"/>
    <link href="/assets/css/style-responsive.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/home/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/assets/css/to-do.css">

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
        <div class="col-lg-3 ds">
            <!--COMPLETED ACTIONS DONUTS CHART-->
            <h3>联系人</h3>

            <!-- First Action -->
            @foreach($users as $user)
                <div class="desc user-div" id="{{$user->id}}">
                    <div class="thumb">
                        <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                    </div>
                    <div class="details">
                        <p>
                            <muted>{{$user->focused_user->name}}</muted>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-7">
        </div><!--/col-md-12 -->
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

        $('.user-div').click(function () {
            var id = $(this).attr('id');
            $.ajax({
                type: 'get',
                url: 'chat/' + id,
                success: function (rps) {
                    $('.col-md-7').empty();
                    $('.col-md-7').append(rps);
                }
            });
        });
    });

</script>

</body>

</html>
