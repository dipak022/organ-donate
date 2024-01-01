<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('routeCheck')){
    function routeCheck($routes){
        if (is_array($routes)){
         $totalRoute= count($routes);
         $routesCheck='';
           foreach ($routes as $key=>$route){
               if ($key==$totalRoute-1 ){
                   $routesCheck= $routesCheck. Route::is($route);
               }
               else {
                   $routesCheck= $routesCheck || Route::is($route)  ;

               }

           }
           return $routesCheck;
       }

    }
}
if (!function_exists('ampmconvert')){
    function ampmconvert($time){
        if($time=='00:00:00'){
            echo '';
        }
        else{
            $times =   strtotime($time);
            echo date("h:i:s--a", $times);
        }
    }
}if (!function_exists('fulldayname')){
    function fulldayname($sortname){
        switch ($sortname) {
            case "Sat":
                echo "Saturday";
                break;
            case "Sun":
                echo "Sunday";
                break;
            case "Mon":
                echo "Monday";
                break;
            case "Tue":
                echo "Tuesday";
                break;
            case "Wed":
                echo "Wednesday";
                break;
            case "Thu":
                echo "Thursday";
                break;
            case "Fri":
                echo "Friday";
                break;
            default:
                echo "";
        }

    }
}

if (!function_exists('allday')){
    function allday($edit=null){
        ?>
        <option <?php if($edit!=null && $edit=="Sat") echo 'selected="selected"'; ?> value="Sat">Saturday</option>
        <option <?php if($edit!=null && $edit=="Sun") echo 'selected="selected"'; ?>  value="Sun">Sunday</option>
        <option <?php if($edit!=null && $edit=="Mon") echo 'selected="selected"'; ?>  value="Mon">Monday</option>
        <option <?php if($edit!=null && $edit=="Tue") echo 'selected="selected"'; ?>  value="Tue">Tuesday</option>
        <option <?php if($edit!=null && $edit=="Wed") echo 'selected="selected"'; ?>  value="Wed">Wednesday</option>
        <option <?php if($edit!=null && $edit=="Thu") echo 'selected="selected"'; ?>  value="Thu">Thursday</option>
        <option <?php if($edit!=null && $edit=="Fri") echo 'selected="selected"'; ?>  value="Fri">Friday</option>
        <?php
    }
}



