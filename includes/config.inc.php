<?php
global $config;

$config['mysql']['user'] = 'root';
$config['mysql']['password'] = '';
$config['mysql']['host'] = 'localhost';
$config['mysql']['database'] = 'my_allegriso';



global $dbUrl;
global $smarty_config;
$smarty_config['template']='template'.DIRECTORY_SEPARATOR.'main';
$smarty_config['compile']='template'.DIRECTORY_SEPARATOR.'compiled';

global $password;
$password = '12345678';
?>
