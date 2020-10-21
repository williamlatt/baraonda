<?php
abstract class Entity {
    private $order;
    private $like; //boolean
    public function setLike($bool) {
        $this->like=$bool;
    }
    public function getLike() {
        return $this->like;
    }
    public function setOrder($order) {
        $this->order=$order;
    }
    public function getOrder() {
        return $this->order;
    }
    public static function getTableName() {
        return static::tableName;
    }
    public function save() {
        $db= Usingleton::getInstance('FDatabase');
        return $db->storeObject($this,get_class($this));//[0]->last_insert_id();
    }
    /**
     * aggiona un oggetto nel database già esistente
     */
    public function update() {
        $db= Usingleton::getInstance('FDatabase');
        return $db->updateObject($this,get_class($this));
    }
    /**
     * aggiona un oggetto nel database già esistente cambiando chiave primaria
     */
    public function updateChangePrimary($oldPrimary) {
        $db= Usingleton::getInstance('FDatabase');
        return $db->updateObjectChangePrimary($this,$oldPrimary,get_class($this));
    }
    /**
     * cancella una tupla dal database relativa all'oggetto
     */
    public function delete() {
        $db= Usingleton::getInstance('FDatabase');
        return $db->deleteObject($this,get_class($this));
    }
    /**
     * resituisce l'array associativo relativo all'oggetto
     * @return array Associativo dell'oggetto
     */
    public function getAssoc() {
        $obj = get_object_vars($this);
        unset($obj['order']);
        unset($obj['like']);
        return $obj;
    }
    public function getJson() {
        return json_encode($this->getAssoc());
    }
    public function loadFunc() {
        $db=USingleton::getInstance('FDatabase');
        return $db->loadObjectsByParameters($this,get_class($this));
    }
    /**
     * [Join function]
     * @param  [[Type]] $objects [Array di oggetti con i parametri settati di where, in ordine di relazioni]
     * @return [[Type]] [[Description]]
     */
    public function joinFunc($objects) {
        array_unshift($objects, $this);
        $db=USingleton::getInstance('FDatabase');
        return $db->loadJoin($objects,get_called_class());
    }
    static function loadAll() {
        $db = USingleton::getInstance('FDatabase');
        return $db->loadAll(get_called_class());
    }
    /*static function loadAll() {
        $db = USingleton::getInstance('FDatabase');
        $oggetti = $db->loadAll(get_called_class());
        $return = [];
        foreach($oggetti as $o) $return[$o->getIdCategoria()]=$o;
        return $return;
    }*/
    static function loadPrimary($p) {
        $db = USingleton::getInstance('FDatabase');
        return $db->loadObjectByPrimary($p,get_called_class());
    }
    public function loadPrimarySelector() {
        $db = USingleton::getInstance('FDatabase');
        return $db->selectObjectByPrimary($this,get_called_class());    
    }
    public function exists() {
        return (count($this->loadFunc()) != 0);
    }
}
?>