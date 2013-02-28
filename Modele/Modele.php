<?php

/**
 * Classe abstraite fournissant les services communs aux modèles
 *
 * @author pesquet
 */
abstract class Modele {

    private $bdd;

    // Exécute une requête SQL de lecture dans la base
    protected function executerLecture($sql, $accederPremierResultat = false) {
        $stmtResultats = $this->getBdd()->query($sql);
        if ($accederPremierResultat == true)
            return $stmtResultats->fetch();  // Accès au premier résultat
        else
            return $stmtResultats;
    }

    // Exécute une requête SQL de modification de la base
    protected function executerModification($sql, $valeurs)
    {
        $requete = $this->getBdd()->prepare($sql);
        $requete->execute($valeurs);
    }

    // Renvoie un objet de connexion à la BDD
    private function getBdd() {
        if ($this->bdd === null) {
            $this->bdd = new PDO(
                            'mysql:host=localhost;dbname=monblog;charset=utf8',
                            'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return $this->bdd;
    }

}

