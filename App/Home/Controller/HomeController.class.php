<?php
Namespace Home\Controller;
Use Think\Controller;
Class HomeController Extends Controller {
    Public function _initialize() {
        $db = M('setting_common');
        $res = $db->find();
        $res['stat_code'] = htmlspecialchars_decode($res['stat_code']);
        $this->homeInfo = $res;

        $db = M('seo_home');
        $res = $db->find();
        $this->homeSEO = $res;

        $db = M('domain_category');
        $res = $db->order('name, sort')->select();
        $this->AllCate = $res;
        $res = $db->where(array('parent' => 0))->order('name, sort')->limit(0, 8)->select();
        $this->cateItem = $res;
    }
}