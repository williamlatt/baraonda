<?php
class CHome extends Controller{
    public function defaultExecution(){
        USingleton::getInstance('VHome')->view();
    }
}
?>