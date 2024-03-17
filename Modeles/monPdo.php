<?php
    class MonPdo{

    private static $serveur='mysql:host=localhost';
    private static $bdd='dbname=jobboard'; 
    private static $user='root';
    private static $mdp='';
    // private static $serveur='mysql:host=mysql-sk-celeste-terpin.alwaysdata.net';
    // private static $bdd='dbname=sk-celeste-terpin_bdd-cs'; 
    // private static $user='334263';
    // private static $mdp='c2M3pcJFs6Niui8X';
    private static $monPdo;
    private static $unPdo = null;

    //    Constructeur privé, crée l'instance de PDO qui sera sollicitée
    //    pour toutes les méthodes de la classe
    private function __construct()
    {
        MonPdo::$unPdo = new PDO(MonPdo::$serveur.';'.MonPdo::$bdd, MonPdo::$user, MonPdo::$mdp);
        MonPdo::$unPdo->query("SET CHARACTER SET utf8");
        MonPdo::$unPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function __destruct()
    { 
        MonPdo::$unPdo = null;
    }

    public static function getInstance()
    {
        if(self::$unPdo == null)
        {
            self::$monPdo= new MonPdo();
        }
        return self::$unPdo;
    }

    }
?>