<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/30 0030
 * Time: 12:24
 */

namespace Admin\Controller;

use Think\Controller;

class UserController extends Controller
{

//    protected function _initialize(){//
//        if($_SESSION==null){
//            $this->redirect('Login/index', array(), 3, '..请先登陆..');
//        }
//    }

    /**
     * Function name:add
     * Function description:
     * 添加学生信息页面
     */
    public function add()
    {
        $student = M('Student');
        //$maxsid = $student->max('sid');
        $user = M('User');
        $list = $user->select();
        $this->assign('userlist', $list);
        //$this->assign('sid', $maxsid + 1);
        $this->display();
    }
    /**
     * Function name:read
     * Function description:
     * 显示学生的列表，包括搜索
     */
    public function read()
    {
        $student = M('Student');
        $comment = M('Comment');
        // 构造查询条件
        $condition = array();
        $sessiontype = $_SESSION['admin_type'];

        if (!empty($_GET['name'])) {
            $condition['name'] = $_GET['name'];
        }
        if ($sessiontype == 2) {
            $condition['introducename'] = $_SESSION['admin_username'];
        } else {
            if (!empty($_GET['introducename'])) {
                $condition['introducename'] = $_GET['introducename'];
            }
        }
        if (!empty($_GET['studyabroad'])) {
            $condition['studyabroad'] = array('like', '%' . $_GET['studyabroad'] . '%');
        }
        if (!empty($_GET['addtime'])) {
            $condition['addtime'] = array('egt', strtotime($_GET['addtime']));
        }
        if (!empty($_GET['lastcomment'])) {
            $condition['lastcomment'] = array('egt', strtotime($_GET['lastcomment']));
        }
        if (!empty($_GET['state'])) {
            switch ($_GET['state']) {
                case 1:
                    $condition['state'] = array('lt', 7);
                    break;
                case 2:
                    $condition['state'] = array('eq', 0);
                    break;
                case 3:
                    $condition['state'] = array('gt', 7);
                    break;
                default:
            }
        }

        $count = $student->where($condition)->count();
        $Page = new \Think\Page($count, 10);
//        echo $student->_sql();
        $show = $Page->show();// 分页显示输出
        $studentinfo = $student->where($condition)->order('sid')->limit($Page->firstRow . ',' . $Page->listRows)->select();
//        $studentinfo = $student->select();
        if (!empty($_GET)) {
            $this->assign('get', $_GET);
        }
        $this->assign('studentinfo', $studentinfo);
        $this->assign('page', $show);
        $this->display();
    }


    /**
     * Function name:insertstudent
     * Function description:
     * 添加学生信息 包括上传文件
     */
    public function insertstudent()
    {
        $student = D('Student');
        if (!$student->create()) {
            // 如果创建失败 表示验证没有通过 输出错误提示信息
            exit($this->error($student->getError()));
        } else {
            $student->addtime = time();
            $student->lastcomment = time();
            // 上传文件
            if ($student->add()) {
                $this->redirect('User/read', array(), 0, '..添加成功..');
            } else {
                $this->error($student->getError());
            }
        }
    }

