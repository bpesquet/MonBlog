<?php

require 'modele.php';

try {
    $billets = getBillets();
    $lienBillet = "billet.php?id="; 
    require 'vueAccueil.php';
}
catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'vueErreur.php';
}