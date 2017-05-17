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
        
    <form class="form-horizontal" role="form" action="/thinkstudy/index.php/Admin/User/updateinfo" method="post">
        <input type="hidden" name="sid" id="sid" value="<?php echo ($student['sid']); ?>">
        <div class="form-group" align="center">
            <label class="col-sm-2 control-label ">学生名字:</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="name" id="name"
                       value="<?php echo ($student['name']); ?>">
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label ">性别:</label>
                <div class="col-sm-2">
                    <select name="gender" class="form-control">
                        <option
                        <?php if($student['gender'] == '男'): ?>selected='selected'<?php endif; ?>
                        >男</option>
                        <option
                        <?php if($student['gender'] == '女'): ?>selected='selected'<?php endif; ?>
                        >女
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" style="width: 100px">出生日期:</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" name="dataofbirth" value="<?php echo ($student['dataofbirth']); ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label ">咨询人姓名:</label>
            <div class="col-sm-2">
                <!--<input type="text" class="form-control" name="introducename"-->
                <!--value="<?php echo ($student['introducename']); ?>">-->
                <?php if(($_SESSION['admin_type']) == "0"): ?><select name="introducename" class="form-control">
                        <?php if(is_array($userlist)): $i = 0; $__LIST__ = $userlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option
                            <?php if($student['introducename'] == $vo['username']): ?>selected='selected'<?php endif; ?>
                            ><?php echo ($vo['username']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <?php else: ?>
                    <input type="hidden" name="introducename" value="<?php echo ($student['introducename']); ?>"/>
                    <div type="text" class="form-control" name="introducename"
                    ><?php echo ($student['introducename']); ?>
                    </div><?php endif; ?>

            </div>
            <div class="form-group">
                <label class="col-md-1 control-label " style="width: 100px">固定电话:</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="fixedline" value="<?php echo ($student['fixedline']); ?>">
                </div>
                <label class="col-sm-1 control-label ">手机:</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="telephone" style="width: 200px"
                           value="<?php echo ($student['telephone']); ?>">
                </div>
            </div>
        </div>
        <div class="form-group" align="center">
            <label class="col-sm-2 control-label ">户口所在地:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="registered" value="<?php echo ($student['registered']); ?>">
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label " style="width: 100px">类型:</label>
                <div class="col-sm-2">
                    <select name="infotype" class="form-control">
                        <option
                        <?php if($student['infotype'] == '来电'): ?>selected='selected'<?php endif; ?>
                        >来电</option>
                        <option
                        <?php if($student['infotype'] == '咨询'): ?>selected='selected'<?php endif; ?>
                        >咨询</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group" align="center">
            <label class="col-sm-2 control-label ">在读学校:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="university" value="<?php echo ($student['university']); ?>">
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label " style="width: 100px">文化程度:</label>
                <div class="col-sm-2">
                    <select name="education" class="form-control">
                        <option
                        <?php if($student['education'] == '大专以下'): ?>selected='selected'<?php endif; ?>
                        >大专以下</option>
                        <option
                        <?php if($student['education'] == '大专'): ?>selected='selected'<?php endif; ?>
                        >大专</option>
                        <option
                        <?php if($student['education'] == '本科'): ?>selected='selected'<?php endif; ?>
                        >本科</option>
                        <option
                        <?php if($student['education'] == '研究生'): ?>selected='selected'<?php endif; ?>
                        >研究生</option>
                        <option
                        <?php if($student['education'] == '博士'): ?>selected='selected'<?php endif; ?>
                        >博士</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label ">专业:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="major"
                       value="<?php echo ($student['major']); ?>">
            </div>
            <div class="form-group">
                <label class="col-md-1 control-label ">Email:</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="email" value="<?php echo ($student['email']); ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label ">毕业时间:</label>
            <div class="col-sm-3">
                <input type="date" class="form-control" name="graduatedate" value="<?php echo ($student['graduatedate']); ?>">
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label ">留学国家:</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="studyabroad" value="<?php echo ($student['studyabroad']); ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label ">留学时间:</label>
            <div class="col-sm-3">
                <input type="date" class="form-control" name="abroaddate" value="<?php echo ($student['abroaddate']); ?>">
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label ">平均成绩:</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="grade" value="<?php echo ($student['grade']); ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label ">文案老师:</label>
            <div class="col-sm-3">
                <select name="fileteacher" class="form-control">
                    <option>无</option>
                    <?php if(is_array($userlist)): $i = 0; $__LIST__ = $userlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option><?php echo ($vo['username']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
           
                <div class="form-group">
                    <label class="col-md-2 control-label ">学生状态:</label>
                    <div class="col-sm-2">
                        <select name="state" class="form-control">
                            <option value="1"
                            <?php if(($student["state"]) == "1"): ?>selected='selected'<?php endif; ?>
                            >无</option>
                            <option value="2"
                            <?php if(($student["state"]) == "2"): ?>selected='selected'<?php endif; ?>
                            >联系不上</option>
                            <option value="3"
                            <?php if(($student["state"]) == "3"): ?>selected='selected'<?php endif; ?>
                            >联系上</option>
                            <option value="4"
                            <?php if(($student["state"]) == "4"): ?>selected='selected'<?php endif; ?>
                            >约来访</option>
                            <option value="5"
                            <?php if(($student["state"]) == "5"): ?>selected='selected'<?php endif; ?>
                            >已来访</option>
                            <option value="6"
                            <?php if(($student["state"]) == "6"): ?>selected='selected'<?php endif; ?>
                            >待签约</option>
							 <?php if(($_SESSION['admin_type']) == "0"): ?><option value="7"
                            <?php if(($student["state"]) == "7"): ?>selected='selected'<?php endif; ?>
                            >签约</option>
                            <option value="8"
                            <?php if(($student["state"]) == "8"): ?>selected='selected'<?php endif; ?>
                            >缴费（押金）</option>
                            <option value="9"
                            <?php if(($student["state"]) == "9"): ?>selected='selected'<?php endif; ?>
                            >缴费（首款）</option>
                            <option value="10"
                            <?php if(($student["state"]) == "10"): ?>selected='selected'<?php endif; ?>
                            >缴费（全款）</option>
                            <option value="11"
                            <?php if(($student["state"]) == "11"): ?>selected='selected'<?php endif; ?>
                            >无效</option><?php endif; ?>
                        </select>
                    </div>
                </div>
               
           
        </div>
        <script>

            //监听上传进度
            $(document).ready(function () {
//            var xhrOnProgress = function (fun) {
//                xhrOnProgress.onprogress = fun; //绑定监听
//                return function () {
//                    //通过$.ajaxSettings.xhr();获得XMLHttpRequest对象
//                    var xhr = $.ajaxSettings.xhr();
//                    //判断监听函数是否为函数
//                    if (typeof xhrOnProgress.onprogress !== 'function')
//                        return xhr;
//                    //如果有监听函数并且xhr对象支持绑定时就把监听函数绑定上去
//                    if (xhrOnProgress.onprogress && xhr.upload) {
//                        xhr.upload.onprogress = xhrOnProgress.onprogress;
//                    }
//                    return xhr;
//                }
//            };

                $("#upfile").on('click', function () {
                    var formData = new FormData();// 自动搜索#form里面的name值不为空的input(注意：type=file的input会被搜索到，但不能携带文件流，所以在下面我主动添加进了formData) <=ie9不支持FormData
                    formData.append('file', $('#accessory')[0].files[0]);
                    formData.append('sid', $('#sid').val());
                    formData.append('name', $('#name').val());
//                formData.append('file', document.querySelector('[type=file]').files[0]);// 由于上面不会搜索到type=file的input，所以在这里将它主动添加到formData中(注意：需使用原生方式获取)
                    $.ajax({
                        type: 'post',
                        url: "/thinkstudy/index.php/Admin/User/uploadfile",
                        data: formData,
                        dataType: 'json',
                        //用ajax的话：这几个参数应该是 要设置的：
                        cache: false,
                        enctype: 'multipart/form-data',
                        contentType: false,// 当有文件要上传时，此项是必须的，否则后台无法识别文件流的起始位置(详见：#1)
                        processData: false,// 是否序列化data属性，默认true(注意：false时type必须是post，详见：#2)
//                    xhr: xhrOnProgress(function (e) ),
                        success: function (response) {
                            if (response.status == 1) {
                                //判断返回的status来确定文件是否上传成功，以及上传成功后要做的操作
                                alert(response.msg);
                                $("#accessory").val("");
                                $("#filelistdiv").append("<p id='" + response.fid + "'><input type='checkbox' name='filelist' value='" + response.fid + "'/>" + response.fname + "</p>");
                            }
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            alert("上传失败" + XMLHttpRequest.status + "---------" + XMLHttpRequest.readyState + "----------" + textStatus);
                        }
                    })
                });

                $("#detelefile").on('click', function () {

                    var arr = new Array();
                    var result = "";
                    var items = document.getElementsByName("filelist");
                    for (i = 0; i < items.length; i++) {
                        if (items[i].checked) {
                            arr.push(items[i].value);
                        }
                    }
                    console.log(arr[0]);
                    if (arr.length > 0) {
                        $.ajax({
                            url: "/thinkstudy/index.php/Admin/User/deletefile",
                            //data: { "selectedIDs": _list },
                            data: {'flist': arr},
                            dataType: "json",
                            type: "POST",
                            //traditional: true,
                            success: function (responseJSON) {
                                // your logic
                                $.each(responseJSON.flist, function (name, value) {
                                    if (value = 1) {
                                        result = result + name + "删除成功 \n";
                                    } else {
                                        result = result + name + "删除失败 \n";
                                    }
                                });
                                $.each(responseJSON.fidlist, function (name, value) {
                                    if (value = 1) {
                                        $("p#" + name).remove();
                                    }
                                });
                                alert(result);
                            }
                        });
                    } else {
                        alert("请选择要删除的文件");
                    }
                });
            });
        </script>

        <div class="form-group" align="center">
            <label class="col-sm-2 control-label">文件列表:</label>
            <div class="col-sm-4">
                <div class="form-control" id="filelistdiv" style="height: 120px;padding-left: 20px" align="left">
                    <?php if(is_array($editfilelist)): $i = 0; $__LIST__ = $editfilelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><p id="<?php echo ($list["fid"]); ?>"><input type='checkbox' name='filelist' value="<?php echo ($list["fid"]); ?>"/><?php echo ($list["saccessory"]); ?>
                        </p><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label ">成绩附件:</label>
            <div class="col-sm-3">
                <input type="file" id="accessory" name="accessory" size="30">
            </div>
            <div class="col-sm-1">
                <div class="btn btn-default" id="upfile" size="30">上传</div>
            </div>
            <div class="col-sm-1">
                <div class="btn btn-default" id="detelefile" size="30">删除</div>
            </div>
        </div>

        <!-- next state-->
        <h2 align="center"> 英语成绩 </h2>
        <div class="form-group">
            <label class="col-md-2 control-label ">SAT1:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="sat1" value="<?php echo ($student['sat1']); ?>">
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label " style="width: 100px">考试时间:</label>
                <div class="col-md-3">
                    <input type="date" class="form-control" name="sat1date" value="<?php echo ($student['sat1date']); ?>">
                </div>
                <p>(如未考，请选择考试时间！)</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label ">SAT2:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="sat2" value="<?php echo ($student['sat2']); ?>">
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label " style="width: 100px">考试时间:</label>
                <div class="col-md-3">
                    <input type="date" class="form-control" name="sat2date" value="<?php echo ($student['sat2date']); ?>">
                </div>
                <p>(如未考，请选择考试时间！)</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label ">TOEFL:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="toefl" value="<?php echo ($student['toefl']); ?>">
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label " style="width: 100px">考试时间:</label>
                <div class="col-md-3">
                    <input type="date" class="form-control" name="toefldate" value="<?php echo ($student['toefldate']); ?>">
                </div>
                <p>(如未考，请选择考试时间！)</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label ">TELTS:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="telts" value="<?php echo ($student['telts']); ?>">
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label " style="width: 100px">考试时间:</label>
                <div class="col-md-3">
                    <input type="date" class="form-control" name="teltsdate" value="<?php echo ($student['teltsdate']); ?>">
                </div>
                <p>(如未考，请选择考试时间！)</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label ">GMAT:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="gmat" value="<?php echo ($student['teltsdate']); ?>">
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label " style="width: 100px">考试时间:</label>
                <div class="col-md-3">
                    <input type="date" class="form-control" name="gmatdate" value="<?php echo ($student['gmatdate']); ?>">
                </div>
                <p>(如未考，请选择考试时间！)</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label ">GRE:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="grt" value="<?php echo ($student['grt']); ?>">
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label " style="width: 100px">考试时间:</label>
                <div class="col-md-3">
                    <input type="date" class="form-control" name="grtdate" value="<?php echo ($student['grtdate']); ?>">
                </div>
                <p>(如未考，请选择考试时间！)</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label ">LSAT:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="lsat" value="<?php echo ($student['lsat']); ?>">
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label " style="width: 100px">考试时间:</label>
                <div class="col-md-3">
                    <input type="date" class="form-control" name="lsatdata" value="<?php echo ($student['lsatdata']); ?>">
                </div>
                <p>(如未考，请选择考试时间！)</p>
            </div>
        </div>
        <div class="form-group">
            <?php if(($_SESSION['admin_type']) < "2"): ?><div class="col-md-offset-3 col-md-5">
                    <button type="submit" class="btn btn-default">修改信息</button>
                </div>
                <?php else: ?>
                <div class="col-md-offset-3 col-md-5">
                    <button type="submit" class="btn btn-default">提交审核</button>
                </div><?php endif; ?>

            <div class="col-md-3">
                <button type="reset" class="btn btn-danger">重置</button>
            </div>
        </div>
        <div style="height: 200px;"></div>
    </form>

    </div>
</div>
</body>
</html>