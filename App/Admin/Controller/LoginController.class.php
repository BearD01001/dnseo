<?php
/**
 * Created by PhpStorm.
 * User: Marsn9
 * Date: 14-9-13
 * Time: 下午3:59
 */
Namespace Admin\Controller;
Use Think\Controller;
Class LoginController Extends Controller {
    Public function index() {
        $this->display();
    }
    Public function loginCheck() {
        if(IS_POST) {
            $verify = New \Think\Verify();
            $verifyCode = $_POST['verify'];
            if(!$verifyCode) {
                $this->ajaxReturn(array('status' => 0, 'info' => '验证码不能为空！'));
            }
            if(!$verify->check($verifyCode)) {
                $this->ajaxReturn(array('status' => 0, 'info' => '验证码错误！'));
            }

            $username = $_POST['username'];
            $pwd = md5($_POST['pwd']);
            if(!$username || !$pwd) {
                $this->ajaxReturn(array('status' => 0, 'info' => '用户名或密码为空！'));
            }

            $admin = M('setting_admin')->where(array('username' => $_POST['username']))->find();
            if(!$admin || $pwd != $admin['password']) {
                $this->ajaxReturn(array('status' => 0, 'info' => '用户名或密码错误！'));
            }
            $nowTime = time();
            $data = array(
                'id' => $admin['id'],
                'logintime' => $nowTime,
                'loginip' => get_client_ip()
            );
//            M('admin')->save($data);
            session('uid', $admin['id']);
            session('username', $admin['username']);
            session('logintime', $admin['logintime']);
            session('handletime', $nowTime);
            session('loginip', $admin['loginip']);
            $this->ajaxReturn(array('status' => 1, 'info' => '登录成功，正在跳转...', 'url' => U('Admin/frame')));
        }
    }
    Public function logout() {
        session_unset();
        session_destroy();
        $this->ajaxReturn(array('status' => 1, 'info' => '已成功退出登录！', 'url' => U('index')));
    }
    Public function verify() {
        $config = array(
            'fontSize' => '50px', // 验证码字体大小
            'length' => 4, // 验证码位数
            'useNoise' => false, // 关闭验证码杂点
            'expire' => 30,
            'codeSet' => '0123456789'
        );
        ob_clean();
        $Verify = New \Think\Verify($config);
        $Verify->entry();
    }
}