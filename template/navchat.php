<link rel="stylesheet" href="template/fonts.css">
<style class="text/css">
    .social {
	position: fixed; /* Hacemos que la posición en pantalla sea fija para que siempre se muestre en pantalla*/
	right: -1240px; /* Establecemos la barra en la izquierda */
	top: 620px; /* Bajamos la barra 200px de arriba a abajo */
	z-index: 2000; /* Utilizamos la propiedad z-index para que no se superponga algún otro elemento como sliders, galerías, etc */
}

	.social ul {
		list-style: none;
	}

	.social ul li a {
		display: inline-block;
		color:#fff;
		background: #000;
		padding: 10px 15px;
		text-decoration: none;
		-webkit-transition:all 500ms ease;
		-o-transition:all 500ms ease;
		transition:all 500ms ease; /* Establecemos una transición a todas las propiedades */
	}

	.social ul li .icon-bubble2 {background:#3b5998;} /* Establecemos los colores de cada red social, aprovechando su class */
	
	.social ul li a:hover {
		background: #000; /* Cambiamos el fondo cuando el usuario pase el mouse */
		padding: 10px 30px; /* Hacemos mas grande el espacio cuando el usuario pase el mouse */
	}


</style>
<div class="social">
		<ul>
			<li><a href="../Constructora/Chat" class="icon icon-bubble2"></a></li>
		</ul>
	</div>