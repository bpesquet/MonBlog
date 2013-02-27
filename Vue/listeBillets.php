<?php $titre = 'Mon Blog - MVC objet' ?>

<?php ob_start() ?>
<?php foreach ($stmtBillets as $billet): ?>
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
    </article>
    <hr />
<?php endforeach; ?>
<?php $contenu = ob_get_clean() ?>

<?php include 'gabarit.php' ?>
