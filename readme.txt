travail personnel pour effectuer des testes de requete sql sur base de donnee, objet et manager, affichage de champs select en fonction d'une pré-selection

dossier classes contient les classes du projet, dossier javascript  contient les script javascipt et jquery

script_sql.txt : fichier pour remplir la base de donnee

gestion de l'affichage du formulaire en ajax (javascript) avec l'affichage du resultat sur la même page. 
	url : http://localhost/health/selectionAjax.php
	page : selection.php + listFood.php + javascript/monJavascript.js
	note : dans les fichiers php on n'utilise pas la notion d'objet pour acceder aux resultats. on utilise que des tableaux

gestion de l'affichage du formulaire en jquery avec l'affichage du resultat sur la même page. 
	url : http://http://localhost/health/selectionJquery.php
	page : selectionJquery.php + javascript/monJquery.js
	note :	toute comme le technique pécedente, dans les fichiers php on n'utilise pas la notion d'objet pour acceder aux resultats:  on utilise que des tableaux.
		avantage de d'utiliser cette technique (jquery) c'est que c'est beaucoup plus simple que précédement, l'inconvenient c'est que dans notre requete sql sur food on charge toute ses données ce qui n'est pas le cas avec la technique precedente (ajax)

gestion de l'affichage du formulaire en jquery, en utilisant les objets, et avec l'affichage du resultat sur la même page. 
	url : http://http://localhost/health/selectionObjetJquery.php
	page : selectionObjetJquery.php + javascript/monJquery.js
	note :	toute comme le technique pécedente, dans les fichiers php on n'utilise pas la notion d'objet pour acceder aux resultats. idem que la technique prcedente mais cette fois on utilise les objets et les managers pour acceder au contenu des bases de donnée. avantage code beaucoup plus court et plus lisible
