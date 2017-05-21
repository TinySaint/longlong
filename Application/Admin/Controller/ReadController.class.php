<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/20 0020
 * Time: 9:29
 */

namespace Admin\Controller;


use Think\Controller;

class ReadController extends Controller
{
    /**
     * Function name:adminread
     * Function description:
     * admin read student
     */
    public function adminread()
    {
        $condition = array();
        $user=M('User');
        $introducelist = M('User')->where('usertype=2')->select();
        $condition['checkinfo'] = array('elt', 2);
        if (!empty($_GET['name'])) {
            $condition['name'] = array('like', '%' . $_GET['name'] . '%');
        }
        if (!empty($_GET['introduceid'])) {
            $condition['introduceid'] = $_GET['introduceid'];
        }
        if (!empty($_GET['studyabroad'])) {
            $condition['studyabroad'] = array('like', '%' . $_GET['studyabroad'] . '%');
        }
        if (!empty($_GET['telephone'])) {
            $condition['telephone'] = array('like', '%' . $_GET['telephone'] . '%');
        }
        if (!empty($_GET['major'])) {
            $condition['major'] = array('like', '%' . $_GET['major'] . '%');
        }
        if (!empty($_GET['infotype'])) {
            $condition['infotype'] = array('like', '%' . $_GET['infotype'] . '%');
        }
        if (!empty($_GET['addtime']) and !empty($_GET['addtime2'])) {
            $condition['addtime'] = array(array('egt', strtotime($_GET['addtime'])), array('elt', strtotime($_GET['addtime2'])));
        } elseif (!empty($_GET['addtime'])) {
            $condition['addtime'] = array('egt', strtotime($_GET['addtime']));
        } elseif (!empty($_GET['addtime2'])) {
            $condition['addtime'] = array('elt', strtotime($_GET['addtime2']));
        }
        if (!empty($_GET['lastcomment']) and !empty($_GET['lastcomment2'])) {
            $condition['lastcomment'] = array(array('egt', strtotime($_GET['lastcomment'])), array('elt', strtotime($_GET['lastcomment2'])));
        } elseif (!empty($_GET['lastcomment'])) {
            $condition['lastcomment'] = array('egt', strtotime($_GET['lastcomment']));
        } elseif (!empty($_GET['lastcomment2'])) {
            $condition['lastcomment'] = array('elt', strtotime($_GET['lastcomment2']));
        }

        if (!empty($_GET['state'])) {
            $condition['state'] = $_GET['state'];
        }

        $result = $this->read($condition);
        $studentlist=$result['studentinfo'];
        $num=count($studentlist);
        for($i=0;$i<$num;++$i){
            $introduceid=$studentlist[$i]['introduceid'];
            $username=$user->where("uid=$introduceid")->getField('username');
            $studentlist[$i]['introducename']=$username;
        }

        if (!empty($_GET)) {
            $this->assign('get', $_GET);
        }
        $this->assign('studentinfo', $studentlist);
        $this->assign('page', $result['page']);
        $this->assign('introducelist', $introducelist);
        $this->assign('condition', $condition);
        $this->display();

    }

