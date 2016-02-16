<?php
Namespace Home\Controller;
Use Think\Controller;
Class IndexController Extends HomeController {
    Public function index(){
        $db = M('seo_home');
        $res = $db->find();
        $homeSEO = $res;
        $category = I('get.cat');
        if(!empty($category)) {

        } else {
            $categoryArr = explode(',', $homeSEO['category']);
            $domainItem = array();
            $condition = '';
            $db = M('domain_my');
            $count = count($categoryArr);
            foreach($categoryArr as $k => $c) {
                $res = $db->where('category LIKE "%' . $c . '%"')->order('rand()')->limit(0, $homeSEO['category_num'])->select();
                $domainItem[$c] = $res;
                $condition .= ($k + 1 == $count) ? 'id = ' . $c : 'id = ' . $c . ' OR ';
            }
            $db = M('domain_category');
            $res = $db->where($condition)->order('sort')->select();
            $domainItem['cateItem'] = $res;
            $this->domainItem = $domainItem;
        }
        $this->display('index2');
    }
    Public function classify(){
    	$domain = $this->_server('HTTP_HOST');
    	$domain = str_replace('www', '', $domain);
    	
    	$this->domain =$domain;
    	$this->display();
    }
}