    /**
     * Function name:editstudent
     * Function description:
     * edit student
     */
    public function editstudent(){
        $file = M('File');
        $student = D('Student');
        $user = M('User');
        $sid = (int)$_GET['sid'];
        $filelist = $file->where("sid=$sid")->select();
        $list = $student->where("sid=$sid")->find();
        $userlist = $user->select();
        $this->assign('student', $list);
        $this->assign('editfilelist', $filelist);
        $this->assign('userlist', $userlist);
        $this->assign('title', '显示用户编辑信息');
        $this->display();
    }

//删除学生信息
    public function deleteinfo()
    {
        $file = M('File');
        $data = I('get.');
        $commrnt = M('Comment');
        $student = M('Student');
        if ($student->where(array('sid' => $data['sid']))->delete()) {
            $flist = $file->where(array('sid' => $data['sid']))->select();
            if (!empty($flist)) {
                foreach ($flist as $value) {
                    $result = $file->delete($value['fid']);
                    if ($result > 0) {//数据库中的数据删除成功
                        unlink("./Public/Uploads/" . $value['saccessoryfilename']);
                    }
                }
            }
            $commrnt->where(array('sid' => $data['sid']))->delete();
            $this->redirect('User/read', array(), 0, '..删除成功..');
        }
    }

//编辑学生信息
    public function edit()
    {
        $file = M('File');
        $student = D('Student');
        $user = M('User');
        $sid = (int)$_GET['sid'];
        $filelist = $file->where("sid=$sid")->select();
        $list = $student->where("sid=$sid")->find();
        $userlist = $user->select();
        $this->assign('student', $list);
        $this->assign('editfilelist', $filelist);
        $this->assign('userlist', $userlist);
        $this->assign('title', '显示用户编辑信息');
        $this->display();
    }

//上传文件
    public function uploadfile()
    {
        $file = M('file');
        $file->addtime = time();
        $file->sname = $_POST['name'];
        $file->sid = $_POST['sid'];
        // 上传文件
        $data = [
            "status" => 0,
            "msg" => "没有文件"
        ];
        // 验证通过 可以进行其他数据操作
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 0;// 设置附件上传大小
//        $upload->exts = array('jpg', 'gif', 'png', 'jpeg', 'txt');// 设置附件上传类型
        $upload->rootPath = "./Public/Uploads/"; // 设置附件上传根目录
        $upload->savePath = ''; // 设置附件上传（子）目录
        $info = $upload->uploadOne($_FILES['file']);
        if (!$info) {// 上传错误提示错误信息
            $data = [
                "status" => 0,
                "msg" => "上传失败1," . $upload->getError()
            ];
        } else {// 上传成功
            $file->saccessory = $info['name'];
            $file->saccessoryfilename = $info['savepath'] . $info['savename'];
            if ($fid = $file->add()) {
                $data = [
                    "fname" => $info['name'],
                    "fid" => $fid,
                    "status" => 1,
                    "msg" => "上传成功"
                ];
            } else {
                $data = [
                    "status" => 0,
                    "msg" => "上传失败2," . $file->getError()
                ];
            }
        }
        echo json_encode($data);
        die;
    }

