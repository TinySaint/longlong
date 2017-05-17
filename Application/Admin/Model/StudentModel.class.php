<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/23 0023
 * Time: 10:49
 */

namespace Admin\Model;
use Think\Model;

class StudentModel extends Model
{
    // 定义自动验证
    protected $_validate    =   array(
        array('name','require','学生姓名必须！请返回修改..'),
        //array('name','','学生名称已经存在！请返回修改..',0,'unique',1),
        array('telephone','require','电话必须填写！请返回修改..'),
        array('telephone','','电话已经存在！请返回修改..',0,'unique',1),
    );
}