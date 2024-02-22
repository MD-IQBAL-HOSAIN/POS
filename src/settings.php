<?php
if (!function_exists('settings')) {
    function settings()
    {
       $root = "http://localhost/A_PROJECT/my_projects/"; 
        return [
            'root'  => $root,
            'companyname'=> 'Shark Super Shop',
            'logo'=>$root."admin/assets/img/logo.png",
            'homepage'=> $root,
            'adminpage'=>$root.'admin/',
            'hostname'=> 'localhost',
            'user'=> 'root',
            'password'=> '',
            'database'=> 'sharkpos'
        ];
    }
}
if (!function_exists('testfunc')) {
    function testfunc()
    {
        return "<h3>testing common functions</h3>";
    }
}
if (!function_exists('config')) {
    function config($param)
    {        
      $parts = explode(".",$param);
      $inc = include(__DIR__."/../config/".$parts[0].".php");
      return $inc[$parts[1]];
    }
}