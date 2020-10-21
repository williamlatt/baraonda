<?php
class USession {
    public function __construct() {
        session_start(['cookie_lifetime' => 864000]); //10 day
    }
    /**
     * salva una variabile di sessione
     * @param string $k chiave dalla variabile di sessione
     * @param string $v valore della variabile di sessione
     */
    public function set($k,$v) {
        $_SESSION[$k]=$v;
    }
    /**
     * cancella una variabile di sessione
     * @param string $k chiave della variabile da cancellare
     */
    public function delete($k) {
        if (isset($_SESSION[$k])) {
            if (is_array($_SESSION[$k])) $_SESSION[$k]=array();
            else unset($_SESSION[$k]);
        }
    }
    /**
     * resistuisce una variabile della sessione
     * @param  string $k chiave della variabile da resistuire
     * @return mixed  restituisce false se la variabile non è definita, altrimenti restituisce la variabile
     */
    public function get($k) {
        if (isset($_SESSION[$k])) return $_SESSION[$k];
        else return false;
    }
    /**
     * effettua il logout
     */
    public function logout() {
        session_destroy();
    }
    public function exists() {
        return (count($_SESSION) != 0);
    }
}
?>