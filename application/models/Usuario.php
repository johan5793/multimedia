<?php
	class Usuario extends CI_Model{

		function __construct(){
			parent::__construct();
		}


		public function agregarUse($user){
			$this->db->insert('usuarios', $user);
		}
		public function correoExiste($correo){
			$this->db->where('correo', $correo);
			$query = $this->db->get('usuarios');
			return $query->num_rows() > 0;
		}
		public function ingresar($correo, $pass){
			$this->db->where('correo', $correo);
			$this->db->where('password', $pass);
			$query = $this->db->get('usuarios');
			if($query->num_rows() == 1){
				return $query->row();
			}else{
				return false;
			}
		}
		public function leerVid(){
	      $this->db->select('*');
	      $this->db->from('videos');
	      return $this->db->get()->result();
	    }
		public function crearVid($data){
			$this->db->insert('videos', $data);
		}

	}




?>