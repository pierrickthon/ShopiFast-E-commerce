<?php
session_start();

if(!isset($_SESSION['zWuppkgTT6o0Y44'])) {
    header("Location: ../login.php");
}

if(empty($_SESSION['zWuppkgTT6o0Y44'])) {
    header("Location: ../login.php");
}

if(!isset($_GET['pdt'])){
    header("Location: afficher.php");
}

if(empty($_GET['pdt']) AND !is_numeric($_GET['pdt'])){
    header("Location: afficher.php");
}

$id = $_GET['pdt'];

require("../config/commandes.php");
$produits=getProduit($id);

foreach($produits as $produit) {
    $nom = $produit->nom; 
    $idPdt = $produit->id;
    $image = $produit->image;
    $description = $produit->description;
    $prix = $produit->prix;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopiFast-Modifier</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Shopifast</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="../admin/">Nouveau</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="supprimer.php">Suppression</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="afficher.php">Produits</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link active" href="#" style="font-weight: bold; color:green;">Modification</a>
        </li> 
      </ul>
      <div style="display: flex; justify-content: flex-end">
        <a href="deconnexion.php" class="btn btn-danger">Se deconnecter</a>
    </div>
    </div>
  </div>
</nav>

<div class="album py-5 bg-body-tertiary">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <form method="post">
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Titre de l'image</label>
            <input type="name" class="form-control" name="image" value="<?= $image ?>" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nom du produit</label>
            <input type="text" class="form-control" name="nom" value="<?= $nom ?>" required>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Prix</label>
            <input type="number" class="form-control" name="prix" value="<?= $prix ?>" required>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Description</label>
            <textarea class="form-control" name="desc" required><?= $description ?></textarea>
        </div>

        <button type="submit" name="valider" class="btn btn-success">Enregistrer</button>
        </form>


      </div></div></div>




</body>
</html>

<?php

    if(isset($_POST['valider']))
    {
        if(isset($_POST['image']) AND isset($_POST['nom']) AND isset($_POST['prix']) AND isset($_POST['desc']))
        {
        if(!empty($_POST['image']) AND !empty($_POST['nom']) AND !empty($_POST['prix']) AND !empty($_POST['desc']))
            {
                $image = htmlspecialchars(strip_tags($_POST['image']));
                $nom = htmlspecialchars(strip_tags($_POST['nom']));
                $prix = htmlspecialchars(strip_tags($_POST['prix']));
                $desc = htmlspecialchars(strip_tags($_POST['desc']));

                try 
                {
                    modifier($image, $nom, $prix, $desc, $id);
                } 
                catch (Exception $e) 
                {
                    $e->getMessage();
                }

                header("Location: afficher.php");

                
            }
        }
    }




?>