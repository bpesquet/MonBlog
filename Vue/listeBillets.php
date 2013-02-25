<?php $titre = 'Mon Blog - MVC objet' ?>

<?php ob_start() ?>
<?php foreach ($billets as $billet): ?>
    <article>
        <header>
            <h1 class="titreBillet">
                <a href="<?= $lienBillet . $billet['BIL_ID'] ?>">
                    <?= $billet['BIL_TITRE'] ?>
                </a>
            </h1>
            <time><?= $billet['BIL_DATE'] ?></time>
        </header>
        <p><?= $billet['BIL_CONTENU'] ?></p>
        <footer class="commentaire"><?= $billet['NB_COM'] ?> commentaire(s)</footer>
    </article>
    <hr />
<?php endforeach; ?>
<?php $contenu = ob_get_clean() ?>

<?php include 'gabarit.php' ?>
