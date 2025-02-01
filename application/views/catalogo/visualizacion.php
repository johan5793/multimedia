<body>
	<div>
		<nav class="navbar navbar-default navbar-static-top navbar-inverse">
			<div class="container">
				<a class="navbar-brand text-light">JorgHub</a>
			</div>
	</div>
	<br>
	<div class="container container-fluid">
		<div class="card">
		  <div class="card-header">
		    <?php echo $video->titulo; ?>
		  </div>
		  <div class="card-body">
		  	<div class="row">
			    <div class="col-12 col-md-1">Autor: </div>
			    <div class="col-12 col-md-5"><?php echo $video->autor; ?></div>
			    <div class="col-12 col-md-1">Correo: </div>
			    <div class="col-12 col-md-5"><?php echo $video->correo; ?></div>
			</div>
			<div class="row">
			    <div class="col-12 col-md-1">Fecha: </div>
    			<div class="col-12 col-md-5"><?php echo $video->fecha; ?></div>
			</div>
		  </div>
		  <div class="card-footer">
		  	<a href="<?php echo site_url('Inicio/descargar/'.$video->id); ?>"><i class="fa fa-download fa-fw"></i></a>
		  </div>
		</div>
		<br>
		<div class="card">
			<div class="card-body">
				<center>
					<video class="img-fluid" controls>
						<source src="<?php echo base_url($video->video); ?>" type="video/mp4">
					</video>
				</center>
			</div>
		</div>
	</div>