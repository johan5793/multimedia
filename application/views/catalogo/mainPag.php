<div class="container">
	<!-- Modal -->
	<?php echo form_open("Inicio/agregarVid", ['enctype' => 'multipart/form-data']) ?>
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Nuevo video</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		      	<label for="nom"><h6>Título del video:</h6></label>
		      	<input type="text" name="nombre" id="nombre" class="form-control input-bordes rounded" placeholder="Nombre del video" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
		      	<br>
		      	<label for="vid"><h6>Video:</h6></label>
		      	<input type="file" name="video" id="video" class="form-control" required>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
		        <button type="submit" class="btn btn-primary">Guardar</button>
		      </div>
		    </div>
		  </div>
		</div>
	<?php echo form_close() ?>
	<div class="table-responsive">
		<table class="table table-bordered table-hover rounded" style="font-size: 0.850em">
			<thead>
				<tr style="text-align:left">
					<th style="width: 20%;">Autor</th>
					<th style="width: 50%;">Título</th>
					<th style="width: 20%; text-align: center;">Fecha</th>
					<th style="width: 10%; text-align: center;">Link</th>
				</tr>
			</thead>
			<tbody class="text-left">
				<?php foreach ($videos as $video): ?>
					<tr>
						<td><?php echo $video->autor; ?></td>
						<td class="text-truncate"><a href="<?php echo site_url('Inicio/verVideo/'.$video->id); ?>"><?php echo $video->titulo; ?></a></td>
						<td style="text-align: center;"><?php echo $video->fecha; ?></td>
						<td style="text-align: center;"><a href="<?php echo site_url('Inicio/descargar/'.$video->id); ?>"><i class="fa fa-download fa-fw"></i></a></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
    <script>
        const searchInput = document.getElementById('campo');
        const filterDropdown = document.querySelector('.dropdown-menu');
        const tableRows = document.querySelectorAll('table tbody tr');

        // Variable para mantener el filtro actual
        let currentFilter = null;

        // Función para filtrar y buscar en la tabla
        function filterTable() {
            const searchTerm = searchInput.value.toLowerCase().trim();
            tableRows.forEach(row => {
                let match = true;

                // Buscar en la columna según el filtro actual
                if (currentFilter) {
                    const columnValue = row.querySelector(`td:nth-child(${currentFilter})`).innerText.toLowerCase();
                    match = columnValue.startsWith(searchTerm);  // Modificado a startsWith
                } else {
                    // Si no hay filtro, buscar en toda la fila
                    match = Array.from(row.querySelectorAll('td')).some(td => 
                        td.innerText.toLowerCase().startsWith(searchTerm)  // Modificado a startsWith
                    );
                }

                // Mostrar u ocultar fila
                row.style.display = match ? '' : 'none';
            });
        }

        // Asignar eventos al campo de búsqueda
        searchInput.addEventListener('input', filterTable);

        // Asignar eventos a los ítems del menú desplegable
        filterDropdown.addEventListener('click', (event) => {
            const selectedItem = event.target;
            const filterValue = selectedItem.getAttribute('value');

            if (filterValue) {
                // Actualizar el filtro actual (columna base para buscar)
                currentFilter = {
                    autor: 1,  // Nombre
                    titulo: 2,  // Marca
                }[filterValue];

                searchInput.placeholder = `Buscar por ${selectedItem.innerText.toLowerCase()}...`;

                searchInput.value = '';
                filterTable();
            }
        });
    </script>
</div>
