<?php

require_once 'Configuration.php';
/**
 * Classe abstraite Modèle
 * Centralise les services d'accès à une base de données
 * Utilise l'API PDO
 *
 * @author Baptiste Pesquet
 */
abstract class Modele {

    // Objet PDO d'accès à la BD
    private static $bdd;

    /**
     * Exécute une requête SQL
     * 
     * @param type $sql
     * @param type $valeurs
     * @return type
     */
    protected function executerRequete($sql, $valeurs = null) {
        if ($valeurs == null) {
            $stmtResultats = self::getBdd()->query($sql);
        }
        else {
            $stmtResultats = self::getBdd()->prepare($sql);
            $stmtResultats->execute($valeurs);
        }
        return $stmtResultats;
    }

    /**
     * Renvoie un objet de connexion à la BDD en initialisant la connexion au besoin
     * 
     * @return type L'objet PDO de connexion à la BDD
     */
    private static function getBdd() {
        if (self::$bdd === null) {
            // Récupération des paramètres BD
            $dsn = Configuration::get("dsn");
            $login = Configuration::get("login");
            $mdp = Configuration::get("mdp");
            // Création de la connexion
            self::$bdd = new PDO($dsn, $login, $mdp, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return self::$bdd;
    }

}
