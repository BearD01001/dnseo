<?php
/**
 * Created by PhpStorm.
 * User: Marsn9
 * Date: 14-9-23
 * Time: 下午9:32
 */
Namespace Admin\Controller;
Use Think\Controller;
Class SettingController Extends AdminController {
    Public function common() {
        $db = M('setting_common');
        if(IS_POST) {
            if($db->where(array('id' => 1))->find()) {
                $res = $db->where(array('id' => 1))->save(I('post.'));
            } else {
                $res = $db->add(I('post.'));
            }
            $res != false ? $this->ajaxReturn(array('status' => 1, 'info' => '米表设置保存成功！')) : $this->ajaxReturn(array('status' => 0, 'info' => '设置未修改或数据库操作失败！'));
        } else {
            $data = $db->where(array('id' => 1))->select();
            $this->data = $data[0];
            $this->display();
        }
    }

    Public function admin() {
        $db = M('setting_admin');
        if(IS_POST) {
            if($res = $db->where(array('id' => 1))->select()) {
                if(md5(I('post.password_original')) != $res[0]['password']) {
                    $this->ajaxReturn(array('status' => 0, 'info' => '原密码错误！'));
                } else {
                    if(I('post.password') != '' && I('post.password') != I('post.password_confirm')) {
                        $this->ajaxReturn(array('status' => 0, 'info' => '确认新密码与新密码不一致！'));
                    }
                    $data = I('post.');
                    if(I('post.password') == '') unset($data['password']);
                    else $data['password'] = md5($data['password']);
                    unset($data['password_original']);
                    unset($data['password_confirm']);
                    $data['id'] = 1;
                    $res = $db->save($data);
                }
            } else {
                $this->ajaxReturn(array('status' => 0, 'info' => '系统错误，请稍后再试！'));
            }
            $res != false ? $this->ajaxReturn(array('status' => 1, 'info' => '管理员信息修改成功！设置将在下次登录生效。')) : $this->ajaxReturn(array('status' => 0, 'info' => '设信息未修改或数据库操作失败！'));
        } else {
            $data = $db->field('username')->select();
            $this->data = $data[0];
            $this->display();
        }
    }
    Public function link() {
        $db = M('setting_link');
        if(IS_POST) {
            if(I('get.type') == 'delete') {
                $where = implode(',', I('post.link_id'));
                $res = $db->delete($where);
                $res ? $this->ajaxReturn(array('status' => 1, 'info' => '批量删除成功！')) : $this->ajaxReturn(array('status' => 0, 'info' => '批量删除失败！'));
            }
        } else if(I('get.type') == 'delete' && I('get.id') != '') {
            $res = $db->delete(I('get.id'));
            $res ? $this->ajaxReturn(array('status' => 1, 'info' => '删除成功！')) : $this->ajaxReturn(array('status' => 0, 'info' => '删除失败！'));
        } else {
            $data = $db->select();
            $this->data = $data;
            $this->display();
        }
    }
    Public function linkAdd() {
        $db = M('setting_link');
        if(I('get.id') != '') {
            $res = $db->find(I('get.id', '', 'int'));
            $data = $res;
            $this->data = $data;
        } else if(IS_POST && I('post.id') != '') {
            $res = $db->save(I('post.'));
            $res ? $this->ajaxReturn(array('status' => 1, 'info' => '友链编辑成功！')) : $this->ajaxReturn(array('status' => 0, 'info' => '友链编辑失败！'));
        } else if(IS_POST && empty($_POST['id'])) {
            $data = I('post.');
            $data['time'] = time();
            $res = $db->add($data);
            $res ? $this->ajaxReturn(array('status' => 1, 'info' => '友链添加成功！')) : $this->ajaxReturn(array('status' => 0, 'info' => '友链添加失败！'));
        }
        $this->display();
    }
}