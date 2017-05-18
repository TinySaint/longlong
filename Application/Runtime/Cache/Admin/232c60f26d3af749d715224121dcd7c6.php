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
        

    <form class="form-horizontal" role="form" action="" method="post">
        <div class="form-group" align="center">
            <label class="col-sm-2 control-label ">学生名字:</label>
            <div class="col-sm-2">
                <div type="text" class="form-control" name="name"
                ><?php echo ($student['name']); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label ">性别:</label>
                <div class="col-sm-2">
                    <div name="gender" class="form-control">
                        <?php echo ($student['gender']); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" style="width: 100px">出生日期:</label>
                    <div class="col-sm-3">
                        <div type="date" class="form-control" name="dataofbirth"><?php echo ($student['dataofbirth']); ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label ">咨询人姓名:</label>
            <div class="col-sm-2">
                <div type="text" class="form-control" name="introducename"
                ><?php echo ($student['introducename']); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-1 control-label " style="width: 100px">固定电话:</label>
                <div class="col-sm-2">
                    <div type="text" class="form-control" name="fixedline"><?php echo ($student['fixedline']); ?></div>
                </div>
                <label class="col-sm-1 control-label ">手机:</label>
                <div class="col-sm-2">
                    <div type="text" class="form-control" name="telephone" style="width: 200px">
                        <?php echo ($student['telephone']); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group" align="center">
            <label class="col-sm-2 control-label ">户口所在地:</label>
            <div class="col-sm-5">
                <div type="text" class="form-control" name="registered"><?php echo ($student['registered']); ?></div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label " style="width: 100px">类型:</label>
                <div class="col-sm-2">
                    <div name="infotype" class="form-control">
                        <?php echo ($student['infotype']); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group" align="center">
            <label class="col-sm-2 control-label ">在读学校:</label>
            <div class="col-sm-5">
                <div type="text" class="form-control" name="university"><?php echo ($student['university']); ?></div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label " style="width: 100px">文化程度:</label>
                <div class="col-sm-2">
                    <div name="education" class="form-control">
                        <?php echo ($student['education']); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label ">专业:</label>
            <div class="col-sm-5">
                <div type="text" class="form-control" name="major"
                ><?php echo ($student['major']); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-1 control-label ">Email:</label>
                <div class="col-md-3">
                    <div type="text" class="form-control" name="email"><?php echo ($student['email']); ?></div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label ">毕业时间:</label>
            <div class="col-sm-3">
                <div type="date" class="form-control" name="graduatedate"><?php echo ($student['graduatedate']); ?></div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label ">留学国家:</label>
                <div class="col-md-3">
                    <div type="text" class="form-control" name="studyabroad"><?php echo ($student['studyabroad']); ?></div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label ">留学时间:</label>
            <div class="col-sm-3">
                <div type="date" class="form-control" name="abroaddate"><?php echo ($student['abroaddate']); ?></div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label ">平均成绩:</label>
                <div class="col-md-3">
                    <div type="text" class="form-control" name="grade"><?php echo ($student['grade']); ?></div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label ">文案老师:</label>
            <div class="col-sm-3">
                <div type="text" class="form-control" name="fileteacher"><?php echo ($student['fileteacher']); ?></div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label ">学生状态:</label>
                <div class="col-sm-2">
                    <?php switch($student["state"]): case "1": ?><label class=" form-control " style="color: dodgerblue">无效</label><?php break;?>
                        <?php case "2": ?><label class=" form-control " style="color: dodgerblue">联系不上</label><?php break;?>
                        <?php case "3": ?><label class=" form-control " style="color: dodgerblue">联系上</label><?php break;?>
                        <?php case "4": ?><label class=" form-control " style="color: dodgerblue">约来访</label><?php break;?>
                        <?php case "5": ?><label class=" form-control " style="color: dodgerblue">已来访</label><?php break;?>
                        <?php case "6": ?><label class=" form-control " style="color: dodgerblue">待签约</label><?php break;?>
                        <?php case "7": ?><label class=" form-control " style="color: dodgerblue">签约</label><?php break;?>
                        <?php case "8": ?><label class=" form-control " style="color: dodgerblue">缴费（押金）</label><?php break;?>
                        <?php case "9": ?><label class=" form-control " style="color: dodgerblue">缴费（首款）</label><?php break;?>
                        <?php case "10": ?><label class=" form-control " style="color: dodgerblue">缴费（全款）</label><?php break;?>
                        <?php case "11": ?><label class=" form-control " style="color:greenyellow">通过</label><?php break;?>
                        <?php case "12": ?><label class=" form-control " style="color: red">退款</label><?php break;?>
                        <?php case "13": ?><label class=" form-control " style="color: greenyellow">归档</label><?php break;?>
                        <!--<?php case "1": ?><label class=" form-control " style="color: dodgerblue">修改信息</label><?php break;?>-->
                        <!--<?php case "2": ?><label class=" form-control " style="color: red">正在审核</label><?php break;?>-->
                        <!--<?php case "3": ?><label class=" form-control " style="color:seagreen">审核通过</label><?php break;?>-->
                        <?php default: ?>
                        default<?php endswitch;?>
                </div>
            </div>
        </div>
        <div class="form-group" align="center">
            <label class="col-sm-2 control-label">文件列表:</label>
            <div class="col-sm-4">
                <div class="form-control" id="filelistdiv" style="height: 120px;padding-left: 20px" align="left">
                    <?php if(is_array($filelistinfo)): $i = 0; $__LIST__ = $filelistinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><p><a type="file" href="/thinkstudy/index.php/Admin/User/downloadfile/fid/<?php echo ($list['fid']); ?>"><?php echo ($list['saccessory']); ?></a></p><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        </div>

        <!-- next state-->

        <!--<h2 align="center" style="background-color: #00a0e9" id="english"> 显示英语成绩 </h2>-->
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion"
                   href="#collapseOne">
                    显示英语成绩
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse">
            <div class="form-group">
                <label class="col-md-2 control-label ">SAT1:</label>
                <div class="col-sm-3">
                    <div type="text" class="form-control" name="sat1"><?php echo ($student['sat1']); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label " style="width: 100px">考试时间:</label>
                    <div class="col-md-3">
                        <div type="date" class="form-control" name="sat1date"><?php echo ($student['sat1date']); ?></div>
                    </div>
                    <p>(如未考，请选择考试时间！)</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label ">SAT2:</label>
                <div class="col-sm-3">
                    <div type="text" class="form-control" name="sat2"><?php echo ($student['sat2']); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label " style="width: 100px">考试时间:</label>
                    <div class="col-md-3">
                        <div type="date" class="form-control" name="sat2date"><?php echo ($student['sat2date']); ?></div>
                    </div>
                    <p>(如未考，请选择考试时间！)</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label ">TOEFL:</label>
                <div class="col-sm-3">
                    <div type="text" class="form-control" name="toefl"><?php echo ($student['toefl']); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label " style="width: 100px">考试时间:</label>
                    <div class="col-md-3">
                        <div type="date" class="form-control" name="toefldate"><?php echo ($student['toefldate']); ?></div>
                    </div>
                    <p>(如未考，请选择考试时间！)</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label ">TELTS:</label>
                <div class="col-sm-3">
                    <div type="text" class="form-control" name="telts"><?php echo ($student['telts']); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label " style="width: 100px">考试时间:</label>
                    <div class="col-md-3">
                        <div type="date" class="form-control" name="teltsdate"><?php echo ($student['teltsdate']); ?></div>
                    </div>
                    <p>(如未考，请选择考试时间！)</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label ">GMAT:</label>
                <div class="col-sm-3">
                    <div type="text" class="form-control" name="gmat"><?php echo ($student['gmat']); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label " style="width: 100px">考试时间:</label>
                    <div class="col-md-3">
                        <div type="date" class="form-control" name="gmatdate"><?php echo ($student['gmatdate']); ?></div>
                    </div>
                    <p>(如未考，请选择考试时间！)</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label ">GRE:</label>
                <div class="col-sm-3">
                    <div type="text" class="form-control" name="grt"><?php echo ($student['grt']); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label " style="width: 100px">考试时间:</label>
                    <div class="col-md-3">
                        <div type="date" class="form-control" name="grtdate"><?php echo ($student['grtdate']); ?></div>
                    </div>
                    <p>(如未考，请选择考试时间！)</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label ">LSAT:</label>
                <div class="col-sm-3">
                    <div type="text" class="form-control" name="lsat"><?php echo ($student['lsat']); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label " style="width: 100px">考试时间:</label>
                    <div class="col-md-3">
                        <div type="date" class="form-control" name="lsatdata"><?php echo ($student['lsatdate']); ?></div>
                    </div>
                    <p>(如未考，请选择考试时间！)</p>
                </div>
            </div>
        </div>
        <!--
        <?php switch($_SESSION['admin_type']): case "0": if($student['state'] <= 6): ?><div class="form-group">
                        <div class="col-md-offset-5 col-md-12">
                            <a class="btn btn-default"
                               href="<?php echo U('Admin/User/edit',array('sid'=>$student['sid']));?>">修改学员信息</a>
                        </div>
                    </div><?php endif; break;?>
            <?php case "1": if($student['state'] == 6): ?><div class="form-group">
                        <div class="col-md-offset-3 col-md-4">
                            <a class="btn btn-success"
                               href="<?php echo U('Admin/User/checkinfo',array('sid'=>$student['sid'],'state'=>7));?>">审核通过</a>
                        </div>
                        <div class="col-md-4">
                            <a class="btn btn-danger"
                               href="<?php echo U('Admin/User/checkinfo',array('sid'=>$student['sid'],'state'=>5));?>">审核驳回</a>
                        </div>
                    </div><?php endif; break;?>
            <?php case "2": if($student['state'] <= 6): ?><div class="form-group">
                        <div class="col-md-offset-5 col-md-12">
                            <a class="btn btn-default"
                               href="<?php echo U('Admin/User/edit',array('sid'=>$student['sid']));?>">修改学员信息</a>
                        </div>
                    </div><?php endif; break;?>
            <?php default: endswitch;?>
        -->

    </form>

    <div class="panel panel-default">


        <div class="panel-heading">
            <p class="pl" type="button">评论</p>
        </div>

        <div class="panel-body">
            <div class="well">
                <form class="form-horizontal" action="<?php echo U('Admin/Comment/addComment');?>" method="post" role="form">
                    <div class="form-group" align="center">
                        <label class="col-sm-2 control-label ">评论人:</label>
                        <div class="col-sm-2">
                            <p class="control-label"> <?php echo (session('admin_username')); ?></p>
                            <input type="hidden" class="form-control" placeholder="昵称" name="author" id="author"
                                   value="<?php echo (session('admin_username')); ?>">
                            <input type="hidden" class=" input-group" placeholder="" name="pid" value="0">
                            <input type="hidden" class=" input-group" placeholder="" name="sid"
                                   value="<?php echo ($student['sid']); ?>">
                        </div>
                    </div>
                    <div class="form-group" align="center">
                        <label class="col-sm-2 control-label ">评语:</label>
                        <div class="col-sm-10">
                            <textarea type="text" rows="5" id="content-text" name="comment" class="form-control"
                                      style="resize:none" placeholder="请输入评论内容"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-6">
                            <button type="submit" class="btn btn-default tjbtn">提交</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <input type="hidden" name="pid" value="<?php echo ($vo["author"]); ?>"/>
    <div>
        <h2></h2>
        <?php if(is_array($commentList)): $i = 0; $__LIST__ = $commentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["pid"]) == "0"): ?><hr class="solidline"/>
                <?php else: ?>
                <hr class="dottedline"/><?php endif; ?>
            <div class="commentList " style="padding-left:<?php echo ($vo['level']-1); ?>cm">
                <div><span class="user">
                            <?php if(($vo["pauthor"] == NULL)): echo ($vo["author"]); ?>
                                <?php else: ?> <?php echo ($vo["author"]); ?><span class="black" style="color: #000101">回复</span><?php echo ($vo["pauthor"]); endif; ?>
                        </span>
                    <?php if(($_SESSION['admin_type']) == "0"): ?><a href="/thinkstudy/index.php/Admin/Comment/deteleComment/id/<?php echo ($vo["id"]); ?>" id="<?php echo ($vo["id"]); ?>"
                           style="float: right">删除</a><?php endif; ?>
                    <span class="hftime"><?php echo (date("Y-m-d H:i:s",$vo["time"])); ?></span>
                </div>
                <div class="content"><?php echo ($vo["content"]); ?></div>

            </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div style="height: 200px"/>

    <div class="clear"></div>
    <!-- 清除浮动 -->
    <script type="text/javascript">
        $(document).ready(function () {
//            $("#collapseOne").hide();
//            $("#english").click(function () {
//                $("#toggle").toggle();
            $(".hf").click(//点击回复按钮事件
                function (e) {
                    var $this = $(this);
                    if ($this.parent().parent().next().hasClass('hftext')) {
                        $this.parent().parent().next().remove();
                    } else {
                        $this.parent().parent().after('<div class="hftext"><form class="form-horizontal" action="/thinkstudy/index.php/Admin/Comment/addComment" method="post" role="form"> <div class="form-group" align="center"> <label class="col-sm-2 control-label ">回复人:</label> <div class="col-sm-2"> <p class="control-label">  <?php echo (session('admin_username')); ?></p><input  type="hidden" class="form-control" placeholder="昵称" name="author"value="<?php echo (session('admin_username')); ?>"> <input type="hidden" class=" input-group" placeholder="" id="pid" name="pid" value="<?php echo ($vo["id"]); ?>"> <input type="hidden" class=" input-group" placeholder="" id="sid" name="sid" value="<?php echo ($student["sid"]); ?>"> </div></div><div class="form-group" align="center"><label class="col-sm-2 control-label ">回复:</label> <div class="col-sm-10"> <textarea type="text" rows="5" id="content-text" name="comment" class="form-control" style="resize:none" placeholder="请输入评论内容"></textarea> </div> </div><div class="form-group"><div class="col-md-offset-2 col-md-6"> <button type="submit" class="btn btn-default tjbtn">提交</button> </div> </div> </form></div>');
//                        $this.parent().parent().after('<div class="hftext"><form action="<?php echo U('
//                        Home / Index / addComment
//                        ');?>" method="post" role="form" > <input name="article_id" type="hidden"  value="<?php echo ($Article["id"]); ?>" /><input id="pid" type="hidden" name="pid" value="<?php echo ($vo["id"]); ?>"/> <div class="input-group home-from-box"><span class="input-group">昵称</span><input type="text" class="input-group name1" placeholder="昵称" name="username" value="<?php echo ($username); ?>"></div><div class="input-group"> <span class="input-group emotion2">表情</span>  </div><div class="input-group">  <textarea style="display: inline" class="input-group comment" id="content-text2" name="comment" rows="3" placeholder="请输入评论内容"></textarea>  </div><div class="submit">  <input style="width:100px;height:35px "  class="submit-btn" type="submit" value="提交"></div> </form></div>'
//                    )"
                        var v_id = $(e.target).attr('id');//获取元素id;
                        $("#pid").val(v_id);
//                        alert(v_id + "------");
                        $('.emotion2').qqFace({
                            id: 'facebox', //表情ID
                            assign: 'content-text2', //赋予到具体位置
                            path: '../../comment/Public/Face/'   //表情路径
                        });
                    }

                    $(".tjbtn").click(function () {
                        var $this = $(this);
                        var content = $this.parent().parent().siblings().find('#content-text').val();
                        alert("-1-" + content);
                        if (content == "") {
                            alert("昵称或者评论不能为空哦");
                            return false;
                        }
                    });
                });
            $(".tjbtn").click(function () {
                var $this = $(this);
                var content = $this.parent().parent().siblings().find('#content-text').val();
                if (content == "") {
                    alert("昵称或者评论不能为空哦");
                    return false;
                }
            });
        });


        //        $(function () {
        //            $('.emotion').qqFace({
        //                id: 'facebox', //表情ID
        //                assign: 'content-text', //赋予到具体位置
        //                path: '../../comment/Public/Face/'    //表情路径
        //            });


        //        });
    </script>


    </div>
</div>
</body>
</html>