<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Accueil</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!--CSS-->
  <link rel="stylesheet" href="<?= addslashes($baseurl) ?>css/style.css">
</head>

<body>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="media/Accueil-img2.jpg" alt="" width="40"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?= addslashes($baseurl); ?>Accueil">Accueil</a>
            </li>
            <?php
            if (!empty($_SESSION['user'])) {
            ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= addslashes($baseurl); ?>List">Articles</a>
              </li>

            <?php
            }
            ?>

          </ul>
        </div>
      </div>
      <?php
      if (!empty($_SESSION['user'])) {
      ?>
        <a href="<?= addslashes($baseurl); ?>Deconnexion" class="btn btn-sm btn-outline-secondary me-2 w-25" type="button">Se déconneceter</a>
      <?php
      } else {
      ?>

        <a href="<?= addslashes($baseurl); ?>Connexion" class="btn btn-sm btn-outline-secondary me-2 w-25" type="button">Se conneceter</a>
        <a href="<?= addslashes($baseurl); ?>Inscription" class="btn btn-sm btn-outline-secondary me-3 w-25" type="button">S'inscrire</a>
      <?php
      }
      ?>

      <?php
      if ((!empty($_SESSION["user"]) && $_SESSION["user"]["admin"] == 1)) {
      ?>
        <a href="<?= addslashes($baseurl); ?>AddArticle" class="btn btn-sm btn-outline-secondary me-2 w-25" type="button">Ajouter un article</a>
      <?php
      }
      ?>
    </nav>

  </header>


  <main>
    <?= $content; ?>
  </main>


  <footer class="p-5">

    <div class="text-center">
      <a class="m-5" href="https://www.linkedin.com/in/intidhar-ben-mrad-1a8933201/">Linkedin</a>


      <a class="m-5" href="https://github.com/IntidharB/Projet5-Blog-php">GitHub</a>
      <?php
      if ((!empty($_SESSION["user"]) && $_SESSION["user"]["admin"] == 1)) {
      ?>
      <a class="m-5" href="<?= addslashes($baseurl); ?>List">Articles</a>
      <?php
      }
      ?>
    </div>


  </footer>


  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>