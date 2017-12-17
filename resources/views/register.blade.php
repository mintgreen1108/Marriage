<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>注册</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="/assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>

    <!-- Custom styles for this template -->
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->

<div id="login-page">
    <div class="container">

        <form class="form-login" action="/home/user/register" method="post">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <h2 class="form-login-heading">用户注册</h2>
            <div class="login-wrap">
                <input type="text" class="form-control" name="name" placeholder="用户名" autofocus required>
                <br>
                <input type="password" class="form-control" name="password" placeholder="密码" required>
                <br>
                <input type="text" class="form-control" name="sex" placeholder="性别" required>
                <br>
                <input type="number" class="form-control" name="mobile" placeholder="手机号" required>
                <br>
                <input type="number" class="form-control" name="age" placeholder="年龄" required>
                <br>
                <input type="text" class="form-control" name="area" placeholder="地区" required>
                <br>
                <input type="text" class="form-control" name="job" placeholder="工作" required>
                <br>
                <input type="text" class="form-control" name="want" placeholder="意向" required>
                <br>
                <input type="text" class="form-control" name="introduction" placeholder="自我介绍" required>
                <br>
                <label class="checkbox">
                </label>
                <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i>注册
                </button>
                <hr>

            </div>
        </form>

    </div>
</div>

<!-- js placed at the end of the document so the pages load faster -->
<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>

<!--BACKSTRETCH-->
<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
<script type="text/javascript" src="/assets/js/jquery.backstretch.min.js"></script>
<script>
    $.backstretch("assets/img/login-bg.jpg", {speed: 500});
</script>


</body>
</html>