    /**
     * Function name:checkpendingread
     * Function description:
     * check pending read
     */
    public function checkpendingread()
    {
        $condition = array();
        $user=M('User');
        $introducelist = M('User')->where('usertype=2')->select();
        $condition['checkinfo'] = array('eq', 3);
        if (!empty($_GET['name'])) {
            $condition['name'] = array('like', '%' . $_GET['name'] . '%');
        }
        if (!empty($_GET['introduceid'])) {
            $condition['introduceid'] = $_GET['introduceid'];
        }
        if (!empty($_GET['studyabroad'])) {
            $condition['studyabroad'] = array('like', '%' . $_GET['studyabroad'] . '%');
        }
        if (!empty($_GET['telephone'])) {
            $condition['telephone'] = array('like', '%' . $_GET['telephone'] . '%');
        }
        if (!empty($_GET['major'])) {
            $condition['major'] = array('like', '%' . $_GET['major'] . '%');
        }
        if (!empty($_GET['infotype'])) {
            $condition['infotype'] = array('like', '%' . $_GET['infotype'] . '%');
        }
        if (!empty($_GET['addtime']) and !empty($_GET['addtime2'])) {
            $condition['addtime'] = array(array('egt', strtotime($_GET['addtime'])), array('elt', strtotime($_GET['addtime2'])));
        } elseif (!empty($_GET['addtime'])) {
            $condition['addtime'] = array('egt', strtotime($_GET['addtime']));
        } elseif (!empty($_GET['addtime2'])) {
            $condition['addtime'] = array('elt', strtotime($_GET['addtime2']));
        }
        if (!empty($_GET['lastcomment']) and !empty($_GET['lastcomment2'])) {
            $condition['lastcomment'] = array(array('egt', strtotime($_GET['lastcomment'])), array('elt', strtotime($_GET['lastcomment2'])));
        } elseif (!empty($_GET['lastcomment'])) {
            $condition['lastcomment'] = array('egt', strtotime($_GET['lastcomment']));
        } elseif (!empty($_GET['lastcomment2'])) {
            $condition['lastcomment'] = array('elt', strtotime($_GET['lastcomment2']));
        }

        if (!empty($_GET['state'])) {
            $condition['state'] = $_GET['state'];
        }

        $result = $this->read($condition);
        $studentlist=$result['studentinfo'];
        $num=count($studentlist);
        for($i=0;$i<$num;++$i){
            $introduceid=$studentlist[$i]['introduceid'];
            $username=$user->where("uid=$introduceid")->getField('username');
            $studentlist[$i]['introducename']=$username;
        }
        if (!empty($_GET)) {
            $this->assign('get', $_GET);
        }
        $this->assign('studentinfo',$studentlist);
        $this->assign('page', $result['page']);
        $this->assign('introducelist', $introducelist);
        $this->assign('condition', $condition);
        $this->display();

    }

    /**
     * Function name:checkread
     * Function description:
     * pass the audit
     */
    public function checkread()
    {
        $user=M('User');
        $condition = array();
        $introducelist = M('User')->where('usertype=2')->select();
        $condition['checkinfo'] = array('eq', 4);
        if (!empty($_GET['name'])) {
            $condition['name'] = array('like', '%' . $_GET['name'] . '%');
        }
        if (!empty($_GET['introduceid'])) {
            $condition['introduceid'] = $_GET['introduceid'];
        }
        if (!empty($_GET['studyabroad'])) {
            $condition['studyabroad'] = array('like', '%' . $_GET['studyabroad'] . '%');
        }
        if (!empty($_GET['telephone'])) {
            $condition['telephone'] = array('like', '%' . $_GET['telephone'] . '%');
        }
        if (!empty($_GET['major'])) {
            $condition['major'] = array('like', '%' . $_GET['major'] . '%');
        }
        if (!empty($_GET['infotype'])) {
            $condition['infotype'] = array('like', '%' . $_GET['infotype'] . '%');
        }
        if (!empty($_GET['addtime']) and !empty($_GET['addtime2'])) {
            $condition['addtime'] = array(array('egt', strtotime($_GET['addtime'])), array('elt', strtotime($_GET['addtime2'])));
        } elseif (!empty($_GET['addtime'])) {
            $condition['addtime'] = array('egt', strtotime($_GET['addtime']));
        } elseif (!empty($_GET['addtime2'])) {
            $condition['addtime'] = array('elt', strtotime($_GET['addtime2']));
        }
        if (!empty($_GET['lastcomment']) and !empty($_GET['lastcomment2'])) {
            $condition['lastcomment'] = array(array('egt', strtotime($_GET['lastcomment'])), array('elt', strtotime($_GET['lastcomment2'])));
        } elseif (!empty($_GET['lastcomment'])) {
            $condition['lastcomment'] = array('egt', strtotime($_GET['lastcomment']));
        } elseif (!empty($_GET['lastcomment2'])) {
            $condition['lastcomment'] = array('elt', strtotime($_GET['lastcomment2']));
        }

        if (!empty($_GET['state'])) {
            $condition['state'] = $_GET['state'];
        }
        $result = $this->read($condition);
        $studentlist=$result['studentinfo'];
        $num=count($studentlist);
        for($i=0;$i<$num;++$i){
            $introduceid=$studentlist[$i]['introduceid'];
            $username=$user->where("uid=$introduceid")->getField('username');
            $studentlist[$i]['introducename']=$username;
        }
        if (!empty($_GET)) {
            $this->assign('get', $_GET);
        }
        $this->assign('studentinfo', $studentlist);
        $this->assign('page', $result['page']);
        $this->assign('introducelist', $introducelist);
        $this->assign('condition', $condition);
        $this->display();
    }

