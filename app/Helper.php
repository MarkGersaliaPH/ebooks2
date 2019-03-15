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

function fetchImage($image,$user_id){
    // open an image file
    // $img = Image::make('public/foo.jpg');

    // // resize image instance
    // $img->resize(320, 240);


    return URL::to('/').'/img/uploads/' . $user_id . '/' . $image;
}


function fetchBookImageSm($image,$user_id){  
    return URL::to('/').'/img/uploads/' . $user_id . '/books'.'/50x50-'. $image;
}