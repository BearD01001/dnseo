<?php
Namespace Home\Controller;
Use Think\Controller;
Class DomainController Extends HomeController {
	Public function detail(){
		$domain = strtoupper(I('get.domain'));
        $db = M('domain_my');
//        $res = $db->where(array('lower(domain)' => $domain))->find();
        $res = $db->where(array('upper(domain)' => $domain))->find();
//        $where['domain'] = array('like', "%$domain%");
//        $res = $db->where($where)->find();
        $domain = $res['domain'];
//        var_dump($res);
        if(!$domain) {
            $this->redirect('/');
        }
		$this->domain = $res;
		$this->display();
	}
}