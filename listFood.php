<?php
  try{
    $db = new PDO('mysql:host=localhost;dbname=health;charset=utf8','root','');
  }
  catch(Exception $e){
    die('Erreur : ' . $e->getMessage());
  }

$type = empty($_GET['type']) ? 'food' : $_GET['type'];

if ($type === 'food'){
  $table = 'food';
  $foreign ='id_foodOFType';
}

$query = $db->prepare('SELECT id, name FROM '.$table.' WHERE '.$foreign.' = ?');
$query->execute([$_GET['filter']]);
$items = $query->fetchAll();

//return un array json
header('Content-Type: application/json');
echo json_encode(array_map(function($item){ //array_map() pour transformer notre tableau $item en tableau json
  return[
    'label' => $item['name'],
    'value' => $item['id']
  ];
}, $items));