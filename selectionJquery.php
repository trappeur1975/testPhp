<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="./css/style.css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>health selection Jquery</title>
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

      <h1>health selection Jquery</h1>
      
      <form method="post" action="selectionJquery.php">
        <div class="form-group col-6">
          <!-- <label for="foodOfType">selectionner votre type d'aliment : </label> -->
          <select id="foodOfType" name="foodOfType" class="form-control">
            <option value="0"> selectionner votre type de nourriture</option>
            <?php
              $query = $db->query('SELECT id, name FROM foodOfType');
              while($data=$query->fetch())
              {
                echo '<option value='.$data['id'].'>'.$data['name'].'</option>';
              }
              $query->closeCursor();
            ?>       
          </select>
        </div>

        <div class="form-group col-6">
          <!-- <label for="food">selectionner votre alimen : </label> -->
          <select id="food" name="food" class="form-control">
            <option value="0"> selectionner votre nourriture</option>
            <?php
              // $query = $db->query('SELECT id_foodOfType, name FROM food');
              // while($data=$query->fetch())
              // {
              //   echo '<option value='.$data['id_foodOfType'].'>'.$data['name'].'</option>';
              // }
              // $query->closeCursor();

              $query = $db->query('SELECT id, id_foodOfType, name FROM food');
              while($data=$query->fetch())
              {
                //j ai integré un attribut "class"pour recuperer le id_foodOfType des "food" et ainsi pourvoir via Jquery faire un filtrage sur celui-ci en affichant que les "id_foodOfType" que l'on souhaite (ex tout les "id_foodOfType"= 4)
                //a noter que j aurais pu utiliser l'attribut "data-" a la place de "class"
                echo '<option class='.$data['id_foodOfType'].' value='.$data['id'].'>'.$data['name'].'</option>';
              }
              $query->closeCursor();
            ?>     
          </select>
        </div>

        <button type="submit" class="btn btn-primary mr-2">Valider</button>
      </form>
      
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
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script src="./javascript/monJquery.js"></script>

  </body>
</html>