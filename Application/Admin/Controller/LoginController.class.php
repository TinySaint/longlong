<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/29 0029
 * Time: 21:14
 */

namespace Admin\Controller;

use Think\Controller;

class LoginController extends Controller
{
    public function index()
    {
        $this->display();
    }

    public function login()
    {
        $User = D('User');
        $fcode = $_POST['verify'];
        $username = $_POST['username'];
        $userpassword = $_POST['userpassword'];
        if (!$User->create($_POST, 4)) { // 登录验证数据
            // 验证没有通过 输出错误提示信息
            $User->getError();
        } else {
            if ($this->checkverify($fcode, 1)) {
                $this->error('验证码错误！', U('index'));
            } else {
                $where = "username='{$username}' and userpassword='{$userpassword}'";
                $row = $User->where($where)->find();
                if ($row) {
                    $_SESSION['admin_username'] = $username;
                    $_SESSION['admin_uid'] = $row['uid'];
                    $_SESSION['admin_login'] = 1;
                    $_SESSION['admin_type'] = $row['usertype'];
//                    print_r($_SESSION);
                    switch ($row['usertype']){
                        case 0:
                            $this->success('登陆成功！', U('Read/adminread'));
                            break;
                        case 1:
                            $this->success('登陆成功！', U('Read/fileteacherread'));
                            break;
                        case 2:
                            $this->success('登陆成功！', U('Read/introduceread'));
                            break;
                        default:
                    }

                } else {
                    $this->error('用户或密码错误！', U('index'));
                }
            }
        }
    }

    /**
     * 用户注销
     */
    public function logout()
    {
        // 清楚所有session
        session(null);
        redirect(U(index), 0, '正在退出登录...');
    }

    public
    function verify()
    {
        $config = array(
            'fontSize' => 15,    // 验证码字体大小
            'length' => 4,     // 验证码位数
            'useNoise' => false, // 关闭验证码杂点
            'codeSet' => '0123456789',
            'fontttf' => '5.ttf',
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }

// 检测输入的验证码是否正确，$code为用户输入的验证码字符串
    public
    function checkverify($code, $id = '')
    {
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }
}