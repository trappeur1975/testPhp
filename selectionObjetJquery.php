<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="./css/style.css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>health selection Objet</title>
  </head>
  <body>
    <!-- connexion a ma base de donnée -->
      <?php

      // autoloader
          include_once('./classes/Autoloader.php');
          spl_autoload_register('Autoloader::chargerClasse');

      //acceder a la base de donnees     
        try{
          $db = new PDO('mysql:host=localhost;dbname=health;charset=utf8','root','');
        }
        catch(Exception $e){
          die('Erreur : ' . $e->getMessage());
        }
      ?>

    
    <div class="container">
      
      <h1>gestion des types d'aliments</h1>

      <form method="post" action="selectionObjetJquery.php">
        <div class="form-group col-6">
          <select id="foodOfType" name="foodOfType" class="form-control">
            <option value="0"> selectionner votre type de nourriture</option>
            
            <?php
              $foodOfTypeManager = new foodOfTypeManager($db);
              
              $tabFoodOfTypes = $foodOfTypeManager->getList();

              foreach ($tabFoodOfTypes as $foodOfType) {

                echo '<option value='.$foodOfType->getId().'>'.$foodOfType->getName().'</option>';
              }

            ?>       

          </select>
        </div>
          
      <h1>gestion des aliments</h1>

        <div class="form-group col-6">
          <select id="food" name="food" class="form-control">
            <option value="0"> selectionner votre nourriture</option>
            <?php
              $foodManager = new foodManager($db);

              $tabFoods = $foodManager->getList();

              foreach ($tabFoods as $food) {
                echo '<p>'.$food->getName().'</p>';
                echo '<option class='.$food->getId_FoodOfType().' value='.$food->getId().'>'.$food->getName().'</option>';
              }
            ?>     
          </select>
        </div>

        <button type="submit" class="btn btn-primary mr-2">Valider</button>

      </form

      <!-- affichage du resultat sur la meme page -->
      <?php
        if (isset($_POST['food'])){
          $foodOfType = $_POST['foodOfType'];
          $food = $_POST['food'];

          $query = $db->prepare(
                                'select name, calorie
                                from food
                                where id = :idFood');
          
          $query->execute(array('idFood'=> $food));

          while($data=$query->fetch())
          {
            ?>
              <div id="resultat" class="alert alert-primary col-6">
                <p> 
                  l'aliment "<strong><?php echo $data['name'];?> "</strong>
                  que vous avez selection contient <strong><?php echo $data['calorie']; ?></strong> calories.
                </p>
              </div>
            <?php
          }      
          $query->closeCursor();
        }
      ?>

    </div>  <!-- /container -->

    <!-- Optional JavaScript : jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script src="./javascript/monJquery.js"></script>

  </body>
</html>