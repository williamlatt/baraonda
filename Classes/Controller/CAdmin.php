<?php
class CAdmin extends Controller{
    public function defaultExecution(){
        USingleton::getInstance('VAdmin')->viewUtenti(EUtente::loadAll());
    }
}
?>