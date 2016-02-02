<?php
/**
 * Created by PhpStorm.
 * User: Marsn9
 * Date: 14-10-16
 * Time: 下午12:25
 */
Namespace Admin\Controller;
Use Think\Controller;
Class DomainController Extends AdminController {
    Public function my() {
        $db = M('domain_my');
        $method = I('get.method');
        if($method == 'delete' && I('get.id') != '') {
            $res = $db->delete(I('get.id'));
            $res ? $this->ajaxReturn(array('status' => 1, 'info' => '删除成功！')) : $this->ajaxReturn(array('status' => 0, 'info' => '删除失败！'));
        } else if($method == 'delete' && I('get.id') == '') {
            $where = implode(',', I('post.id'));
            $res = $db->delete($where);
            $res ? $this->ajaxReturn(array('status' => 1, 'info' => '批量删除成功！')) : $this->ajaxReturn(array('status' => 0, 'info' => '批量删除失败！'));
        } else {
            /* 是否分类显示 */
            $where = '';
            if($method == 'category' && I('get.id') != '') {
                $where = 'category LIKE "%' . I('get.id') . '%"';
            }
            /* 分页操作 */
            $count = $db->where($where)->count();
            $page = new \Think\Page($count, 10);
            $page->setConfig('prev', '上一页');
            $page->setConfig('next', '下一页');
            $page->setConfig('theme', '%UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
            $show = $page->show();
            $list = $db->where($where)->order('time desc')->limit($page->firstRow.','.$page->listRows)->select();
            /* 分类替换 */
            $categories = M('domain_category')->field('id, name')->select();
            foreach($list as $key => $value) {
                $_category = explode(',', $value['category']);
                $list[$key]['category'] = '';
                $i2 = 0;
                foreach($categories as $k => $v) {
                    if(in_array($v['id'], $_category)) {
                        $list[$key]['category'] .= ($i2 == 0 ? '' : ',') . $v['name'];
                        $i2++;
                    }
                }
            }
            $this->list = $list;
            $this->page = $show;
            $this->categories = $categories;
        }
        $this->display();
    }
    /* 递归分组缩进 */
    Protected function categorySort($list, $parent = 0, $level = 0, $intend = '━━') {
        static $category = array();
        foreach($list as $v) {
            if($v['parent'] == $parent) {
                $v['sort'] = $level;
                $v['intend'] = str_repeat($intend, $level) . ($parent == 0 ? '' : '&nbsp;');
                $category[] = $v;
                $this->categorySort($list, $v['id'], $level + 1);
            }
        }
        return $category;
    }
    Public function category() {
        $db = M('domain_category');
        $method = I('get.method');
        if($method == 'delete') {
            /* 禁止删除非空分类 */
            $db2 = M('domain_my');
            $res2 = $db2->where('category LIKE "%' . I('get.id') . '%"')->count();
            if($res2 == 0) {
                $res = $db->delete(I('get.id'));
            } else {
                $this->ajaxReturn(array('status' => 0, 'title' => '删除失败', 'info' => '请先删除该分类下的所有域名！'));
            }
            $res ? $this->ajaxReturn(array('status' => 1, 'info' => '删除成功！')) : $this->ajaxReturn(array('status' => 0, 'info' => '删除失败！'));
        } else if($method == 'deleteBulk') {
            $categories = I('post.category_id');
            $db2 = M('domain_my');
            $break = false;
            foreach($categories as $v) {
                $res2 = $db2->where('category LIKE "%' . $v . '%"')->count();
                if($res2 != 0) {
                    $break = true;
                    break;
                }
            }
            if($break) {
                $this->ajaxReturn(array('status' => 0, 'title' => '删除失败', 'info' => '请先删除所选各个分类下的所有域名！'));
            } else {
                $where = implode(',', $categories);
                $res = $db->delete($where);
            }
            $res ? $this->ajaxReturn(array('status' => 1, 'info' => '批量删除分类成功！')) : $this->ajaxReturn(array('status' => 0, 'info' => '批量删除分类失败！'));
        } else {
            $res = $db->order('sort')->select();
            $data = array();
            foreach($res as $i) {
                $keyword = mb_substr($i['keyword'], 0, 10, 'utf-8');
                $desc = mb_substr($i['desc'], 0, 20, 'utf-8');
                strlen($keyword) == strlen($i['keyword']) ? '' : ($i['keyword'] = $keyword . '...');
                strlen($desc) == strlen($i['desc']) ? '' : ($i['desc'] = $desc . '...');
                $data[] = $i;
            }
            $data = $this->categorySort($data);
            $this->data = $data;
        }
        $this->display();
    }
    Public function categoryAdd() {
        $db = M('domain_category');
        $id = I('get.id');
        if($id) {
            if(IS_POST) {
                $data = I('post.');
                $data['id'] = $id;
                $res = $db->save($data);
                $res ? $this->ajaxReturn(array('status' => 1, 'info' => '分类编辑成功！')) : $this->ajaxReturn(array('status' => 0, 'info' => '分类编辑失败！'));
            }
            $res = $db->find($id);
            $data['thisCategory'] = $res;
        } else {
            if(IS_POST) {
                $data = I('post.');
                $data['time'] = time();
                $res = $db->add($data);
                $res ? $this->ajaxReturn(array('status' => 1, 'info' => '分类添加成功！')) : $this->ajaxReturn(array('status' => 0, 'info' => '分类添加失败！'));
            }
        }
        $res = $db->order('sort')->select();
        $data['categories'] = $this->categorySort($res);
        $this->data = $data;
        $this->display();
    }
    Public function upload() {
        $config = array(
            'rootPath' => './Public/',
            'savePath' => 'Upload/',
            'exts' => array('jpg', 'gif', 'png', 'jpeg')
        );
        $upload = new \Think\Upload($config);
        $res = $upload->upload();
//        header('text/html; charset=utf-8');
        if(is_array($res[0])) {
            $res = $res[0];
            $saveName = $res['savename'];
            $savePath = $res['savepath'];
        } else {
            $saveName = $res['pic']['savename'];
            $savePath = $res['pic']['savepath'];
        }
        $res ? $this->ajaxReturn(array('status' => 1, 'info' => '图片上传成功！', 'img' => '/Public/' . $savePath . $saveName)) : $this->ajaxReturn(array('status' => 0, 'info' => $upload->getError()));
    }
    Public function add() {
        $db = M('domain_my');
        $id = I('get.id');
        $pid = I('post.id');
        if($id && !empty($pid)) {
            $data = I('post.');
            $data['category'] = implode(',', $data['category']);
            $res = $db->save($data);
            $res ? $this->ajaxReturn(array('status' => 1, 'info' => '域名编辑成功！')) : $this->ajaxReturn(array('status' => 0, 'info' => '域名编辑失败！'));
        } else if(empty($id) && IS_POST) {
            $data = I('post.');
            $res = $db->where(array('domain' => $data['domain']))->count();
            $res > 0 ? $this->ajaxReturn(array('status' => 1, 'info' => '域名 ' . $data['domain'] . ' 已存在！')) : '';
//            $data['pic'] = $res[0]['savepath'] . $res[0]['savename'];
            $data['time'] = time();
            $data['category'] = implode(',', $data['category']);
            $data['category'] == '' ? $this->ajaxReturn(array('status' => 0, 'info' => '必填项 [分类] 为空！')) : '';
            $res = $db->add($data);
            $res ? $this->ajaxReturn(array('status' => 1, 'info' => '域名添加成功！')) : $this->ajaxReturn(array('status' => 0, 'info' => '域名添加失败！'));
        } else {
            $res = $db->find(I('get.id'));
            $data['thisDomain'] = $res;
            $data['thisDomain']['category'] = explode(',', $res['category']);
            $db = M('domain_category');
            $res = $db->field('id, parent, name')->order('sort')->select();
            $res = $this->categorySort($res, 0, '');
            $data['categories'] = array();
            foreach($res as $i) {
                if(in_array($i['id'], $data['thisDomain']['category'])) {
                    $i['selected'] = '1';
                }
                $data['categories'][] = $i;
            }
            $this->data = $data;
            $this->display();
        }
    }
    Public function bulk() {
        $post = I('post.');
        if(!empty($post['domains'])) {
            $data['domains'] = explode("\r", trim($post['domains']));
            $domains = array();
            switch($post['separator']) {
                case '1':
                    $separator = ',';
                    break;
                case '2':
                    $separator = '|';
                    break;
                case '3':
                    $separator = ' ';
                    break;
                default:
                    $separator = ',';
            }
            foreach($data['domains'] as $k => $v) {
                static $i = 1;
                $domainInfo = explode($separator, $v);
                $domains[$k]['domain'] = trim($domainInfo[0]);
                $domains[$k]['desc'] = trim($domainInfo[1]);
                $domains[$k]['num'] = $i;
                $i++;
            }
            $data['domains'] = $domains;
            $data['domain'] = 1;
            $db = M('domain_category');
            $res = $db->field('id, parent, name')->order('sort')->select();
            $res = $this->categorySort($res);
            $categoriesHtml = '';
            foreach($res as $i) {
                $categoriesHtml .= "<option value=\"$i[id]\">$i[name]</option>";
            }
            $data['categoriesHtml'] = $categoriesHtml;
            $this->data = $data;
        } else if(is_array($post['domain'])){
            $db = M('domain_my');
            $i = 0;
            $time = time();
            while ($i < count($post['domain'])) {
                list($dk, $domain) = each($post['domain']);
                list($dek, $desc) = each($post['desc']);
                list($kk, $keyword) = each($post['keyword']);
                list($pk, $pic) = each($post['pic']);
                list($ppk, $price) = each($post['price']);
                $domains[$i]['domain'] = $dN[] = $domain;
                $domains[$i]['desc'] = $desc;
                $domains[$i]['keyword'] = $keyword;
                $domains[$i]['pic'] = $pic;
                $domains[$i]['category'] = implode(',', $post['category_' . ($i + 1)]);
                if(!$domains[$i]['category']) {
                    $this->ajaxReturn(array('status' => 0, 'info' => '请设置域名分类！'));
                    break;
                }
                $domains[$i]['price'] = $price;
                $domains[$i]['time'] = $time;
                $i++;
            }
            foreach($dN as $v) { //检测域名是否已经存在
                $domain = $db->where(array('domain' => $v))->find();
                if($domain) {
                    $this->ajaxReturn(array('status' => 0, 'info' => '域名' . $v . '已经存在！'));
                    break;
                }
            }
            $res = $db->addAll($domains);
            $res ? $this->ajaxReturn(array('status' => 1, 'info' => '批量域名添加成功！')) : $this->ajaxReturn(array('status' => 0, 'info' => '批量域名添加失败！'));
        }
        $this->display();
    }
    Public function import() {
        $this->display();
    }
    Public function unadd() {

    }
}