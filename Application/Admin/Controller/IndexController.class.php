<?php
namespace Admin\Controller;

use Think\Controller;

class IndexController extends Controller
{
//
//    protected function _initialize(){
//        if( $_SESSION['admin_login'] != 1){
//            $this->redirect('Login/index', array(), 3, '..请先登陆..');
//        }
//    }
    public function index()
    {
        $user = M('User');
        $count = $user->count();
        $Page = new \Think\Page($count, 12);
//        echo $userinfo->_sql();
        $show = $Page->show();// 分页显示输出
        $userinfo = $user->order('uid')->limit($Page->firstRow . ',' . $Page->listRows)->select();
//        $userinfoinfo = $userinfo->select();
        $this->assign('userinfo', $userinfo);
        $this->assign('page', $show);
        $this->display();
    }
    
    //添加用户
    public function add()
    {
        $user = D('User');
        if (!$user->create()){
            // 如果创建失败 表示验证没有通过 输出错误提示信息
            exit($user->getError());
        }else{
            // 验证通过 可以进行其他数据操作
            if ($user->add()) {
                if($_SESSION['admin_type'] == 0){
                    $this->redirect('Index/index', array(), 1, '..添加成功..');
                }else{
                    $this->redirect('User/read', array(), 1, '..添加成功..');
                }
            } else {
                $this->error($user->getError());
            }
        }

    }

    //  删除用户
    public function deleteuserinfo()
    {
        $data = I('get.');
        $user = M('User');
        if ($user->where(array('uid' => $data['uid']))->delete()) {
            $this->redirect('Index/index', array(), 0, '..删除成功..');
        }
    }

   //用户添加页面
    public function adduser()
    {
        $this->display();
    }
    
    //用户编辑页面
    public function edituser()
    {
        $user = M('User');
        $uid = (int)$_GET['uid'];
        $list = $user->where("uid=$uid")->find();
        $this->assign('user', $list);
        $this->assign('title', '显示用户编辑信息');
        $this->display();
    }

    public function updateinfo()
    {
        $user = M('User');
        if ($user->create()) {
            if ($insertid = $user->save()) {
                $this->success('更新成功,受影响的行数为' . $insertid, U(index));
            } else {
                $this->error('更新失败', U(index));
            }
        }
    }
    public function hello()
    {
        $this->display(U(index));
    }

}