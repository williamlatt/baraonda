<?php
class FDatabase {
    private $connection;
    private $returnClass;
    private $tableName;
    private $like;
    private $order;
    /**
     * Costruttore
     */
    public function __construct() {
        global $config;
        $this->connect($config['mysql']['host'],$config['mysql']['user'],$config['mysql']['password'],$config['mysql']['database']);        
    }
    /**
     * Imposta il nome della tabella sql
     * @param string $t_name Nome della tabella
     */
    public function setTableName($t_name) {
        $this->tableName=$t_name;
    }
    /**
     * Imposta il nome della classe da restituire
     * @param string $r_class nome della classe
     */
    public function setReturnClass($r_class) {
        $this->returnClass=$r_class;
    }
    /**
     * Distruttore (chiude la connessione)
     * @private
     */
    public function __destruct() {
        $this->close();
    }
    /**
     * Chiude la connessione
     */
    public function close() {
        $this->connection->close();
    }
    /**
     * Connect to Database
     * @param string $host     Host
     * @param string $user     Utente Database
     * @param string $password Password Utente
     * @param string $database Nome Database
     */
    public function connect($host, $user, $password, $database) {
        $this->connection=new mysqli($host, $user, $password, $database);
        $this->connection->set_charset("utf8");
        }
    public function initQuery($className) {
        $this->setReturnClass($className);
        $this->setTableName($className::getTableName());
    }
    /**
     * Restituisce un array di oggetti che rispettano la query
     * @param  string $q query
     * @return array Array risultato della query
     */
    public function query($q, $id) {
        //$q=utf8_encode($q);
        
        $qResult=$this->connection->query($q);
        $result=array();
        if (is_bool($qResult)) {
            if ($id && $qResult) $result=$this->connection->insert_id;
            else $result=$qResult;
        }
        else {
            if (isset($this->returnClass)) while ($obj=$qResult->fetch_object($this->returnClass)) $result[]=$obj;
            else while ($obj=$qResult->fetch_object()) $result[]=$obj;
        }
        return $result;
    }
    public function escape($v) {
        return $this->connection->real_escape_string($v);
    }
    public function exists($obj,$className) {
        $this->initQuery($className);
        $obj=$obj->getAssoc();
        foreach ($this->primaryKey() as $k) unset($obj[$k]);
        return (!empty($this->loadObjectsByParameters($obj,$className)));
        
    }
    /**
     * Carica un oggetto data la sua chiave primaria
     * @param  string $param     chiave primaria
     * @param string $className nome della classe da restituire
     * @return object oggetto
     */
    public function loadObjectByPrimary($param,$className) {
        $this->initQuery($className);
        $q='select * from '.$this->tableName.' where '.$this->primaryKey()[0].' = \''.$this->escape($param).'\'';
        $result=$this->query($q,false);
        if (isset($result[0])) return $result[0];
        else return false;
    }
    public function selectObjectByPrimary($obj,$className) {
        $assoc=$obj->getAssoc();
        $column=[];
        foreach ($assoc as $k=>$a) if($a) $column[]=$k;
        $columns=implode(',',$column);
        $this->initQuery($className);
        $pk=$this->primaryKey()[0];
        $q='select '.$columns.' from '.$this->tableName.' where '.$pk.' = \''.$this->escape($assoc[$pk]).'\'';
        $result=$this->query($q,false);
        if (isset($result[0])) return $result[0];
        else return false;
    }
    /**
     * Carica gli oggetti di una tabella che rispettano un determinato parametro
     * @param  string $param_name  Il nome del parametro
     * @param  mixed  $param_value Il valore del parametro
     * @return array  Oggetti
     */
    public function loadObjectsByParameter($param_name, $param_value, $className) {
            $parameters=array();
            $parameters[$param_name]=$param_value;
            return $this->loadObjectsByParameters($parameters, $className);
    }
    public function loadObjectsByParameters($obj, $className) {
        $this->like=$obj->getLike();
        $array=$obj->getAssoc();
        $parameters=[];
        foreach ($array as $k=>$v) if (isset($v)) $parameters[$k]=$v;
        $this->initQuery($className);
        $q='select * from '.$this->tableName.' where '.$this->whereParameters($parameters,$this->tableName);
        //echo $q;
        $this->like=0;
        return $this->query($q,false);
    }
    /**
     * Memorizza un oggetto nel database
     * @param object $obj Oggetto
     */
    private function whereParameters($parameters,$tableName) {
        $paramQ=array();
        foreach ($parameters as $k => $p) {
            $k=$tableName.'.'.$k;
            if (is_array($p)) {
                $orParam=[];
                foreach ($p as $i) $orParam[]=$k.'=\''.$this->escape($i).'\'';
                $paramQ[]='('.implode(' or ',$orParam).')';
            } else {
            if (!($p===null)) {
                if ($p=='notnull') $paramQ[]=$k.' is not null';
                else if ($p=='null') $paramQ[]=$k.' is null';
                else {
                    if ($this->like) $paramQ[]=$k.' like \'%'.$this->escape($p).'%\'';
                    else $paramQ[]=$k.'= \''.$this->escape($p).'\'';
                }
            }
            }
            //else $paramQ[]=$k.' is null';
        }
        return implode(' and ',$paramQ);
    }
    public function storeObject($obj,$className) {
        $this->initQuery($className);
        $fields=array();
        $values=array();
        foreach ($obj->getAssoc() as $k=>$v) {
                if ($v === null) ;
                else {
                    $fields[]='`'.$this->escape($k).'`';
                    $values[]='\''.$this->escape($v).'\'';
                }
        }
        $q='insert into '.$this->tableName.' ('.implode(',',$fields).') values ('.implode(",",$values).')';
        //echo $q;
        return $this->query($q, true);
    }
    /**
     * Aggiorna un intero oggetto nel database
     * @param object $obj Oggetto
     */
    public function updateObject($obj,$className) {
        $this->initQuery($className);
        $pk=$this->primaryKey();
        $q='update '.$this->tableName.' set ';
        $parameters=array();
        $parameters2=array();
        $assoc=$obj->getAssoc();
        foreach ($assoc as $k => $v) if (isset($v)) {
            if ($v == 'null') $parameters[]=$this->escape($k).' = '.$v;
            else $parameters[]=$this->escape($k).' = \''.$this->escape($v).'\'';
        }
        foreach ($pk as $primary) $parameters2[]=$primary.' = \''.$this->escape($assoc[$primary]).'\'';
        $parameters2=implode(' and ',$parameters2);
        $q=$q.implode(',',$parameters);
        $q=$q.' where '.$parameters2;
        //echo $q;
        return $this->query($q,false);
    }
    public function updateObjectChangePrimary($obj, $oldPrimary,$className) {
        $this->initQuery($className);
        $pk=$this->primaryKey()[0];
        $q='update '.$this->tableName.' set ';
        $parameters=array();
        $assoc=$obj->getAssoc();
        foreach ($assoc as $k => $v) $parameters[]=$k.' = \''.$v.'\'';
        $q=$q.implode(',',$parameters);
        $q=$q.' where '.$pk.' = \''.$oldPrimary.'\'';
        return $this->query($q,false);
    }
    /**
     * Cancella un oggetto data la chiave primaria
     * @param string $param chiave primaria
     */
    public function deleteObject($obj,$className) {
        $this->initQuery($className);
        $pk=$this->primaryKey();
        $assoc=$obj->getAssoc();
        foreach ($pk as $primary) $parameters[]=$primary.' = \''.$assoc[$primary].'\'';
        $parameters=implode(' and ',$parameters);
        $q='delete from '.$this->tableName.' where '.$parameters;
        //echo $q;
        return $this->query($q,false);
    }
    
