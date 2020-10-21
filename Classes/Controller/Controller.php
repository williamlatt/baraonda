<?php
interface ControllerBase {
    public function defaultExecution();
}
abstract class Controller implements ControllerBase {
    public function execute() {
        $action=View::getAction();
        if ($action && is_callable(array($this,$action))) $this->$action();
        else $this->defaultExecution();
        
    }
    public static function reload() {
        header('Location: index.php?section='.substr(get_called_class(), 1));
    }
    public static function url() {
        return 'index.php?section='.substr(get_called_class(), 1);
    }
}
?>