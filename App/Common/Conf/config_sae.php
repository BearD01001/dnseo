<?php
/**
 * Created by PhpStorm.
 * User: Dino9
 * Date: 2016/2/2
 * Time: 21:11
 */

return array(
//    SAE参数配置文件
//    重新配置公共文件路径，多域加速文件加载，同时使用SAE域名可减少流量消耗
    'TMPL_PARSE_STRING' => array(
        '__PUBLIC__' => 'http://dnseo.applinzi.com/Public'
    )
);