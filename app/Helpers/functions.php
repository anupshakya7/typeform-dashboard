<?php
if(!function_exists('hasPermissionToRoute')){
    function hasPermissionToRoute($route){
        return auth()->check() && auth()->user()->hasPermissionToRoute($route);
    }
}

?>