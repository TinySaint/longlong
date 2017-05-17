<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/20 0020
 * Time: 21:18
 */

namespace Admin\Controller;
use Think\Controller;

class CommentController extends  Controller
{
    //添加评论
    public function  addComment(){
        $rules = array(//定义动态验证规则
            array('comment','require','评论不能为空！'),
            array('username','require','昵称不能为空'),
//            array('username', '1,15', '用户名长度必须在1-15位之间！', 0, 'length', 3),
        );
        $data=array(
            'content'=>$_POST['comment'],
            'ip'=>get_client_ip(),
            'add_time'=>time(),
            'pid'=>I('post.pid'),
            'author'=>I('post.author'),
            'sid'=>I('post.sid'),
        );
//            print_r($_POST);
        $sid=I('post.sid');
        $student=M('Student');
        $comment = M("comment"); // 实例化User对象
        if (!$comment->validate($rules)->create()){//验证昵称和评论
            exit($comment->getError());
        }else{
            $add=$comment->add($data);
            $student->where("sid=".$sid)->setField('lastcomment',time());
            if($add){
                $this->success('评论成功');
            }else{
                $this->error('评论失败');
            }
        }
    }

    //删除评论
    public function deteleComment(){
        $comment=M('Comment');
        $id=$_GET['id'];
        if ($res=$comment->delete($id)){
            $this->success("删除成功");
        }else{
            $this->error("删除失败！");
        }
    }

}