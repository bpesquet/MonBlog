<?php

/**
 * Classe abstraite fournissant les services communs aux modèles
 *
 * @author Baptiste Pesquet
 */
abstract class Modele {

    private $bdd;

    /**
     * Exécute une requête SQL de lecture dans la base
     * 
     * @param type $sql La requête SQL (chaîne)
     * @param type $accederPremierResultat Indique si la méthode doit accéder au premier résultat de la requête.
     * Utile pour les requêtes qui ne renvoient qu'une seule ligne de résultat (booléen)
     * @return type Les résultats de la requête (objet PDOStatement) ou la première ligne de résultat (tableau associatif)
     */
    protected function executerLecture($sql, $accederPremierResultat = false) {
        $stmtResultats = $this->getBdd()->query($sql);
        if ($accederPremierResultat == true)
            return $stmtResultats->fetch();  // Accès au premier résultat
        else
            return $stmtResultats;
    }

    /**
     * Exécute une requête SQL de modification de la base
     * 
     * @param type $sql La requête SQL (chaîne)
     * @param type $valeurs Les valeurs à passer à la requête (tableau associatif)
     */
    protected function executerModification($sql, $valeurs)
    {
        $requete = $this->getBdd()->prepare($sql);
        $requete->execute($valeurs);
    }

    /**
     * Renvoie un objet de connexion à la BDD en initialisant la connexion au besoin
     * 
     * @return type L'objet PDO de connexion à la BDD
     */
    private function getBdd() {
        if ($this->bdd === null) {
            $this->bdd = new PDO(
                            'mysql:host=localhost;dbname=monblog;charset=utf8',
                            'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return $this->bdd;
    }

}

