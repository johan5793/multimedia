<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->helper("form");
		$this->load->model('Usuario');
	}
	public function index()
	{
		$this->load->view('head');
		$this->load->view('login/inicioSesion');
		$this->load->view('footer');
	}
	public function registrarse(){
		$this->load->view('head');
		$this->load->view('login/registro');
		$this->load->view('footer');
	}
	public function agregarUsuarios(){
		$nom = $this->input->post('nombre');
		$correo = $this->input->post('correo');
		$pass = $this->input->post('contra');
		$confpass = $this->input->post('confcontra');
		if($pass != $confpass){
			redirect('Welcome/registrarse');
		}elseif($this->Usuario->correoExiste($correo)){
			redirect('Welcome/registrarse');
		}else{
			$data = [
				'username' => $nom,
				'correo' => $correo,
				'password' => $pass
			];
			$this->Usuario->agregarUse($data);
			redirect('Welcome');
		}
	}
	public function iniciar(){
		$correo = $this->input->post('correo');
		$contra = $this->input->post('contra');
		$info = $this->Usuario->ingresar($correo, $contra);
		if(!empty($info)){
			$dataUser = [
				'id' => $info->id,
				'username' => $info->username,
				'correo' => $info->correo,
				'password' => $info->password
			];
			$this->session->set_userdata($dataUser);
			redirect('Inicio');
		}else{
			redirect('Welcome');
		}
	}
}
