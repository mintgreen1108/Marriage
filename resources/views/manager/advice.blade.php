<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>后台管理</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="/assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="/assets/js/gritter/css/jquery.gritter.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/lineicons/style.css">

    <!-- Custom styles for this template -->
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/style-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/to-do.css">

    <script src="/assets/js/chart-master/Chart.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<section id="container">
    <!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="index.html" class="logo"><b>后台管理</b></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">
        </div>
        <div class="top-menu">
            <ul class="nav pull-right top-menu">
                <li><a class="logout" href="/admin/logout">退出</a></li>
            </ul>
        </div>
    </header>
    <!--header end-->

    <!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">

                <p class="centered"><a href="profile.html"><img src="/assets/img/ui-sam.jpg" class="img-circle"
                                                                width="60"></a></p>
                <h5 class="centered">{{session('admin_name')}}</h5>

                <li class="mt">
                    <a href="/admin/account">
                        <i class="fa fa-dashboard"></i>
                        <span>管理员管理</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="/admin/user">
                        <i class="fa fa-desktop"></i>
                        <span>用户管理</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="/admin/evaluation">
                        <i class="fa fa-book"></i>
                        <span>用户评价</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a class="active" href="/admin/advice">
                        <i class="fa fa-tasks"></i>
                        <span>推荐相亲对象</span>
                    </a>
                </li>
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>

    <!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!-- COMPLEX TO DO LIST -->
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i>推荐</h4>
                        <form class="form-inline" role="form" method="get" action="advice">
                            <div class="form-group">
                                <input name="search" type="text" class="form-control" id="exampleInputEmail2"
                                       placeholder="姓名/手机号">
                            </div>
                            <button type="submit" class="btn btn-theme">推荐</button>
                        </form>
                    </div><!-- /form-panel -->
                </div><!-- /col-lg-12 -->
            </div><!-- /row -->

            <div class="row mt">
                <div class="col-md-12">
                    <div class="content-panel">
                        <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i>推荐列表</h4>
                            <hr>
                            <thead>
                            <tr>
                                <th><i class="fa"></i> 姓名</th>
                                <th class="hidden-phone"> 性别</th>
                                <th><i class="fa "></i> 年龄</th>
                                <th><i class="fa "></i> 工作</th>
                                <th><i class="fa "></i> 手机号</th>
                                <th><i class=" fa "></i> 城市</th>
                                <th><i class=" fa "></i> 自我介绍</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $value)
                                <tr>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->sex==1?'男':'女'}}</td>
                                    <td>{{$value->age}}</td>
                                    <td>{{$value->job}}</td>
                                    <td>{{$value->mobile}}</td>
                                    <td>{{$value->area}}</td>
                                    <td>{{$value->introduction}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- /content-panel -->
                </div><!-- /col-md-12 -->
            </div><!-- /row -->

            <!-- SORTABLE TO DO LIST -->
        </section>
    </section>

    <!--main content end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/jquery-1.8.3.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="/assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="/assets/js/jquery.scrollTo.min.js"></script>
<script src="/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="/assets/js/jquery.sparkline.js"></script>


<!--common script for all pages-->
<script src="/assets/js/common-scripts.js"></script>

<script type="text/javascript" src="/assets/js/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="/assets/js/gritter-conf.js"></script>

<!--script for this page-->
<script src="/assets/js/sparkline-chart.js"></script>
<script src="/assets/js/zabuto_calendar.js"></script>

<script type="text/javascript">
</script>

<script type="application/javascript">
    $('.btn_delete').onclick(function ($this) {

    });
</script>
</body>
</html>
