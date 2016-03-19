<?php
/**
 * Created by PhpStorm.
 * User: Marsn9
 * Date: 14-9-13
 * Time: 下午6:11
 */
Namespace Admin\Controller;
Use Think\Controller;
Class AdminController Extends Controller {
    Public function _initialize() {
        $nowTime = time();
        if(!session('handletime')){
            $this->redirect('Login/index');
        }else if($nowTime - session('handletime') > 1800) {
            session_unset();
            session_destroy();
            $this->error('登录超时，请重新登录！', U('Login/index'));
        } else {
            session('handletime', $nowTime);
        }
    }
    Public function home() {
        $this->display();
    }
    Public function frame() {
        $this->username = $_SESSION['username'];
        $this->logintime = date('Y-m-d H:i', $_SESSION['logintime']);
        $this->loginip = $_SESSION['loginip'];
        $this->display();
    }
}