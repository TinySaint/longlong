<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/22 0022
 * Time: 11:36
 */
namespace Home\Model;
use Think\Model;
class FormModel extends Model {
    // 定义自动验证
    protected $_validate    =   array(
        array('title','require','标题必须'),
    );
    // 定义自动完成
    protected $_auto    =   array(
        array('create_time','time',1,'function'),
    );
}