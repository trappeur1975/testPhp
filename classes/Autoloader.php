<?php
	class Autoloader{
		static function chargerClasse($classname)
		{
			require $classname.'.php';
		}
	}
?>