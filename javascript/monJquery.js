$(function() { 
  var $foodOfType = $('#foodOfType'),
      $food = $('#food'),
      $options = $food.find( 'option' );
      
  $foodOfType.on( 'change', function() {
    // $food.html( $options.filter( '[value="' + this.value + '"]' ) );
    //on filtre sur l'attribut class que regroupera ainsi tout les 'id_foodOfType' de même chiffre
    $food.html( $options.filter( '[class="' + this.value + '"]' ) );
  } ).trigger( 'change' );
});
