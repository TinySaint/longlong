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
        <?php if($_SESSION['admin_type']== 0 ): ?><ul class="list-group">
                <li class="list-group-item"><a href="/thinkstudy/index.php/Admin/Index/index">用户管理</a></li>
                <li class="list-group-item"><a href="/thinkstudy/index.php/Admin/Index/adduser">添加用户</a></li>
            </ul>
            <ul class="list-group">
                <li class="list-group-item"><a href="/thinkstudy/index.php/Admin/User/read">学生管理</a></li>
                <li class="list-group-item"><a href="/thinkstudy/index.php/Admin/User/add">添加学生</a></li>
                <li class="list-group-item"><a href="/thinkstudy/index.php/Admin/User/read">待审核学生</a></li>
                <li class="list-group-item"><a href="/thinkstudy/index.php/Admin/Index/index">审核通过学生</a></li>
                <li class="list-group-item"><a href="/thinkstudy/index.php/Admin/User/add">无效学生</a></li>
            </ul><?php endif; ?>

        <?php if($_SESSION['admin_type']== 1 ): ?><ul class="list-group">
            <li class="list-group-item"><a href="/thinkstudy/index.php/Admin/Index/index">审核通过学生</a></li>
            </ul><?php endif; ?>

        <?php if($_SESSION['admin_type']== 2 ): ?><ul class="list-group">
                <li class="list-group-item"><a href="/thinkstudy/index.php/Admin/User/read">学生管理</a></li>
                <li class="list-group-item"><a href="/thinkstudy/index.php/Admin/User/add">添加学生</a></li>
                <li class="list-group-item"><a href="/thinkstudy/index.php/Admin/Index/index">审核通过学生</a></li>
            </ul><?php endif; ?>

    </div>
    <div style="height: 100%"></div>
    <div class="col-md-10 right">
        
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">学生列表</h3>
        </div>
        <script>
            function searchinfo() {
                var str = "";
                var searchname = document.getElementById("searchname");
                var introducename = document.getElementById("introducename");
                var studyabroad = document.getElementById("studyabroad");
                var state = document.getElementById("state");
                var addtime = document.getElementById("addtime");
                var lastcomment =document.getElementById("lastcomment");

                if (!searchname.value == "") {
                    str = str + "/name/" + searchname.value;
                }
                if (!introducename.value == "") {
                    str = str + "/introducename/" + introducename.value;
                }
                if (!studyabroad.value == "") {
                    str = str + "/studyabroad/" + studyabroad.value;
                }
                if (!state.value == "") {
                    str = str + "/state/" + state.value;
                }
                if (!addtime.value == "") {
                    str = str + "/addtime/" + addtime.value;
                }
                if (!lastcomment.value == "") {
                    str = str + "/lastcomment/" + lastcomment.value;
                }
                window.location.href = "/thinkstudy/index.php/Admin/User/read" + str;
            }
        </script>

        <div class="panel-body">
            <div class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-1 control-label">姓名:</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" placeholder="请输入名字" id="searchname" value="<?php echo ($get["searchname"]); ?>">
                    </div>

                    <label class="col-sm-1 control-label" style="width: 80px">顾问:</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" placeholder="请输入名字" id="introducename" value="<?php echo ($get["introducename"]); ?>">
                    </div>
                    <label class="col-sm-2 control-label">留学国家:</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="请输入国家" id="studyabroad" value="<?php echo ($get["studyabroad"]); ?>">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label">状态:</label>
                    <div class="col-sm-2">
                        <select type="text" class="form-control" id="state">
                            <option value="">所有</option>
                            <option value="1"
                            <?php if(($get["state"]) == "1"): ?>selected='selected'<?php endif; ?>
                            >未签约</option>
                            <option value="2"
                            <?php if(($get["state"]) == "2"): ?>selected='selected'<?php endif; ?>
                            >待签约</option>
                            <option value="3"
                            <?php if(($get["state"]) == "3"): ?>selected='selected'<?php endif; ?>
                            >已签约</option>
                        </select>
                    </div>
                    <label class="col-sm-1 control-label" style="width: 100px">录入时间:</label>
                    <div class="col-sm-2" style="width: 200px">
                        <input type="date" class="form-control" placeholder="请输入名字" id="addtime" value="<?php echo ($get["addtime"]); ?>">
                    </div>
                    <label class="col-sm-1 control-label" style="width: 100px">跟进时间:</label>
                    <div class="col-sm-2" style="width: 200px">
                        <input type="date" class="form-control" placeholder="请输入名字" id="lastcomment" value="<?php echo ($get["lastcomment"]); ?>">
                    </div>

                </div>
                <div class="form-group">
                    <div class="col-sm-offset-1 col-sm-7">
                        <button class="btn btn-info btn-search" onclick="searchinfo()">搜索</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="col-md-1" style="min-width: 100px">详细信息</th>
                        <th class="col-md-1" style="min-width: 100px">资源编号</th>
                        <th class="col-md-1" style="min-width: 100px">录入时间</th>
                        <th class="col-md-1" style="min-width: 100px">姓名</th>
                        <th class="col-md-1" style="min-width: 100px">性别</th>
                        <th class="col-md-1" style="min-width: 150px">联系方式</th>
                        <th class="col-md-1" style="min-width: 50px">顾问</th>
                        <th class="col-md-3" style="min-width: 100px">留学国家</th>
                        <th class="col-md-1" style="min-width: 100px">留学时间</th>
                        <th class="col-md-1" style="min-width: 100px">跟进时间</th>
                        <th class="col-md-1" style="min-width: 100px">当前状态</th>

                        <th class="col-md-1" style="min-width: 100px">删除</th>
                    </tr>
                    </thead>
                    <?php if(is_array($studentinfo)): $i = 0; $__LIST__ = $studentinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td><a href="<?php echo U('Admin/User/editstudent',array('sid'=>$vo['sid']));?>">修改信息</a></td>
                            <td><?php echo ($vo['infotype']); ?></td>
                            <td><?php echo (date("Y-m-d H:i:s",$vo['addtime'])); ?></td>
                            <td><?php echo ($vo['name']); ?></td>
                            <td><?php echo ($vo['gender']); ?></td>
                            <td><?php echo ($vo['telephone']); ?></td>
                            <td><?php echo ($vo['introducename']); ?></td>
                            <td><?php echo ($vo['studyabroad']); ?></td>
                            <td><?php echo ($vo['abroaddate']); ?></td>
                            <td><?php echo (date("Y-m-d H:i:s",$vo['lastcomment'])); ?></td>
                            <td>
                                <?php switch($vo["state"]): case "1": ?><p style="color: dodgerblue">无效</p><?php break;?>
                                    <?php case "2": ?><p style="color: dodgerblue">联系不上</p><?php break;?>
                                    <?php case "3": ?><p style="color: dodgerblue">联系上</p><?php break;?>
                                    <?php case "4": ?><p style="color: dodgerblue">约来访</p><?php break;?>
                                    <?php case "5": ?><p style="color: dodgerblue">已来访</p><?php break;?>
                                    <?php case "6": ?><p style="color: dodgerblue">待签约</p><?php break;?>
                                    <?php case "7": ?><p style="color: dodgerblue">签约</p><?php break;?>
                                    <?php case "8": ?><p style="color: dodgerblue">缴费（押金）</p><?php break;?>
                                    <?php case "9": ?><p style="color: dodgerblue">缴费（首款）</p><?php break;?>
                                    <?php case "10": ?><p style="color: dodgerblue">缴费（全款）</p><?php break;?>
                                    <?php case "11": ?><p style="color: dodgerblue">通过</p><?php break;?>
                                    <?php case "12": ?><p style="color: dodgerblue">退款</p><?php break;?>
                                    <?php case "13": ?><p style="color: dodgerblue">归档</p><?php break;?>
                                    <!--<?php case "1": ?><p style="color: dodgerblue">修改信息</p><?php break;?>-->
                                    <!--<?php case "2": ?><p style="color: red">正在审核</p><?php break;?>-->
                                    <!--<?php case "3": ?><p style="color:seagreen">审核通过</p><?php break;?>-->
                                    <?php default: endswitch;?>
                            </td>

                            <?php if(($_SESSION['admin_type']) < "2"): ?><td>
                                    <a href="javascript:if(confirm('确定要删除吗?')) location='<?php echo U('Admin/User/deleteinfo',array('sid'=>$vo['sid']));?>'">删除</a>
                                </td><?php endif; ?>
                            <!-- <td><a href="/thinkstudy/index.php/Admin/User/updateinfo">修改</a></td>
                             <td><a href="/thinkstudy/index.php/Admin/User/deteleinfo/">删除</a></td> -->
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
            </div>
            <div class="panel-footer">
                <div class="result page"><?php echo ($page); ?></div>
            </div>
        </div>
    </div>

    </div>
</div>
</body>
</html>