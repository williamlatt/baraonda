<?php
class CLogin extends Controller{
    public function defaultExecution(){
        USingleton::getInstance('VAdmin')->viewPassword();
    }
    public function login() {
        $pass = View::getParam('password');
        global $password;
        if ($pass == $password) {
            $session = USingleton::getInstance('USession');
            $session->set('granted',true);
            CAdmin::reload();
        }
        else $this::reload();
    }
}
?>