<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="./css/style.css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>health_resutat</title>
  </head>
  <body>
    
    <div class="container">
    	
	    <h1>hello</h1>
		<p><a href="./index.php"> page home</a></p>
		<p><a href="./gestionFoodofType.php">page gestion des type d'aliments</a></p>
		<p><a href="./gestionFood.php">page gestion des aliments</a></p>
		
		<h2>les aliments pour la categorie selectionné (avec requete preparer jointure) :</h2>

	      	<?php
		        $foodOfType = $_POST['foodOfType']; //recuperation de la data du formulaire de la page index.php
		        $food = $_POST['food']; //recuperation de la data du formulaire de la page index.php

		        echo '<h1>aliment selectionné: '.$food.'</h1';
		          
		        try{
		          $db = new PDO('mysql:host=localhost;dbname=health;charset=utf8','root','');
		        }
		        catch(Exception $e){
		          die('Erreur : ' . $e->getMessage());
		        }
		        $query = $db->prepare(
		                                "select foodOfType.name AS nomfamille, food.name AS nomAliment, food.calorie AS calorie
		                                from foodOfType
		                                inner join food
		                                where foodOfType.id = food .id_foodOfType And foodoftype.name = :foodOfType");
		        $query->execute(array('foodOfType'=> $foodOfType));
		        
		        while($data=$query->fetch())
		        {
		        ?>
		          <p> 
		            <strong>nom : </strong><?php echo $data['nomAliment'];?>
		            calorie= <?php echo $data['calorie']?>
		            de la famille <?php echo $data['nomfamille'] ?>
		          </p>
		        <?php
		        }
		        $query->closeCursor();
	      	?>
	</div>

    <!-- Optional JavaScript : jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>