    /**
     * Function name:insignificanceread
     * Function description:
     * insignificance student
     */
    public function insignificanceread()
    {
        $user=M('User');
        $condition = array();
        $introducelist = M('User')->where('usertype=2')->select();
        $condition['checkinfo'] = array('eq', 5);
        if (!empty($_GET['name'])) {
            $condition['name'] = array('like', '%' . $_GET['name'] . '%');
        }
        if (!empty($_GET['introduceid'])) {
            $condition['introduceid'] = $_GET['introduceid'];
        }
        if (!empty($_GET['studyabroad'])) {
            $condition['studyabroad'] = array('like', '%' . $_GET['studyabroad'] . '%');
        }
        if (!empty($_GET['telephone'])) {
            $condition['telephone'] = array('like', '%' . $_GET['telephone'] . '%');
        }
        if (!empty($_GET['major'])) {
            $condition['major'] = array('like', '%' . $_GET['major'] . '%');
        }
        if (!empty($_GET['infotype'])) {
            $condition['infotype'] = array('like', '%' . $_GET['infotype'] . '%');
        }
        if (!empty($_GET['addtime']) and !empty($_GET['addtime2'])) {
            $condition['addtime'] = array(array('egt', strtotime($_GET['addtime'])), array('elt', strtotime($_GET['addtime2'])));
        } elseif (!empty($_GET['addtime'])) {
            $condition['addtime'] = array('egt', strtotime($_GET['addtime']));
        } elseif (!empty($_GET['addtime2'])) {
            $condition['addtime'] = array('elt', strtotime($_GET['addtime2']));
        }
        if (!empty($_GET['lastcomment']) and !empty($_GET['lastcomment2'])) {
            $condition['lastcomment'] = array(array('egt', strtotime($_GET['lastcomment'])), array('elt', strtotime($_GET['lastcomment2'])));
        } elseif (!empty($_GET['lastcomment'])) {
            $condition['lastcomment'] = array('egt', strtotime($_GET['lastcomment']));
        } elseif (!empty($_GET['lastcomment2'])) {
            $condition['lastcomment'] = array('elt', strtotime($_GET['lastcomment2']));
        }

        if (!empty($_GET['state'])) {
            $condition['state'] = $_GET['state'];
        }

        $result = $this->read($condition);
        $studentlist=$result['studentinfo'];
        $num=count($studentlist);
        for($i=0;$i<$num;++$i){
            $introduceid=$studentlist[$i]['introduceid'];
            $username=$user->where("uid=$introduceid")->getField('username');
            $studentlist[$i]['introducename']=$username;
        }
        if (!empty($_GET)) {
            $this->assign('get', $_GET);
        }
        $this->assign('studentinfo', $studentlist);
        $this->assign('page', $result['page']);
        $this->assign('introducelist', $introducelist);
        $this->assign('condition', $condition);
        $this->display();

    }

