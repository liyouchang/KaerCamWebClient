<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Command extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model("udp_model");
		//$this->data['pluginFilePath'] = base_url("plugin/KeWebCamSetup.exe");
	}
	
	public function login_confirm()
	{
		$errorDescArray = array(
				"0d" => "登录成功",
				"05" => "用户名不存在",
				"06" => "用户名或密码错误",
				"07" => "用户已登录",
				"00" => "连接服务器失败"
		);
		$name = $_POST['user_name'];
		$pwd = $_POST['user_pwd'];
		
		$out = $this->udp_model->login($name,$pwd);
		$client_id = $this->session->userdata('clientID');
		$outArray = array("errorCode"=>$out,
				"errorDesc" => $errorDescArray[$out],
				"clientID"=>$client_id);
		if($out === "0d")
		{
			$newdata = array('name' => $name,'pwd' => $pwd);
			$this->session->set_userdata($newdata);
		}
		echo json_encode($outArray);
	}
	public function user_register()
	{
		$errorDescArray = array(
				"0d" => "注册成功",
				"05" => "用户名已存在",
				"06" => "失败",
				"07" => "校验码错误或校验码超时失效",
				"08" => "需要校验码",
				"00" => "连接服务器失败"
		);
		$name = $_POST['user_name'];
		$pwd = $_POST['user_pwd'];
		$email = $_POST['reg_email'];
		$xcode=$_POST['reg_code'];
		$out= $this->udp_model->user_register($name,$pwd,$email,$xcode);
		$outArray = array("errorCode"=>$out,"errorDesc" => $errorDescArray[$out]);
		if($out === "0d")
		{
			$newdata = array('name' => $name,'pwd' => $pwd);
			$this->session->set_userdata($newdata);
		}
		echo json_encode($outArray);
		
	}
	public function refind_password()
	{
		$errorDescArray = array(
				"0d" => "用户名和邮箱匹配",
				"05" => "用户名和邮箱不匹配",
				"06" => "用户名不存在",
				"07" => "数据库修改失败",
				"00" => "连接服务器失败"
		);
		$name = $_POST['user_name'];
		$email = $_POST['reg_email'];
		$out= $this->udp_model->RefindPwd($name,$email);
		$outArray = array("errorCode"=>$out,"errorDesc" => $errorDescArray[$out]);
		echo json_encode($outArray);
	}
	
	public function ShrDeviceList()
	{
		$out = $this->udp_model->ShrDeviceList();
		//log_message('error',"out message".$out);
		$outArray = array("errorCode"=>"1");
		$toJson = iconv("GB2312","UTF-8",$out);
		echo json_encode($toJson);
	}
	
	public function OwnDeviceList()
	{
		$out = $this->udp_model->OwnDeviceList();
		//log_message('error',"out message".$out);
		$outArray = array("errorCode"=>"1");
		$toJson = iconv("GB2312","UTF-8",$out);
		echo json_encode($toJson);
	}
	
	public function add_camera()
	{
		$errorDescArray = array(
				"0d" => "成功",
				"05" => "失败-已经被其他用户添加过",
				"06" => "添加数据库失败",
				"07" => "用户下的设备数超过最大值",
				"08" => "设备不在线",
				"00" => "与服务器通讯失败"
		);
		$camID = $_POST['cam_id'];
		$devName = $_POST['device_name'];
		$out= $this->udp_model->AddCamera($camID,$devName);
		$outArray = array("errorCode"=>$out,"errorDesc" => $errorDescArray[$out]);
		echo json_encode($outArray);
	}
	public function del_camera()
	{
		$errorDescArray = array(
				"0d" => "成功",
				"05" => "失败",
				"00" => "与服务器通讯失败"
		);
		$camID = $_POST['cam_id'];
		$delType = $_POST['del_type'];//12-拥有设备 13-共享设备。
		$out= $this->udp_model->DelCamera($camID,$delType);
		//$out = "0d";
		$outArray = array("errorCode"=>$out,"errorDesc" => $errorDescArray[$out]);
		echo json_encode($outArray);
	}
	public function shr_camera()
	{
		$errorDescArray = array(
				"0d" => "成功",
				"05" => "失败-超出最大共享数 ",
				"06" => "已经共享给该用户 ",
				"07" => "数据库添加失败",
				"08" => "用户不存在",
				"09" => "自己不能共享自己的设备",
				"10" => "设备不存在",
				"00" => "与服务器通讯失败"
		);
		$camID = $_POST['cam_id'];
		$userName = $_POST['user_name'];
		$out = $this->udp_model->ShrCamera($camID,$userName);
		$outArray = array("errorCode"=>$out,"errorDesc" => $errorDescArray[$out]);
		echo json_encode($outArray);
	}
	
	public function logout()
	{
		$this->udp_model->Logout();
	}
	public function check_share_user()
	{
		$devID = $_POST['dev_id'];
		$out = $this->udp_model->ChkShrUser($devID);
		$toJson = iconv("GB2312","UTF-8",$out);
		echo json_encode($toJson);
	}
	public function cancel_share()
	{
		$errorDescArray = array(
				"0d" => "成功",
				"05" => "共享用户ID不存在",
				"06" => "操作数据库失败",
				"00" => "与服务器通讯失败"
		);
		$devID = $_POST['dev_id'];
		$shrUser = $_POST['shr_user'];
		$out = $this->udp_model->CancelShare($devID,$shrUser);
		$outArray = array("errorCode"=>$out,"errorDesc" => $errorDescArray[$out]);
		echo json_encode($outArray);
	}
	public function set_dev_record()
	{
		$errorDescArray = array(
				"0d" => "成功",
				"05" => "失败",
				"00" => "与服务器通讯失败"
		);
		$devID = $_POST['dev_id'];
		$type = $_POST['type'];
		$start = $_POST['start'];
		$out = $this->udp_model->SetDevRecord($devID,$type,$start);
		$outArray = array("errorCode"=>$out,"errorDesc" => $errorDescArray[$out]);
		echo json_encode($outArray);
		
	}
	public function get_dev_record()
	{
		$errorDescArray = array(
				"0d" => "成功",
				"00" => "与服务器通讯失败"
		);
		$devID = $_POST['dev_id'];
		$type = $_POST['type'];
		$out = $this->udp_model->GetDevRecord($devID,$type);
		$errorCode='0d';
		if($out === "00")
		{
			$errorCode=$out;
		}
		$outArray = array("status"=>$out,"errorCode"=>$errorCode,"errorDesc" => $errorDescArray[$errorCode]);
		echo json_encode($outArray);
	}
	
}


/* End of file login.php */
/* Location: ./application/controll