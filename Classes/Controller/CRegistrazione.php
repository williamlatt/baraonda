<?php
class CRegistrazione extends Controller{
    public function defaultExecution(){
        if(isset($_COOKIE['regAllegriso'])){
            $id = $_COOKIE['regAllegriso'];
            USingleton::getInstance('VRegistrazione')->view($id);
        }
        else USingleton::getInstance('VRegistrazione')->view(null);
    }
    public function registra() {
        $utente = new EUtente;
        $utente->setNome(View::getParam('nome'));
        $utente->setCognome(View::getParam('cognome'));
        $utente->setNascita(View::getParam('nascita'));
        $utente->setRegistrazione(date("Y-m-d"));
        $return = json_encode(false);
        $utente->setId($utente->save());
        if ($utente->getId()) $return = $utente->getJson();
        echo $return;
    }
    
    public function presenzaUtente(){
        $id = View::getParam('idUtente');
        if($utente = EUtente::loadPrimary($id)){
            $presenza = new EPresenza;
            $presenza->setIdUtente($id);
            $presenza->save();
            echo EUtente::loadPrimary($id)->getJson();
        } else{
            echo json_encode(false);
        }
    }
}
?>