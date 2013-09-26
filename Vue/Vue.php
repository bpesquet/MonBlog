<?php

class Vue {

    // Nom du fichier associé à la vue
    private $fichier;
    
    private $titre;
    
    public function __construct($action)
    {
        // Détermination du nom du fichier vue à partir de l'action
        $this->fichier = "Vue/vue" . $action . ".php";
    }

    public function generer($donnees)
    {
        $contenu = $this->genererContenu($donnees);
        require 'gabarit.php';
    }

    private function genererContenu($donnees)
    {
        if (file_exists($this->fichier)) {
            // Rend les éléments du tableau $donnees accessibles dans la vue
            extract($donnees);
            // TODO
            ob_start();
            // Inclut le fichier vue, ce qui déclenche le remplissage du buffer de sortie
            require $this->fichier;
            // TODO
            return ob_get_clean();
        }
        else {
            throw new Exception("Erreur interne : fichier '$this->fichier' introuvable");
        }
    }

}
