<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>index</title>
    <link rel="stylesheet" href="/thinkstudy/Public/bootstrap-3.3.7-dist/css/bootstrap.css"/>
    <link rel="stylesheet" href="/thinkstudy/Public/bootstrap-3.3.7-dist/css/bootstrap-theme.css"/>
    <script src="/thinkstudy/Public/bootstrap-3.3.7-dist/js/npm.js"></script>
    <script src="/thinkstudy/Public/bootstrap-3.3.7-dist/js/bootstarp.js"></script>
    <link rel="stylesheet" href="/thinkstudy/Public/bootstrap-3.3.7-dist/css/indexlogin.css">

</head>
<body>
<div class="container">
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">后台</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="/thinkstudy/index.php/Admin/Login/logout">退出</span></a></li>
            </ul>
        </div>
    </nav>
</div>
<div class="container">
    <div class="loginstyl">
        <form class="form-horizontal" role="form" action="/thinkstudy/index.php/Admin/Login/login" method="post">
            <div class="form-group" style="padding-top: 25px">
                <label class="col-sm-3 control-label">用户名:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="username" placeholder="请输入名字">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">密码:</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="userpassword" placeholder="请输入密码">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">验证码:</label>
                <div class="col-sm-4">
                    <input type="text" name="verify" class="form-control" placeholder="验证码"
                           aria-describedby="sizing-addon1">
                </div>
                <div class="col-sm-4">
                    <img src="/thinkstudy/index.php/Admin/Login/verify"
                         onclick="this.src='/thinkstudy/index.php/Admin/Login/verify/rand='+Math.random()"/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <input type="submit" value="login" class="btn btn-primary"/>
                </div>
                <div class="col-sm-6">
                    <input type="reset" value="reset" class="btn btn-danger"/>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>