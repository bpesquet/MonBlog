<?php $titre = 'Mon Blog - MVC procédural' ?>

<?php ob_start() ?>
<?php foreach ($billets as $billet): ?>
    <article>
        <header>
            <h1 class="titreBillet"><?= $billet['BIL_TITRE'] ?></h1>
            <time><?= $billet['BIL_DATE'] ?></time>
        </header>
        <p><?= $billet['BIL_CONTENU'] ?></p>
        <!-- Bonus : affichage du nombre de commentaires -->
        <footer class="commentaire"><?= $billet['NB_COM'] ?> commentaire(s)</footer>
    </article>
    <hr />
<?php endforeach; ?>
<?php $contenu = ob_get_clean() ?>

<?php include 'gabarit.php' ?>
