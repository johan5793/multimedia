<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->helper("form");
		$this->load->model('Usuario');
		$this->load->model('Video');
		$this->load->helper('download');
	}
	public function index()
	{
		$vid["videos"]=$this->Usuario->leerVid();
		$this->load->view('head');
		$this->load->view('catalogo/buscador');
		$this->load->view('catalogo/mainPag', $vid);
		$this->load->view('footer');
	}
	public function verVideo($id){
		$video = $this->Video->obtenerVideo($id);
		$data['video'] = $video;
		$this->load->view('head');
		$this->load->view('catalogo/visualizacion', $data);
		$this->load->view('footer');
	}
	public function descargar($id){
		$video = $this->Video->obtenerVideo($id);
		$ruta = FCPATH . $video->video;
		force_download($ruta, NULL);
		redirect('Inicio/verVideo/' . $id);
	}
	public function cerrarSesion(){
		$this->session->unset_userdata('id', 'username', 'correo', 'password');
		redirect('Welcome');
	}
	public function do_upload() {
	    // Configuración de carga de archivo
	    $config['upload_path'] = './videos/';  // Asegúrate de que esta carpeta exista y sea accesible
	    $config['allowed_types'] = 'mp4';  // Tipos de archivo permitidos
	    $config['max_size'] = 20000 * 1024;  // Tamaño máximo del archivo en kilobytes (20000 MB)

	    // Inicializar la biblioteca de carga con la configuración
	    $this->load->library('upload', $config);

	    // Realizar la carga
	    if (!$this->upload->do_upload('video')) {
	        // Si hay error, mostrar el error
	        var_dump($this->upload->display_errors());
	        return false;
	    } else {
	        // Si la carga fue exitosa, obtener los datos del archivo
	        $data = $this->upload->data();
	        return $data;  // Devolver los datos del archivo subido
	    }
	}

	public function agregarVid() {
	    date_default_timezone_set('America/Guayaquil');
	    $nom = $this->input->post('nombre'); // Nombre del video
	    $vid_tmp = $_FILES['video']['tmp_name']; // Ruta temporal
	    $vidNombre1 = $_FILES['video']['name']; // Nombre con espacios
	    $vidNombre = str_replace(' ', '_', $vidNombre1); // Nombre sin espacios
	    $tipoVideo = strtolower(pathinfo($vidNombre, PATHINFO_EXTENSION)); // Extensión
	    $sizeVideo = $_FILES['video']['size']; // Tamaño del video
	    $directorio = 'videos/';
	    $ruta = $directorio . $vidNombre;  // Ruta completa para guardar el video
	    $fecha = date('Y-m-d');
	    $hora = date('H');
	    $minuto = date('i');

	    if ($tipoVideo == 'mp4') {
	        // Llamamos a la función de carga de archivos
	        $upload_data = $this->do_upload();

	        if ($upload_data) {
	            // Si la carga fue exitosa, procesar los datos y guardarlos
	            $data = [
	                'autor' => $this->session->userdata('username'),
	                'correo' => $this->session->userdata('correo'),
	                'titulo' => $nom,
	                'fecha' => $fecha . " " . $hora . ":" . $minuto,
	                'video' => $ruta  // Usamos el nombre del archivo subido
	            ];

	            // Guardar los datos en la base de datos
	            if ($upload_data) {
	                $this->Usuario->crearVid($data)
	                ?>
	                <script>
	                    alert("Éxito al guardar el video.");
	                    window.location.href = "<?php echo site_url('Inicio'); ?>"; // Redireccionar después del alert
	                </script>
	                <?php
	            }
	        } else {
	            ?>
	            <script>
	                alert("Error al guardar el video.");
	                window.location.href = "<?php echo site_url('Inicio'); ?>"; // Redireccionar después del alert
	            </script>
	            <?php
	        }
	    } else {
	        ?>
	        <script>
	            alert("Solo se permiten archivos MP4.");
	            window.location.href = "<?php echo site_url('Inicio'); ?>"; // Redireccionar después del alert
	        </script>
	        <?php
	    }
	}

}