<?php 

use Jenssegers\Agent\Agent;
function view_path($path = "")
{ 
    $agent = new Agent();
    if($agent->isMobile()){
        $msg =  'mobile.'.$path;
    }elseif($agent->isTablet()){
        $msg =  'mobile.'.$path;
    }else{
        $msg =  $path;
    }
 
    return $msg; 
}