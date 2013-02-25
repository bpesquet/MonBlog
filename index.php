<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Mon Blog - Version sans MVC</title>
    </head>
    <body>
        <div id="global">
            <header>
                <h1 id="titreBlog">Mon Blog</h1>
                <p>Je vous souhaite la bienvenue sur ce modeste blog.</p>
            </header>
            <nav>
                <section>
                    <h1>Billets</h1>
                    <ul>
                        <li><a href="todo">Billets récents</a></li>
                        <li><a href="todo">Tous les billets</a></li>
                    </ul>
                </section>
                <section>
                    <h1>Administration</h1>
                    <ul>
                        <li><a href="todo">Ecrire un billet</a></li>
                    </ul>
                </section>
            </nav>
            <div id="contenu">
                <?php
                $bdd = new PDO('mysql:host=localhost;dbname=monblog', 'root', '');
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $bdd->query('set names utf8');
                $billets = $bdd->query('select * from T_BILLET order by BIL_ID desc');
                foreach ($billets as $billet) {
                    ?>
                    <article>
                        <header>
                            <h1 class="titreBillet"><?= $billet['BIL_TITRE'] ?></h1>
                            <time><?= $billet['BIL_DATE'] ?></time>
                        </header>
                        <p><?= $billet['BIL_CONTENU'] ?></p>
                        <?php
                        $commentaires = $bdd->query('select COUNT(*) from T_COMMENTAIRE' .
                                ' where BIL_ID = ' . $billet['BIL_ID']);
                        $nbComm = $commentaires->fetchColumn();
                        echo '<footer class="commentaire">' . $nbComm . ' commentaire(s)</footer>';
                        ?>
                    </article>
                    <hr />
                    <?php
                }
                ?>
            </div> <!-- #contenu -->
            <footer id="piedBlog">
                Blog réalisé avec PHP, HTML5 et CSS.
            </footer>
        </div> <!-- #global -->
    </body>
</html>
