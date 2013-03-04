<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->data['pluginFilePath'] = base_url("plugin/VideoMonitorV1.00.20.msi");
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

	public function login_confirm()
	{
		$errorDescArray = array(
				"0d" => "登录成功",
				"05" => "登录失败,用户名或密码错误",
				"06" => "该用户已经登录",
				"01" => "数据库服务器未启动",
				"07" => "该用户不在服务的时间内"
		);
		$this->load->model("Socket_model");
		$name = $_POST['user_name'];
		$pwd = $_POST['user_pwd'];
		$out = $this->Socket_model->login($name,$pwd);
		$outArray = array("errorCode"=>$out,"errorDesc" => $errorDescArray[$out]);
		if($out === "0d")
		{
			$newdata = array(
					'name' => $name,
					'pwd' => $pwd
			);
			$this->session->set_userdata($newdata);
		}
		echo json_encode($outArray);
	}
	public function logout()
	{
		$this->session->sess_destroy();
		header('Location: '.base_url().'login');
	}
}