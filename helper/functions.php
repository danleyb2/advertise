<?php

function redirect($location){
    header("location:$location");

}
function validateName($subject){
    if (!preg_match("/^[a-zA-Z]*$/", $subject)){
        $nameErr="Only letters and white space allowed";
    }
}
function format_price($p){
    if ($p>999999) {
        return ($p/1000000)." M";
    }elseif ($p>999){
        return ($p/1000)." K";
    }else {
        return  $p;
    }
}
function convertDatetimeToTimestamp($datetime) {
    list($date, $time) = explode(" ", $datetime);
    list($year, $month, $day) = explode("-", $date);
    list($hours, $minutes, $seconds) = explode(":", $time);
    return mktime($hours, $minutes, $seconds, $month, $day, $year);
}

function validateEmail ($email){
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        return false;
    }else{
        return true;
    }
}

function logEvent($event){
    $filename="../assets/log.txt";
    $handle=fopen($filename, "a");
    if ($handle){
        $tm=strftime("%Y-%m-%d %H:%M:%S",time());
        $event_string="{$tm} : {$event}\n";
        fwrite($handle, $event_string);
    }
}

function include_template($temp=""){
    include(SITE_ROOT.D.'public'.D.'templates'.D.$temp);

}
function print_prep($ary=array()){
    global $debug;
    if ($debug==1){

    echo '<pre>';
    print_r($ary);
    echo '</pre>';
    }
}
function print_br($str=''){
    global $debug;
    if ($debug==1){
        echo '<br>';
        echo $str;
        echo '</br>';
    }
}

?>

