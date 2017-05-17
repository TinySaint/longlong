<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/20 0020
 * Time: 19:55
 */

namespace Admin\Model;
use Think\Model;

class UserModel extends Model
{
    // 定义自动验证
    protected $_validate    =   array(
        array('verify','require','验证码必须！请返回修改..'),  // 都有时间都验证
//        array('verify','require','<script>alert(\'提示内容\')</script>'),  // 都有时间都验证
        array('username','checkName','帐号错误！请返回修改..',1,'function',4),  // 只在登录时候验证
        array('userpassword','checkPwd','密码错误！请返回修改..',1,'function',4), // 只在登录时候验证
//        array('username','','出错啦！帐号名称已经存在！',0,'unique',self::VALUE_VALIDAT),
        array('username','','帐号名称已经存在！请返回修改..',0,'unique',1),
    );
}