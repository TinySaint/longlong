<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/9 0009
 * Time: 17:03
 */

namespace Admin\Controller;
use Think\Controller;

class TestController extends Controller
{
    public function index()
    {
        $this->display();
    }

    public function uploadfile()
    {
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 0;// 设置附件上传大小
//        $upload->exts = array('jpg', 'gif', 'png', 'jpeg', 'txt');// 设置附件上传类型
        $upload->rootPath = "./Public/Uploads/"; // 设置附件上传根目录
        $upload->savePath = ''; // 设置附件上传（子）目录
        $info = $upload->uploadOne($_FILES['file']);
        if (!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        } else {

        }
    }

    public function detelfile(){

    }

    public function up2()
    {
        $file = M('file');
        $file->addtime = time();
        $file->sname = $_POST['sname'];
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
            if ($file->add()) {
                $data = [
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

    public function up3(){
        $file = M('File');
        $file->addtime = time();
        $file->sname = $_POST['sname'];
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
            $this->error($upload->getError());
        } else {// 上传成功
            $file->saccessory = $info['name'];
            $file->saccessoryfilename = $info['savepath'] . $info['savename'];
            if ($file->add()) {
                $this->success("文件上传成功");
            } else {
                $this->error($file->getError());
            }
        }
        die;
    }
}