<?php $titre = "Mon Blog - détail d'un billet" ?>

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
    <h1 id="titreReponses">Réponse(s) à <?= $billet['BIL_TITRE'] ?></h1>
</header>
<?php foreach ($commentaires as $commentaire): ?>
    <p><?= $commentaire['COM_AUTEUR'] ?> dit :</p>
    <p><?= $commentaire['COM_CONTENU'] ?></p>
<?php endforeach; ?>
<hr />
<form method="post" action="index.php">
    <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo" required /><br />
    <textarea id="txt_commentaire" name="commentaire" rows="4" placeholder="Votre commentaire" required></textarea><br />
    <input name="idBillet" type="hidden" value="<?= $billet['BIL_ID'] ?>" />
    <input type="submit" value="Commenter" />
</form>
<?php $contenu = ob_get_clean() ?>

<?php include 'gabarit.php' ?>

