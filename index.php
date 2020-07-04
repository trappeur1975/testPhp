<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="./css/style.css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>health</title>
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

      <p><a href="./resultat.php"> page resultat</a></p>
      <p><a href="./gestionFoodofType.php">page gestion des type d'aliments</a></p>
      <p><a href="./gestionFood.php">page gestion des aliments</a></p>
      
      <form method="post" action="resultat.php">
        <div class="form-group">
          <label for="foodOfType">selectionner votre type d'aliment : </label>
          <select class="form-control col-6" name="foodOfType">
            
            <?php
              $query = $db->query('SELECT name FROM foodOfType');
              while($data=$query->fetch())
              {
                echo '<option>'.$data['name'].'</option>';
              }
              $query->closeCursor();
            ?>
            
          </select>
        </div>

<!--         <div class="form-group">
          <label for="food">selectionner votre aliment (en lien avec le type d'aliment selectionné auparavant) : </label>
          <select class="form-control col-6" name="food">
           <?php
              $query = $db->query('SELECT name FROM food');
              while($data=$query->fetch())
              {
                echo '<option>'.$data['name'].'</option>';
              }
              $query->closeCursor();
            ?>
          </select>
        </div> -->

        <button type="submit" class="btn btn-primary mr-2">Valider</button>
      </form>

      <div id="resultat">
        
      </div>

    </div>
    
    <!-- Optional JavaScript : jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script type="text/javascript">
      $(function(){
          // var resultat= $('select:first option:selected').val();
          // alert(resultat);

          $('Form').on('submit', function(e) {
              var resultat= $('select:first option:selected').val();
              $.ajax({
                type:"post",
                url:"resultat2.php"
                data:'foodOfType=' +resultat,
                success:function(data)
                {
                  console.log(data);
              })
          });


          $('sel').load('nom_page', function() {
          //une ou plusieurs instructions
          });


      });
    </script>

  </body>
</html>