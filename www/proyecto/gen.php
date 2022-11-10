<?php 

class Generador
{
static private $instancia = NULL;
private function __construct(){}    
static public function getInstancia() 
{
   if (self::$instancia == NULL) {
      self::$instancia = new Generador ();
   }
return self::$instancia;
}
 
function palabras($min = 4, $max = 8)
{		
	$vocales 	= array('a', 'e', 'i', 'o', 'u');
	$consonantes 	= array('b', 'c', 'd', 'f', 'g', 'j', 'l', 'm', 'n', 'p', 'r', 's', 't');
	$tamano 	= intval(rand($min, $max));
	$actual		= intval(rand(1,2));		
	$nombre 	= '';	
	for($x=0;$x<$tamano;$x++)
	{			
		if($actual == 0)
		{
			$actual	= 1;
			$pos 	= rand(0,count($vocales)-1);
			$nombre	.=  $vocales[$pos];				
		}
		else			
		{
			$actual	= 0;
			$pos 	= rand(0,count($consonantes)-1);
			$nombre	.=  $consonantes[$pos];				
		}				
	}
	return ucfirst($nombre);

}
}

$generador = Generador::getInstancia();
echo $generador->palabras();

 ?>