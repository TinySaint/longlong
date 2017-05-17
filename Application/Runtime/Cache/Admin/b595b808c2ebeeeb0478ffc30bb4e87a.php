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
        
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">面板标题</h3>
                </div>
            </div>
            <div class="table-responsive">
            <table class="table">
                <th class="col-md-2">姓名</th>
                <th class="col-md-1">性别</th>
                <th class="col-md-1">用户类别</th>
                <th class="col-md-2">电话</th>
                <th class="col-md-1">日期</th>
                <th class="col-md-1">修改信息</th>
                <th class="col-md-1">删除</th>
                <?php if(is_array($userinfo)): $i = 0; $__LIST__ = $userinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($vo['username']); ?></td>
                        <td><?php echo ($vo['usergender']); ?></td>
                        <td><?php switch($vo["usertype"]): case "0": ?><p  style="color: red">超级管理员</p><?php break;?>
                            <?php case "1": ?><p  style="color: green">管理员</p><?php break;?>
                            <?php case "2": ?><p  style="color: blue">顾问</p><?php break;?>
                            <?php default: ?>
                            default<?php endswitch;?>
                        </td>
                        <td><?php echo ($vo['usertelephone']); ?></td>
                        <td><?php echo ($vo['userdataofbirth']); ?></td>
                        <td><a href="<?php echo U('Admin/Index/edituser',array('uid'=>$vo['uid']));?>">修改</a></td>
                        <td>
                            <a href="javascript:if(confirm('确定要删除吗?')) location='<?php echo U('Admin/Index/deleteuserinfo',array('uid'=>$vo['uid']));?>'">删除</a>
                        </td>
                        <!-- <td><a href="/thinkstudy/index.php/Admin/Index/updateinfo">修改</a></td>
                         <td><a href="/thinkstudy/index.php/Admin/Index/deteleinfo/">删除</a></td> -->
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
            </div>
            <div class="panel-footer">
                <div class="result page"><?php echo ($page); ?></div>
            </div>
        
    </div>
</div>
</body>
</html>