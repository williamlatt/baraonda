<?php
class CPresenze extends Controller{
    public function defaultExecution(){
        USingleton::getInstance('VPresenze')->viewPresenze(EPresenza::loadAll());
    }
}
?>