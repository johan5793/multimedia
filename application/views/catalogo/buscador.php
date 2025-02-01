<body>
<div>
	<nav class="navbar navbar-default navbar-static-top navbar-inverse">
		<div class="container">
            <a class="navbar-brand text-light">JorgHub</a>
			<a href="<?php echo site_url("Inicio/cerrarSesion"); ?>" class="nav navbar-nav navbar-right text-light"><i class="bi bi-door-open"></i></a>
		</div>
</div>
	<br>
	<div class="container">
            <div class="input-group mb-3">
                <input type="text" name="campo" id="campo" class="form-control input-bordes rounded" placeholder="Seleccione un filtro" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <!-- hacer espacios de forma horizontal -->
                &nbsp;&nbsp;
                <div class="input-group-append">
                        <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-filter"></i>
                        </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" value = "autor">Autor</a></li>
                        <li><a class="dropdown-item" href="#" value = "titulo">Título</a></li>
                    </ul>
                    <!-- Button trigger modal -->
                    <button class="btn btn-outline-primary" type="button" id="mas" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
    </div>