<?php $titre = "Mon Blog - Détail d'un billet" ?>

<?php ob_start() ?>
<article>
    <header>
        <h1 class="titreBillet"><?= $billet['BIL_TITRE'] ?></h1>
        <time><?= $billet['BIL_DATE'] ?></time>
    </header>
    <p><?= $billet['BIL_CONTENU'] ?></p>
</article>
<hr />
<header>
    <h1 id="titreReponses">Réponses à <?= $billet['BIL_TITRE'] ?></h1>
</header>
<?php foreach ($commentaires as $commentaire): ?>
    <p><?= $commentaire['COM_AUTEUR'] ?> dit :</p>
    <p><?= $commentaire['COM_CONTENU'] ?></p>
<?php endforeach; ?>
<?php $contenu = ob_get_clean() ?>

<?php include 'gabarit.php' ?>