    /**
     * Function name:introduceread
     * Function description:
     * introduce read
     */
    public function introduceread()
    {
        $condition = array();
        $user = M('User');
        $introducelist = $user->where('usertype=2')->select();
        $condition['checkinfo'] = array('elt', 2);
        if (!empty($_SESSION['admin_type'])) {
            $condition['introduceid'] = $_SESSION['admin_uid'];
        }
        if (!empty($_GET['name'])) {
            $condition['name'] = array('like', '%' . $_GET['name'] . '%');
        }

        if (!empty($_GET['studyabroad'])) {
            $condition['studyabroad'] = array('like', '%' . $_GET['studyabroad'] . '%');
        }
        if (!empty($_GET['telephone'])) {
            $condition['telephone'] = array('like', '%' . $_GET['telephone'] . '%');
        }
        if (!empty($_GET['major'])) {
            $condition['major'] = array('like', '%' . $_GET['major'] . '%');
        }
        if (!empty($_GET['infotype'])) {
            $condition['infotype'] = array('like', '%' . $_GET['infotype'] . '%');
        }
        if (!empty($_GET['addtime']) and !empty($_GET['addtime2'])) {
            $condition['addtime'] = array(array('egt', strtotime($_GET['addtime'])), array('elt', strtotime($_GET['addtime2'])));
        } elseif (!empty($_GET['addtime'])) {
            $condition['addtime'] = array('egt', strtotime($_GET['addtime']));
        } elseif (!empty($_GET['addtime2'])) {
            $condition['addtime'] = array('elt', strtotime($_GET['addtime2']));
        }
        if (!empty($_GET['lastcomment']) and !empty($_GET['lastcomment2'])) {
            $condition['lastcomment'] = array(array('egt', strtotime($_GET['lastcomment'])), array('elt', strtotime($_GET['lastcomment2'])));
        } elseif (!empty($_GET['lastcomment'])) {
            $condition['lastcomment'] = array('egt', strtotime($_GET['lastcomment']));
        } elseif (!empty($_GET['lastcomment2'])) {
            $condition['lastcomment'] = array('elt', strtotime($_GET['lastcomment2']));
        }

        if (!empty($_GET['state'])) {
            $condition['state'] = $_GET['state'];
        }

        $result = $this->read($condition);

//        $studentlist=$result['studentinfo'];
//        $num = count($studentlist);
//        for($i=0;$i<$num;++$i){
//            $uid= $studentlist[$i]['introduceid'];
//            $result['studentinfo'][$i]['introducename']= "$uid";
//        }

        if (!empty($_GET)) {
            $this->assign('get', $_GET);
        }
        $this->assign('studentinfo', $result['studentinfo']);
        $this->assign('page', $result['page']);
        $this->assign('introducelist', $introducelist);
        $this->assign('condition', $condition);
        $this->display();
    }

    public function introducecheckread()
    {
        $condition = array();
        $introducelist = M('User')->where('usertype=2')->select();
        $condition['checkinfo'] = array('eq', 4);
        if (!empty($_SESSION['admin_type'])) {
            $condition['introduceid'] = $_SESSION['admin_uid'];
        }
        if (!empty($_GET['name'])) {
            $condition['name'] = array('like', '%' . $_GET['name'] . '%');
        }

        if (!empty($_GET['studyabroad'])) {
            $condition['studyabroad'] = array('like', '%' . $_GET['studyabroad'] . '%');
        }
        if (!empty($_GET['telephone'])) {
            $condition['telephone'] = array('like', '%' . $_GET['telephone'] . '%');
        }
        if (!empty($_GET['major'])) {
            $condition['major'] = array('like', '%' . $_GET['major'] . '%');
        }
        if (!empty($_GET['infotype'])) {
            $condition['infotype'] = array('like', '%' . $_GET['infotype'] . '%');
        }
        if (!empty($_GET['addtime']) and !empty($_GET['addtime2'])) {
            $condition['addtime'] = array(array('egt', strtotime($_GET['addtime'])), array('elt', strtotime($_GET['addtime2'])));
        } elseif (!empty($_GET['addtime'])) {
            $condition['addtime'] = array('egt', strtotime($_GET['addtime']));
        } elseif (!empty($_GET['addtime2'])) {
            $condition['addtime'] = array('elt', strtotime($_GET['addtime2']));
        }
        if (!empty($_GET['lastcomment']) and !empty($_GET['lastcomment2'])) {
            $condition['lastcomment'] = array(array('egt', strtotime($_GET['lastcomment'])), array('elt', strtotime($_GET['lastcomment2'])));
        } elseif (!empty($_GET['lastcomment'])) {
            $condition['lastcomment'] = array('egt', strtotime($_GET['lastcomment']));
        } elseif (!empty($_GET['lastcomment2'])) {
            $condition['lastcomment'] = array('elt', strtotime($_GET['lastcomment2']));
        }

        if (!empty($_GET['state'])) {
            $condition['state'] = $_GET['state'];
        }

        $result = $this->read($condition);
        if (!empty($_GET)) {
            $this->assign('get', $_GET);
        }
        $this->assign('studentinfo', $result['studentinfo']);
        $this->assign('page', $result['page']);
        $this->assign('introducelist', $introducelist);
        $this->assign('condition', $condition);
        $this->display();
    }

