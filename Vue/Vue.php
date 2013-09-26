<?php

class Vue {

    // Nom du fichier associé à la vue
    private $fichier;
    
    // Titre de la vue (défini dans le fichier vue)
    private $titre;

    public function __construct($action) {
        // Détermination du nom du fichier vue à partir de l'action
        $this->fichier = "Vue/vue" . $action . ".php";
    }

    public function generer($donnees) {
        $contenu = $this->genererFichier($this->fichier, $donnees);
        $vue = $this->genererFichier('Vue/gabarit.php',
                array('titre' => $this->titre, 'contenu' => $contenu));
        echo $vue;
    }

    private function genererFichier($fichier, $donnees) {
        if (file_exists($fichier)) {
            // Rend les éléments du tableau $donnees accessibles dans la vue
            extract($donnees);
            // TODO
            ob_start();
            // Inclut le fichier vue, ce qui déclenche le remplissage du buffer de sortie
            require $fichier;
            // TODO
            return ob_get_clean();
        }
        else {
            throw new Exception("Erreur interne : fichier '$fichier' introuvable");
        }
    }

}
