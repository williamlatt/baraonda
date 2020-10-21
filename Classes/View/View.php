<?php
    abstract class View extends Smarty {
        public static function getTitle() {
            return static::pageTitle;
        }
        public function __construct() {
            parent::__construct();
            global $smarty_config;
            $this->setTemplateDir($smarty_config['template']);
            $this->setCompileDir($smarty_config['compile']);
            $this->caching = false;
            $this->assign('pageTitle',$this::getTitle());
            $this->assign('session',USingleton::getInstance('USession'));
        }
        public function getSection() {
            if (isset($_GET['section'])) return $_GET['section'];
            else return false;
        }
        public function getAction() {
            if (isset($_GET['action'])) return $_GET['action'];
            else return false;
        }
        
        static function getParam($param){
            if (isset($_REQUEST[$param])) return $_REQUEST[$param];
            else return false;
        }
        static function getParamArray($param){
            if (isset($_REQUEST[$param])) return $_REQUEST[$param];
            else return [];
        }
        static function getFileArray($param){
            if(isset($_FILES[$param])) return $_FILES[$param];
            else return [];   
        }
    }
?>