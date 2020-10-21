<?php
class USingleton
{
   private static $instances;

   /**
   * Il costruttore in cui ci occuperemo di inizializzare la nostra
   * classe. E' opportuno specificarlo come privato in modo che venga
   * visualizzato automaticamente un errore dall'interprete se si cerca
   * di istanziare la classe direttamente.
   */
   private final function __construct()
   {
      // vuoto
   }

   /**
   * Il metodo statico che si occupa di restituire l'istanza univoca della classe.
   */
   public static function getInstance($c)
   {
        if( ! isset( self::$instances[$c] ) )
        {
            if (class_exists($c)) self::$instances[$c] = new $c;
            else return false;
        }
        return self::$instances[$c];
   }
}
?>
