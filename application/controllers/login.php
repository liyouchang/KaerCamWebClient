<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		//$this->load->model("Socket_model");
		
		$this->data['pluginFilePath'] = base_url("plugin/KeWebCamSetup.exe");
		$this->data['centerSvrIp']=$this->config->item('center_server_ip');
		
	}
	public $data = array("title"=> '登录');
	public function index()
	{
		$this->load->view('login_view',$this->data);
	}
	public function login()
	{
		$data['title'] = '登录';
		$this->load->view('login_view',$data);
	}
	public function register()
	{
		$data['title'] = '用户注册';
		$this->load->view('user_register',$data);
	}
	
	public function logout()
	{
		//$this->Socket_model->PCloseServer();
		$this->load->model("udp_model");
		$this->udp_model->Logout();
		$this->session->sess_destroy();
		header('Location: '.base_url().'login');
	}
	public function forget_pwd()
	{
		$data['title'] = '忘记密码';
		$this->load->view('forget_pwd_view',$data);
	}
	public function heart_beat()
	{
		$out = $this->udp_model->HeartBeat();
		//usleep(10000);
		$outArray = array("errorCode"=>"$out");
		echo json_encode($outArray);
	}
	
	
	
	
}