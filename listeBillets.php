<?php $titre = 'Mon Blog - MVC procédural' ?>

<?php ob_start() ?>
<?php foreach ($stmtBillets as $billet):
    ?>
    <article>
        <header>
            <h1 class="titreBillet">
                <?= $billet['BIL_TITRE'] ?>
            </h1>
            <time><?= $billet['BIL_DATE'] ?></time>
        </header>
        <p><?= $billet['BIL_CONTENU'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>
<?php $contenu = ob_get_clean() ?>

<?php include 'gabarit.php' ?>
