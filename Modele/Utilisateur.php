<?php

require_once 'Framework/Modele.php';

/**
 * Modélise un utilisateur du blog
 *
 * @author Baptiste Pesquet
 */
class Utilisateur {

    public function connecter($login, $mdp)
    {
        $sql = "select UTIL_ID from T_UTILISATEUR where UTIL_LOGIN=? and UTIL_MDP=?";
        $utilisateur = $this->executerRequete($sql, array($login, $mdp));
        return ($utilisateur->rowCount() == 1);
    }

    public function getUtilisateur($login, $mdp)
    {
        $sql = "select UTIL_ID as idUtilisateur, UTIL_LOGIN as login, UTIL_MDP as mdp 
            from T_UTILISATEUR where UTIL_LOGIN=? and UTIL_MDP=?";
        $utilisateur = $this->executerRequete($sql, array($login, $mdp));
        if ($utilisateur->rowCount() == 1)
            return $utilisateur->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun visiteur ne correspond aux identifiants fournis");
    }

}

