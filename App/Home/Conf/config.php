<?php
return array(
    'URL_MODEL' => 2,  //普通模式 0 ,PATHINFO模式 1 ,REWRITE模式 2 ,兼容模式 3
    'OUTPUT_ENCODE' =>true,
    'URL_ROUTER_ON' => true, // url路由开关
    'URL_ROUTE_RULES' => array(
        '/^www\.(.*)$/i' => ':1',
        '/^([a-z0-9][-a-z0-9]{0,62}(\.[a-z0-9][-a-z0-9]{0,62})+)$/i' => 'index.php/Domain/detail/domain/:1',
        '/^(\d+)$/i' => 'index.php/Index/index/cat/:1',
    ),
);