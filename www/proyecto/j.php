    <?php 
    require_once ('conexion/conexion.php');
    $bd = new conexion();

    $conn = $bd->conectar();


    $consultav=$conn->prepare("SELECT * FROM paypal WHERE categorias='laptops'");
    $consultav->execute();
    $aqui=$consultav->fetchAll();
    ?>

    <!DOCTYPE html>
    <html lang="es">
    <head>
    	<meta charset="UTF-8">
    	<title>Filtro Imagenes por categorías</title>

    </head>
    <style>
    	* {
    		margin: 0;
    		padding: 0;
    		-webkit-box-sizing: border-box;
    		-moz-box-sizing: border-box;
    		box-sizing: border-box;
    	}

    	body {
    		background: #f2f2f2;
    		font-family: Arial;
    	}

    	.container {
    		background: #fff;
    		width: 95%;
    		max-width: 1000px;
    		margin: 20px auto;
    	}

    	.menu ul {
    		list-style: none;
    		width: 100%;
    		display: table;
    	}

    	.menu ul li {
    		display: table-cell;
    		width: calc(30px * 5)
    	}

    	.menu ul li:hover {
    		background: rgba(0,0,0,.9);
    	}

    	.menu ul li a {
    		text-decoration: none;
    		display: block;
    		color: #fff;
    		padding: 20px 0;
    		text-align: center;
    	}

    	.menu ul .todos {background: #3691be;}
    	.menu ul .laptop {background: #106288;}
    	.menu ul .mouse {background: #0b4661;}
    	.menu ul .teclado {background: #093144;}
    	.menu ul .tarjetas {background: #022535;}
    	.menu ul .cableado {background: #022535;}
    	.menu ul .impresora {background: #022535;}

    	.galeria {
    		width: 100%;
    		padding: 20px;
    		margin-top: 20px;
    		display: flex;;
    		flex-wrap: wrap;
    		flex-direction: row;
    	}

    	.galeria .title-img {
    		width: 100%;
    		border-top: 4px solid #46ABDF;
    	}

    	.galeria .title-img h3 {
    		font-size: 30px;
    		text-align: center;
    		padding: 10px 0;
    		color: #636363;
    		font-weight: 100;
    	}

    	.galeria .box-img {
    		width: calc(100px *2);
    		margin: 14px;
    		border-radius: 2px;
    		box-shadow: 0 0 7px 0 rgba(0,0,0,.6);
    		overflow: hidden;
    	}

    	.galeria .box-img img {
    		width: 100%;
    		vertical-align: top;
    		cursor: pointer;
    		transition: all .5s ease;
    	}

    	.galeria .box-img img:hover {
    		transform: scale(1.2);
    	}

    	.active {
    	
    	}
    </style>
    <body>
    	<div class="container">
    		<div class="menu">
    			<ul>
    				<li class="todos active"><a href="#" class="btn-menu" data-filter="todos">Todos</a></li>
    				<li class="laptop"><a href="#" class="btn-menu" data-filter="laptop">Laptops</a></li>
    				<li class="mouse"><a href="#" class="btn-menu" data-filter="mouse">Mouse</a></li>
    				<li class="teclado"><a href="#" class="btn-menu" data-filter="teclado">teclados</a></li>
    				<li class="tarjetas"><a href="#" class="btn-menu" data-filter="tarjetas">tarjetas Graficas</a></li>	
    				<li class="cableado"><a href="#" class="btn-menu" data-filter="cableado">Cableado</a></li>	
    				<li class="impresora"><a href="#" class="btn-menu" data-filter="impresora">Impresoras</a></li>
    			</ul>
    		</div>

    		<div class="galeria">
    			<div class="title-img">
    				<h3>Galeria de Imagenes</h3>
    			</div>
    			<?php foreach ($aqui as $key => $valor): ?>
    				<?php $ruta_img=$valor["imagen"]; ?>
    				<div class="box-img laptop">
    					<img src="imagenes/<?php echo $ruta_img;?>" alt="Imagen del primer artículo" >
    					<p style="text-align: center;"><b><?php echo $valor['marca']; ?></b></p>
    					<p style="text-align: center;"><b><?php echo " $" . $valor['precio']; ?></b></p>
    					<p style="text-align: center;"><b><?php echo $valor['descripcion']; ?></b></p>
    					<button style="display: block;margin: auto; background: white;border: none;"><?php echo $valor['texto']; ?></button>
    					<button style="display: block;margin: auto; background: white;border: none;"><?php echo $valor['comprar']; ?></button>
    				</div>
    			<?php endforeach ?>

    			<?php 
    			$consultatec= $conn->prepare("SELECT * FROM paypal WHERE categorias='teclado'");
    			$consultatec->execute();
    			$a=$consultatec->fetchAll();

    			foreach ($a as $key => $valor0):?>
    				<?php $ruta_img0=$valor0['imagen']; ?>
    				<div class="box-img teclado">
                        <p style="text-align: center;"><b><?php echo $valor0['marca']; ?></b></p>
                        <p style="text-align: center;"><b><?php echo " $" . $valor0['precio']; ?></b></p>
                        <p style="text-align: center;"><b><?php echo $valor0['descripcion']; ?></b></p>
    					<img src="imagenes/<?php echo $ruta_img0;?>" alt="Imagen del primer artículo" ><button style="display: block;margin: auto;background: white;border: none;"><?php echo $valor0['texto']; ?></button>
    					<button style="display: block;margin: auto;background: white;border: none;"><?php echo $valor0['comprar']; ?></button>
    				</div>
    			<?php endforeach ?>
    			<?php 
    			$consultatar=$conn->prepare("SELECT * FROM paypal WHERE categorias= 'tarjeta'");
    			$consultatar->execute();
    			$b=$consultatar->fetchAll();

    			foreach ($b as $key => $valor1):?>
    				<?php $ruta_img1=$valor1['imagen']; ?>
    				<div class="box-img tarjetas">
    					<img src="imagenes/<?php echo $ruta_img1;?>" alt="Imagen del primer artículo" ><button style="display: block;margin: auto;"><?php echo $valor1['texto']; ?></button>
    					<button style="display: block;margin: auto;"><?php echo $valor1['comprar']; ?></button>
    				</div>
    			<?php endforeach ?>
    			<?php 
    			$consultamouse=$conn->prepare("SELECT * FROM paypal WHERE categorias='mouse'");
    			$consultamouse->execute();
    			$c=$consultamouse->fetchAll();

    			foreach ($c as $key => $valor2):
    				?>
    				<?php $ruta_img2=$valor2['imagen']; ?>
    				<div class="box-img mouse">
    					<img src="imagenes/<?php echo $ruta_img2;?>" alt="Imagen del primer artículo" >
                        <p style="text-align: center;"><b><?php echo $valor2['marca']; ?></b></p>
                        <p style="text-align: center;"><b><?php echo " $" . $valor2['precio']; ?></b></p>
                        <p style="text-align: center;"><b><?php echo $valor2['descripcion']; ?></b></p>
                        <button style="display: block;margin: auto;background: white;border: none;"><?php echo $valor2['texto']; ?></button>
    					<button style="display: block;margin: auto;background: white;border: none;"><?php echo $valor2['comprar']; ?></button>
    				</div>

    			<?php endforeach ?>
    			<?php 
    			$consultacab=$conn->prepare("SELECT * FROM paypal WHERE categorias='cableado'");
    			$consultacab->execute();
    			$d=$consultacab->fetchAll();
    			foreach($d as $key => $valor3):?>
    				<?php $ruta_img3= $valor3['imagen']; ?>
    				<div class="box-img cableado">
    					<img src="imagenes/<?php echo $ruta_img3;?>" alt="Imagen del primer artículo" ><button style="display: block;margin: auto;"><?php echo $valor3['texto']; ?></button>
    					<button style="display: block;margin: auto;"><?php echo $valor3['comprar']; ?></button> 
    				</div>
    			<?php endforeach ?>
    			<?php 
    			$consultaimp=$conn->prepare("SELECT * FROM paypal WHERE categorias='impresora'");
    			$consultaimp->execute();
    			$e=$consultaimp->fetchAll();
    			foreach($e as $key => $valor4):?>
    				<?php $ruta_img4= $valor4['imagen']; ?>
    				<div class="box-img cableado">
    					<img src="imagenes/<?php echo $ruta_img4;?>" alt="Imagen del primer artículo" ><button style="display: block;margin: auto;"><?php echo $valor4['texto']; ?></button>
    					<button style="display: block;margin: auto;"><?php echo $valor4['comprar']; ?></button> 
    				</div>
    			<?php endforeach ?>
    		</div>
    	</div>



    </body>
    </html>
    <script>
    	(function(){
    		$(document).ready(function(){
    			$(".btn-menu").click(function(e){
    				e.preventDefault();
    				var filtro = $(this).attr("data-filter");

    				if (filtro == "todos") {
    					$(".box-img").show(500);
    				} else {
    					$(".box-img").not("."+filtro).hide(500);
    					$(".box-img").filter("."+filtro).show(500);
    				}
    			});

    			$("ul li").click(function(){
    				$(this).addClass("active").siblings().removeClass("active");
    			});
    		});
    	}())
    </script>