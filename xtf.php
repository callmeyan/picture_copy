<?php
/**
 * Created by JetBrains PhpStorm.
 * User: home
 * Date: 15-9-14
 * Time: 下午2:52
 * To change this template use File | Settings | File Templates.
 */
function get_config($key,$conf = null){
    if(!$conf) {
        global $appConf;
        $conf = &$appConf;
    }
    return isset($conf[$key]) ? $conf[$key] : null;
}
function get_content_curl($url){

}


function get_req_uri(){
    $uri = $_SERVER['REQUEST_URI'];
    $scriptName = $_SERVER['SCRIPT_NAME'];
    return substr($uri,strlen(dirname($scriptName)));
}
function get_content($url){
    return get_config('data_type') == 'curl' ? get_content_curl($url) : file_get_contents($url);
}