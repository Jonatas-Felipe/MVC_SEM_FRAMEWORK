<?php

function base_url($url){
    $baseUrl = 'http://'.$_SERVER['HTTP_HOST'].'/felipe_project/'.$url;
    return $baseUrl;
}