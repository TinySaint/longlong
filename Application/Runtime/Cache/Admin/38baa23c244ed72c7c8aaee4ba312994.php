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
        
    <script>

        //监听上传进度
        //        $(document).ready(function () {
        function doUpload() {
//            $("#upfile").on('click', function () {
            var formData = new FormData();
            formData.append("CustomField", "This is some extra data");
            // 自动搜索#form里面的name值不为空的input(注意：type=file的input会被搜索到，但不能携带文件流，所以在下面我主动添加进了formData) <=ie9不支持FormData
               formData.append('file', $("#file")[0].files[0]);
//                formData.append('file', document.querySelector('[type=file]').files[0]);// 由于上面不会搜索到type=file的input，所以在这里将它主动添加到formData中(注意：需使用原生方式获取)
            $.ajax({
                type: 'POST',
                url: "/thinkstudy/index.php/Admin/Test/up2",
                data: formData,
                dataType: 'json',
                //用ajax的话：这几个参数应该是 要设置的：
                cache: false,
                enctype: 'multipart/form-data',
                contentType: false,// 当有文件要上传时，此项是必须的，否则后台无法识别文件流的起始位置(详见：#1)
                processData: false,// 是否序列化data属性，默认true(注意：false时type必须是post，详见：#2)
                success: function (response) {
                    if (response.status == 1) {
                        //判断返回的status来确定文件是否上传成功，以及上传成功后要做的操作
                    }
                    alert("111" + response.msg);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(XMLHttpRequest.status + "---------" + XMLHttpRequest.readyState + "----------" + textStatus);
                }
            });
//            });
//        });
        }
    </script>
    <!--<form id="info" class="form-horizontal" role="form" action="/thinkstudy/index.php/Admin/Test/insertstudent" enctype="multipart/form-data"-->
          <!--method="post">-->
        <input id="file" type="file" name="file">
        <input type="button" value="上传" onclick="doUpload()"/>
    <!--</form>-->


    </div>
</div>
</body>
</html>