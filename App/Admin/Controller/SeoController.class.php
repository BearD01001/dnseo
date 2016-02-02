<?php
/**
 * Created by PhpStorm.
 * User: Marsn9
 * Date: 14-10-7
 * Time: 下午9:15
 */
Namespace Admin\Controller;
Use Think\Controller;
Class SeoController Extends AdminController {
    Public function common() {
        $db = M('seo_common');
        if(IS_POST) {
            if($res = $db->find(1)) {
                $res = $db->where(1)->save(I('post.'));
            } else {
                $res = $db->add(I('post.'));
            }
            $res ? $this->ajaxReturn(array('status' => 1, 'info' => 'SEO基本设置保存成功！')) : $this->ajaxReturn(array('status' => 0, 'info' => 'SEO基本设置保存失败！'));
        } else {
            $res = $db->find(1);
            $this->data = $res;
            $this->display();
        }
    }
    Public function home() {
        $db = M('seo_home');
        if(IS_POST) {
            $data = I('post.');
            $data['category'] = implode(',', I('post.category'));
            if($res = $db->find(1)) {
                $res = $db->where(1)->save($data);
            } else {
                $res = $db->add($data);
            }
            $res ? $this->ajaxReturn(array('status' => 1, 'info' => 'SEO首页设置保存成功！')) : $this->ajaxReturn(array('status' => 0, 'info' => 'SEO首页设置保存失败！'));
        } else {
            $res = $db->find(1);
            $data = $res;
            $res = M('domain_category')->field('id, name')->order('sort')->select();
            $categories = $res;
            $category = explode(',', $data['category']);
            foreach($categories as $key => $value) {
                foreach($value as $k=>$v) {
                    if($k == 'id') {
                        if(in_array($v, $category)) {
                            $categories[$key]['checked'] = 1;
                        }
                    }
                }
            }
            $data['category'] = $categories;
            $this->data = $data;
            $this->display();
        }
    }
    Public function category() {
        $db = M('seo_category');
        if(IS_POST) {
            if($res = $db->find(1)) {
                $res = $db->where(1)->save(I('post.'));
            } else {
                $res = $db->add(I('post.'));
            }
            $res ? $this->ajaxReturn(array('status' => 1, 'info' => 'SEO分类页设置保存成功！')) : $this->ajaxReturn(array('status' => 0, 'info' => 'SEO分类页设置保存失败！'));
        } else {
            $res = $db->find(1);
            $this->data = $res;
            $this->display();
        }
    }
    Public function sellPage() {
        $db = M('seo_sell_page');
        if(IS_POST) {
            if($res = $db->find(1)) {
                $res = $db->where(1)->save(I('post.'));
            } else {
                $res = $db->add(I('post.'));
            }
            $res ? $this->ajaxReturn(array('status' => 1, 'info' => 'SEO域名出售页设置保存成功！')) : $this->ajaxReturn(array('status' => 0, 'info' => 'SEO域名出售页设置保存失败！'));
        } else {
            $res = $db->find(1);
            $this->data = $res;
            $this->display();
        }
    }
}