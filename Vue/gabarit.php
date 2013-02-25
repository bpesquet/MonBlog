<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="Contenu/style.css" />
    <title><?= $titre ?></title>
  </head>
  <body>
    <div id="global">
      <header>
        <h1 id="titreBlog"><a href="index.php">Mon Blog</a></h1>
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
          <h1>Commentaires récents</h1>
          <!-- Enrichi plus tard -->
        </section>
        <section>
          <h1>Administration</h1>
          <ul>
            <li><a href="todo">Ecrire un billet</a></li>
          </ul>
        </section>
      </nav>
      <div id="contenu">
        <?= $contenu ?>
      </div> <!-- #contenu -->
      <footer id="piedBlog">
        Blog réalisé avec PHP, HTML5 et CSS.
      </footer>
    </div> <!-- #global -->
  </body>
</html>
