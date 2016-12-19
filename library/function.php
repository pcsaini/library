<?php
/**
 * Created by PhpStorm.
 * User: pcsaini
 * Date: 8/12/16
 * Time: 12:15 AM
 */

session_start();


$controller = "";
$func = "index";
$params = "";
$var = array();
$params = array();
$var['header'] = "";
$var['footer'] = "";


if (isset($_GET['params'])){
    $paramsRawUnfiltered = $_GET['params'];
    $paramsRawUnfiltered = strip_tags($paramsRawUnfiltered);
    $paramsRaw = explode("/",$paramsRawUnfiltered);

    if (count($paramsRaw) >= 0 ) $controller = $paramsRaw[0];
    if (count($paramsRaw) > 1) $func = $paramsRaw[1];
    if (count($paramsRaw) > 1){
        for ($i = 2; $i < count($paramsRaw); $i+=2){
            $params[] = $paramsRaw[$i+1];
        }
    }

}

//Including Important file
include "library/config.php";
if(!$GLOBALS['base_url']) {
    echo "<div style='background: red; color: yellow; padding: 20px;'> set base url - Please go to library/config.php to set </div>";
}
if(!$GLOBALS['dynamic_url']) {
    echo "<div style='background: red; color: yellow; padding: 20px;'> set dynamic url - Please go to library/config.php to set </div>";
}
if(!$GLOBALS['hostname'] || !$GLOBALS['username'] || !$GLOBALS['database']) {
    echo "<div style='background: red; color: yellow; padding: 20px;'> set database fields - Please go to library/config.php to set </div>";
}
include "library/database.php";


//including all model files
$model_array = 'model';
$model_files = scandir($model_array);
$model_files_filtered = array_diff($model_files,array('.','..'));
foreach ($model_files_filtered as $model) {
    if (strpos($model,'.') !== TRUE){
        include('model/'.$model);
    }
}

include "library/helper.php";


if (!$controller) $controller = $GLOBALS['first_page'];
if (!$func) $func = "index";
if($GLOBALS['seourl'] == "false") $GLOBALS['dynamic_url'] = $GLOBALS['dynamic_url']."?params=";


//including the controller file by taking its name from url.
if (file_exists("controller/".$controller.".php")) {
    include("controller/".$controller.".php");
    //Initializing the controller.
	$functions = new $controller();
    //Retrieving the variable set in controller and setting them as variable name.
	if(method_exists($controller, $func)) {
        $var = call_user_func_array(array($functions, $func), $params);
        $keys = array_keys($var);
        foreach($keys as $key) {
            $$key = $var[$key];
        }
    }
}

//Building the view.
if($var['header']) {
    if($var['header'] && $GLOBALS['header'] != "false") {
        include('view/'.$var['header']);
    }
}
else {
    include('view/'.$GLOBALS['header']);
}


if(method_exists($controller, $func)) {
    if($var['view_page'] != "false") {
        include('view/'.$var['view_page'].'.php');
    }
}
else {
    include('view/404.php');
}
if($var['footer']) {
    if($var['footer'] && $GLOBALS['footer'] != "false") {
        include('view/'.$var['footer']);
    }
}
else {
    include('view/'.$GLOBALS['footer']);
}
?>