    /**
     * Function name:fileteacherread
     * Function description:
     * file teacher read
     */
    public function fileteacherread()
    {
        $user=M('User');
        $condition = array();
        $introducelist = M('User')->where('usertype=2')->select();
        $condition['checkinfo'] = array('eq', 4);
        if (!empty($_SESSION['admin_type'])) {
            $condition['fileteacherid'] = $_SESSION['admin_uid'];
        }
        if (!empty($_GET['name'])) {
            $condition['name'] = array('like', '%' . $_GET['name'] . '%');
        }

        if (!empty($_GET['studyabroad'])) {
            $condition['studyabroad'] = array('like', '%' . $_GET['studyabroad'] . '%');
        }
        if (!empty($_GET['telephone'])) {
            $condition['telephone'] = array('like', '%' . $_GET['telephone'] . '%');
        }
        if (!empty($_GET['major'])) {
            $condition['major'] = array('like', '%' . $_GET['major'] . '%');
        }
        if (!empty($_GET['infotype'])) {
            $condition['infotype'] = array('like', '%' . $_GET['infotype'] . '%');
        }
        if (!empty($_GET['addtime']) and !empty($_GET['addtime2'])) {
            $condition['addtime'] = array(array('egt', strtotime($_GET['addtime'])), array('elt', strtotime($_GET['addtime2'])));
        } elseif (!empty($_GET['addtime'])) {
            $condition['addtime'] = array('egt', strtotime($_GET['addtime']));
        } elseif (!empty($_GET['addtime2'])) {
            $condition['addtime'] = array('elt', strtotime($_GET['addtime2']));
        }
        if (!empty($_GET['lastcomment']) and !empty($_GET['lastcomment2'])) {
            $condition['lastcomment'] = array(array('egt', strtotime($_GET['lastcomment'])), array('elt', strtotime($_GET['lastcomment2'])));
        } elseif (!empty($_GET['lastcomment'])) {
            $condition['lastcomment'] = array('egt', strtotime($_GET['lastcomment']));
        } elseif (!empty($_GET['lastcomment2'])) {
            $condition['lastcomment'] = array('elt', strtotime($_GET['lastcomment2']));
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


        $result = $this->read($condition);
        $studentlist=$result['studentinfo'];
        $num=count($studentlist);
        for($i=0;$i<$num;++$i){
            $introduceid=$studentlist[$i]['introduceid'];
            $username=$user->where("uid=$introduceid")->getField('username');
            $studentlist[$i]['introducename']=$username;
        }
        if (!empty($_GET)) {
            $this->assign('get', $_GET);
        }
        $this->assign('studentinfo', $studentlist);
        $this->assign('page', $result['page']);
        $this->assign('introducelist', $introducelist);
        $this->assign('condition', $condition);
        $this->display();
    }


    /**
     * Function name:read
     * @param $conditions
     * @return mixed
     * Function description:
     *
     */
    public function read($conditions)
    {
        $student = M('Student');
        $count = $student->where($conditions)->count();
        $Page = new \Think\Page($count,50);
//        $Page->setConfig('header','个会员');
//        echo $student->_sql();
        $show = $Page->show();// 分页显示输出
        $studentinfo = $student->where($conditions)->order('sid')->limit($Page->firstRow . ',' . $Page->listRows)->select();

        $result['studentinfo'] = $studentinfo;
        $result['page'] = $show;

        return $result;
    }

}