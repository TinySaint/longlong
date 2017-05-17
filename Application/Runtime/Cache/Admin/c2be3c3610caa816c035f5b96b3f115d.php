<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>index</title>
    <link rel="stylesheet" href="/thinkstudy/Public/bootstrap-3.3.7-dist/css/bootstrap.css"/>
    <link rel="stylesheet" href="/thinkstudy/Public/bootstrap-3.3.7-dist/css/bootstrap-theme.css"/>
    <script src="/thinkstudy/Public/bootstrap-3.3.7-dist/js/jquery.min.js"></script>
    <script src="/thinkstudy/Public/bootstrap-3.3.7-dist/js/npm.js"></script>
    <script src="/thinkstudy/Public/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="/thinkstudy/Public/bootstrap-3.3.7-dist/js/userjs.js"></script>
    <!-- <script src="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
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
                <li class="active"><a href="">欢迎 <?php echo (session('admin_username')); ?> ！</span></a></li>
                <li class="active"><a href="/thinkstudy/index.php/Admin/Login/logout">退出</span></a></li>
            </ul>
        </div>
    </nav>

</div>
<div class="container">
    <div class="col-md-2 left" style="height: 100%">
        <?php if($_SESSION['admin_type']< 2 ): ?><ul class="list-group">
                <?php if(($_SESSION['admin_type']) == "0"): ?><li class="list-group-item"><a href="/thinkstudy/index.php/Admin/Index/index">用户管理</a></li><?php endif; ?>
                <li class="list-group-item"><a href="/thinkstudy/index.php/Admin/Index/adduser">添加用户</a></li>
            </ul><?php endif; ?>

        <ul class="list-group">
            <li class="list-group-item"><a href="/thinkstudy/index.php/Admin/User/read">学生管理</a></li>
            <li class="list-group-item"><a href="/thinkstudy/index.php/Admin/User/add">添加学生</a></li>
        </ul>
    </div>
    <div style="height: 100%"></div>
    <div class="col-md-10 right">
        
    <form class="form-horizontal" enctype="multipart/form-data" action="/thinkstudy/index.php/Admin/Index/add" method="post">
        <div class="form-group" align="center">
            <label class="col-sm-2 control-label ">用户名字:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="username"
                       placeholder="请输入名字">
            </div>
        </div>
        <div class="form-group" align="center">
            <label class="col-sm-2 control-label ">密码:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="userpassword"
                       placeholder="请输入密码">
            </div>
        </div>
        <div class="form-group" align="center">
            <label class="col-sm-2 control-label ">电话:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="usertelephone"
                       placeholder="请输入名字">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label ">性别:</label>
            <div class="col-sm-2">
                <select name="usergender" class="form-control">
                    <option selected>男</option>
                    <option>女</option>
                </select>
            </div>
        </div>
        <div class="form-group" align="center">
            <label class="col-sm-2 control-label">出生日期:</label>
            <div class="col-sm-3">
                <input type="date" class="form-control" name="userdataofbirth">
            </div>
        </div>
        <div class="form-group" align="center">
            <label class="col-sm-2 control-label">备注:</label>
            <div class="col-sm-4">
                <textarea type="text" class="form-control" rows="5" name="userremark" style="resize:none"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-offset-2 col-sm-2 checkbox-inline">
                <input type="radio" name="usertype" value="2" > 顾问
            </label>
            <label class="col-sm-offset-2 col-sm-2 checkbox-inline">
                <input type="radio" name="usertype" value="1" > 管理员
            </label>
            <?php if(($_SESSION['admin_type']) == "0"): ?><label class="col-sm-offset-2 col-sm-2 checkbox-inline">
                    <input type="radio" name="usertype" value="0" > 超级管理员
                </label><?php endif; ?>
        </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-2">
                <button type="submit" class="btn btn-default">提交</button>
            </div>
            <div class="col-md-3">
                <button type="reset" class="btn btn-danger">重置</button>
            </div>
        </div>
    </form>

    </div>
</div>
</body>
</html>