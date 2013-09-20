<?php $titre = 'Mon Blog'; ?>

<?php ob_start(); ?>
<?php foreach ($billets as $billet): ?>
    <article>
        <header>
            <a href="<?= $lienBillet . $billet['BIL_ID'] ?>">
                <h1 class="titreBillet"><?= $billet['BIL_TITRE'] ?></h1>
            </a>
            <time><?= $billet['BIL_DATE'] ?></time>
        </header>
        <p><?= $billet['BIL_CONTENU'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>