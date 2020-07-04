<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="./css/style.css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>health_gestionFoodOfType</title>
  </head>
  <body>

    <!-- connexion a ma base de donnée -->
      <?php
        try{
          $db = new PDO('mysql:host=localhost;dbname=health;charset=utf8','root','');
        }
        catch(Exception $e){
          die('Erreur : ' . $e->getMessage());
        }
      ?>

    <div class="container">

      <h1>HEALTH</h1>
      
      <p><a href="./index"> page home</a></p>
      <p><a href="./resultat"> mapage resultat</a></p>
      <p><a href="./gestionFood.php">page gestion des aliments</a></p>

      <h1>Bienvenue sur la gestion des type d'aliments</h1>
      
      <!-- teste class FoodOfType et foodOfTypeManager -->
      <?php
          // autoloader
            include_once('./classes/Autoloader.php');
            spl_autoload_register('Autoloader::chargerClasse');
          
          //pour tester notre classe
            $foodOfTypeManager = new foodOfTypeManager($db);
            
            $foodOfType = new FoodOfType(['name' => 'arbuste']);
            $foodOfTypeManager->add($foodOfType);
            
            // $foodOfType = $foodOfTypeManager->get(17);
            // echo $foodOfType->getName();
            // $foodOfTypeManager->delete($foodOfType);

            // $foodOfType = $foodOfTypeManager->get(16);
            // $foodOfType->setName('benier');
            // $foodOfTypeManager->update($foodOfType);

            // $tabFoodOfTypes = $foodOfTypeManager->getList();
            // foreach ($tabFoodOfTypes as $foodOfType) {
            //   echo '<p>'.$foodOfType->getName().'</p>';
            // }
      ?>
    
    </div>

    <!-- Optional JavaScript : jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>