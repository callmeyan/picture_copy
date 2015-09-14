<?php
/**
 * Created by JetBrains PhpStorm.
 * User: home
 * Date: 15-9-14
 * Time: 下午2:47
 * To change this template use File | Settings | File Templates.
 */
global $appConf;
$appConf=include('app.config.php');
include 'xtf.php';

$targetUrl = $appConf['target'];
$baseUrl = 'http://'.$_SERVER['HTTP_HOST'];
if($_SERVER['SERVER_PORT'] != 80){
    $baseUrl .= ':'.$_SERVER['SERVER_PORT'];
}
if(dirname($_SERVER['SCRIPT_NAME']) != '\\' && dirname($_SERVER['SCRIPT_NAME']) != '/'){
    $baseUrl .= dirname($_SERVER['SCRIPT_NAME']);
}
if(get_config('base')){
    $baseUrl = $appConf['base'];
}
$siteName = $appConf['siteName'];

$reqUri = get_req_uri();
$reqUrl = $targetUrl.$reqUri;
$source = get_content($reqUrl);

echo str_replace(array(
    'src="/uploads/',
    'href="/',
    '</head>',
    'HXD57',
    'href="http://tuku.hxd57.com"'
),array(
    'src="'.$targetUrl.'/uploads/',
    'href="'.$baseUrl.'/',
    "<link rel='stylesheet' href='{$baseUrl}/noAds.css'>\n</head>",
    '',
    'href="'.$baseUrl.'"'
),$source);