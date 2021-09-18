<!DOCTYPE html>
<html lang="es" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width= device-width, initial-scale=1"/>
		<title>Mesa N° 12</title>
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" href="css/clases.css"/>
		<link rel="stylesheet" href="css/estilo.css"/>		
		<link rel="stylesheet" href="css/mediaquery.css"/>
		<link rel="stylesheet" href="css/fuentes.css"/>
		<link rel="stylesheet" href="css/css_clima.css"/>
		<script src='js/jquery.min.js'/></script>
        <script src="js/index.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/clima.js"></script>
	</head>

	<body>
		<header id="HeaderFijo">
			<nav id="ppal">				
				<ul>
					<li><button class="btn003 button agregar verde sombra-g" type="button" id="agregar">Atras</button></li>
					<li><button class="btn003 button agregar verde sombra-g" type="button" id="agregar">Abm Art</button></li>
					<li><button class="btn003 button agregar verde sombra-g" type="button" id="agregar">Login</button></li>
					<li><button class="btn003 button agregar verde sombra-g" type="button" id="agregar">Mesas</button></li>
					<li><button class="btn003 button agregar verde sombra-g" type="button" id="agregar">Articulos</button></li>
					<li><button class="btn003 button agregar verde sombra-g" type="button" id="agregar">Mesa</button></li>
				</ul>
			</nav>
		</header>
		<section class="espacioFixed"></section>
		<section class="cContenedorPrincipal">
			<article class="cMesa">				
				<header>					
					<button class="btn003 button agregar verde sombra-g" type="button" id="agregar">Agregar persona a la mesa</button><h1>MESA 12</h1>
				</header>
				<section class="cMesaSocio">
					<h1>Socio Nª 0012258668971022</h1>
					<article class="cMesaItem">
						<label><button class="btn002 button eliminar rojo sombra-g" type="button" id="agregar" value="X">X</button>Pinta de cerveza Porter Uarten x2 $150</label>
					</article>
					<article class="cMesaItem">
						<label><button class="btn002 button eliminar rojo sombra-g" type="button" id="eliminar" value="X">X</button>Papas fritas La Biere x1 $150</label>
					</article>
					<article class="cMesaItem">
						<label class="subtotal">Subtotal: $ 300</label>
						<button class="btn003 button agregar verde sombra-g" type="button" id="agregar">Agregar item</button>
					</article>
				</section>
				<section class="cMesaSocio">
					<h1>Socio Nª 0012258668971022</h1>
					<article class="cMesaItem">
						<label><button class="btn002 button eliminar rojo sombra-g" type="button" id="agregar" value="X">X</button>Pinta de cerveza porter Uarten x1 $75</label>
					</article>
					<article class="cMesaItem">
						<label><button class="btn002 button eliminar rojo sombra-g" type="button" id="agregar" value="X">X</button>Papas fritas La Biere x1 $150</label>
					</article>
					<article class="cMesaItem">			
						<label class="subtotal">Subtotal: $ 285</label>
						<button class="btn003 button agregar verde sombra-g" type="button" id="agregar" value="Agregar item">Agregar item</button>
					</article>
				</section>
				<section class="cMesaOtros">
					<h1>Otros</h1>					
					<article class="cMesaItem">
						<label><button class="btn002 button eliminar rojo sombra-g" type="button" id="agregar" value="X">X</button>Pinta de cerveza negra Uarten x1 $75</label>
					</article>
					<article class="cMesaItem">
						<label><button class="btn002 button eliminar rojo sombra-g" type="button" id="agregar" value="X">X</button>Papas fritas La Biere x1 $150</label>
					</article>
					<article class="cMesaItem">			
						<label class="subtotal">Subtotal: $ 285</label>	
						<button class="btn003 button agregar verde sombra-g" type="button" id="agregar" value="Agregar item">Agregar item</button>			
					</article>					
				</section>
				<section>
					<article class="cMesaItem">			
						<label class="total">Total: $ 870</label>				
					</article>
				</section>
			</article>				
		</section>
		<footer class="sombra-g">
			<section id="footer">
				<button class="btn002 button agregar naranja sombra-g" type="button" id="cerrarMesa">Cerrar mesa</button>
			</section>			
		</footer>		
	</body>	
</html>