<?php

function base_url($url){
    $baseUrl = 'http://'.$_SERVER['HTTP_HOST'].'/'.$url;
    return $baseUrl;
}