    public function test()
    {
        $into = "";
        $str = "./Public/Uploads/2017-05-10/1.txt";
        if (unlink($str)) {
            $into = "detele  file";
        } else {
            $into = "not detele  file";
        }
        $data = [
            "into" => $into,
            "str" => $str
        ];
        echo json_encode($data);
    }

//删除文件
    public function deletefile()
    {
        $into = "";
        $file = M('File');
        $flist = $_POST['flist'];
        $arrfid = array();
        $arr = array();
        foreach ($flist as $value) {
            $into = $value;
            $fname = $file->where("fid=" . $value)->find();
            if (!empty($fname)) {
                //删除数据库与文件
                $result = $file->delete($fname['fid']);
                $into = "find file--";
                if ($result > 0) {//数据库中的数据删除成功
                    if (unlink("./Public/Uploads/" . $fname['saccessoryfilename'])) {
                        $into = "detele  file";
                        $arrfid[$fname['fid']] = "1";
                        $arr[$fname['saccessory']] = "1";
                    } else {
                        $arrfid[$fname['fid']] = "0";
                        $arr[$fname['saccessory']] = "0";
                    }
                }
            }
        }
        $data = [
            "fidlist" => $arrfid,
            "flist" => $arr
        ];

        echo json_encode($data);
    }

//跟新学生信息
    public function updateinfo()
    {
        $student = M('Student');
        if ($student->create()) {
//            $student->updatetime = time();
            if ($insertid = $student->save()) {
                $this->success('更新成功,受影响的行数为' . $insertid, U(read));
            } else {
                $this->error('跟新失败', U(read));
//                print_r($student);
            }
        } else {
            // 如果创建失败 表示验证没有通过 输出错误提示信息
            exit($this->error($student->getError()));
        }
    }

//读取详细信息,包括读取评论信息
    public function detailinfo()
    {
        $file = M('File');
        $student = M('Student');
        $sid = (int)$_GET['sid'];

        $filelist = $file->where("sid=$sid")->select();
        $list = $student->where("sid=$sid")->find();
        //评论列表
        $comment = $this->CommentList($sid, $pid = 0, $commentList = array(), $spac = 0, $pauthor = NULL);
//       print_r($comment);
        $this->assign('filelistinfo', $filelist);
        $this->assign('commentList', array_reverse($comment));
        $this->assign('student', $list);
        $this->assign('title', '显示用户详细息');
        $this->display();
    }

//审核是或否通过
    public function checkinfo()
    {
        $student = M('Student');
        $sid = (int)$_GET['sid'];
        $state = (int)$_GET['state'];
        $date['state'] = $state;
        $date['fileteacher'] = $_SESSION['admin_username'];
        if ($insertid = $student->where("sid=$sid")->field('state', 'fileteacher')->save($date)) {
            $this->success('签约成功!' . $insertid, U(detailinfo, array('sid' => $sid)));
        } else {
            $this->error('签约失败!请联管理员', U(read));
        }
    }

//文件下载
    public function downloadfile()
    {
        if (IS_GET) {
            $file = M('File');
            $fid = (int)$_GET['fid'];
            $list = $file->where("fid=$fid")->find();
            if (!$list['fid'] == "") {
                $url = "./Public/Uploads/" . $list['saccessoryfilename'];
//            import('Org.Net.Http');
                $this->download($url, $list['saccessory']);
            }
        }
    }

    public function download($file_url, $new_name = '')
    {
        if (!isset($file_url) || trim($file_url) == '') {
            echo '500';
        }
//        if (!file_exists($file_url)) { //检查文件是否存在
//            echo "<script>alert(".$file_url."'不存在')</script>";
//        }
        if (!file_exists($file_url)) { //检查文件是否存在
            echo $file_url . "不存在";
        }
        $file_name = basename($file_url);
//        $file_type=explode('.',$file_url);
//        $file_type=$file_type[count($file_type)-1];
        $file_name = trim($new_name == '') ? $file_name : urlencode($new_name);
        $file_type = fopen($file_url, 'r'); //打开文件
        //输入文件标签
        header("Content-type: application/octet-stream");
        header("Accept-Ranges: bytes");
        header("Accept-Length: " . filesize($file_url));
        header("Content-Disposition: attachment; filename=" . $file_name);
        //输出文件内容
        echo fread($file_type, filesize($file_url));
        fclose($file_type);

    }

//评论列表
    function CommentList($sid = 0, $pid = 0, &$commentList = array(), $spac = 0, $pauthor = NULL)
    {
        static $i = 0;
        $spac = $spac + 1;//初始为1级评论
        $pauthor = $pauthor;
        $List = M('Comment')->
        field('think_comment.sid,think_comment.id,think_comment.add_time,think_comment.author,think_comment.content,pid,think_comment.id,think_comment.pid')->where(array('think_comment.pid' => $pid, 'think_comment.sid' => $sid))->select();
        foreach ($List as $k => $v) {
            $commentList[$i]['level'] = $spac;//评论层级
            $commentList[$i]['sid'] = $v['sid'];
            $commentList[$i]['author'] = $v['author'];
            $commentList[$i]['id'] = $v['id'];
            $commentList[$i]['pid'] = $v['pid'];//此条评论的父id
            $commentList[$i]['content'] = $v['content'];
            $commentList[$i]['time'] = $v['add_time'];
            $commentList[$i]['pauthor'] = $pauthor;
            $i++;
            $this->CommentList($v['sid'], $v['id'], $commentList, $spac, $v['author']);
        }
        return $commentList;
    }
}