    /**
     * Restituisce la chiave primaria
     * @return string chiave primaria
     */
    public function primaryKey() {
        $q='SHOW KEYS FROM '.$this->tableName.' WHERE Key_name = \'PRIMARY\'';
        $result=$this->query($q,false);
        $pk=array();
        foreach ($result as $r) $pk[]=$r->Column_name;
        return $pk;        
    }
    /**
     * Restituisce i nomi dei campi
     * @return array nomi dei campi
     */
    /*
    public function fieldNames() {
        $q='describe '.$this->tableName;
        $qResult=$this->query($q, true);
        $result=array();
        foreach($qResult as $f) $result[]=$f->Field;
        return $result;
    }*/
    public function loadAll($className) {
        $this->initQuery($className);
        $q='select * from '.$this->tableName;
        return $this->query($q,false);
    }
    /**
     * Beta function loadJoin()
     * @param  [[Type]] $arrayObj    [[Description]]
     * @param  [[Type]] $returnClass [[Description]]
     * @return [[Type]] [[Description]]
     */
    public function loadJoin($arrayObj,$returnClass) {
        $this->initQuery($returnClass);
        $params=[];
        $order=$arrayObj[0]->getOrder();
        $q="select distinct $this->tableName.* from $this->tableName";
        for ($i=0;$i<count($arrayObj) - 1;$i++) 
            if ($statement=$this->constructJoin($arrayObj[$i],$arrayObj[$i+1])) {
                $q.=$statement;
            }
        foreach ($arrayObj as $o) {
            $this->like=$o->getLike();
            if ($p=$this->whereParameters($o->getAssoc(),$o::getTableName())) $params[]=$p;
            $this->like=0;
        }
        if (!empty($params)) $q.=' where '.implode(' and ',$params);
        if ($order) $q.=" order by $order asc";
        return $this->query($q,false);
    }
    private function constructJoin($obj1,$obj2) {
        global $config;
        $dbName=$config['mysql']['database'];
        $t1=$obj1::getTableName();
        $t2=$obj2::getTableName();
        $q="SELECT TABLE_NAME,COLUMN_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE REFERENCED_TABLE_SCHEMA = '$dbName' and ((TABLE_NAME = '$t1' and REFERENCED_TABLE_NAME = '$t2') or (TABLE_NAME = '$t2' and REFERENCED_TABLE_NAME = '$t1'))";
        $result = $this->connection->query($q)->fetch_object();
        if ($result) {
            return " join $t2 on $result->TABLE_NAME.$result->COLUMN_NAME = $result->REFERENCED_TABLE_NAME.$result->REFERENCED_COLUMN_NAME";
        }
        else return false;
    }
}
?>