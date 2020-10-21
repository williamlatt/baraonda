<?php
    spl_autoload_register(function($class_name) {
        $subDir='Classes';
        $dirs = array(
            'Controller',
            'Entity',
            'Foundation',
            'Utility',
            'View'
        );

        foreach( $dirs as $dir ) {
            if (file_exists($subDir.DIRECTORY_SEPARATOR.$dir. DIRECTORY_SEPARATOR .($class_name).'.php')) {
                require_once($subDir.DIRECTORY_SEPARATOR.$dir. DIRECTORY_SEPARATOR .($class_name).'.php');
                return;
            }
        }
     });
    $controllerAdmin = ['Admin','Presenze'];
    setlocale(LC_TIME, 'it_IT');
    require_once 'includes/config.inc.php';
    require_once 'lib/smarty/Smarty.class.php';
    $section_corrente = View::getSection();
    $controller = USingleton::getInstance('C'.$section_corrente);
    if($controller === false){
        $controller = USingleton::getInstance('CHome');
    }
    elseif ($section_corrente != 'Home')  {
        $session = USingleton::getInstance('USession');
        if (!$session->get('granted')) $controller = USingleton::getInstance('CHome');
    }
    $controller->execute();

    
?>