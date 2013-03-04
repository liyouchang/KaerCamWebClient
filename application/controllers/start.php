
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Start extends CI_Controller {

	function __construct() {
		parent::__construct();
		if (!$this->session->userdata('name')) {
			header('Location: '.base_url().'login');
		}
	}
	
	public function index()
	{
		$data['title'] = '登录';
		$data['pluginFilePath'] = base_url("plugin/VideoMonitorV1.00.20.msi");
		$this->load->view('login_view',$data);
	}
	public function home()
	{
		$data['title'] = '功能列表';
		$this->load->view('home',$data);
	}
	public function monitoring()
	{
		$data['title'] = '实时监控';
		$this->load->view('monitoring',$data);
	}
	public function sys_config()
	{
		$data['title'] = '系统配置';
		$this->load->view('sys_config',$data);
	}
	public function snap_gallery()
	{
		$data['title'] = '快照查询';
		$this->load->view('snap_gallery',$data);
	}
	public function record_view()
	{
		$data['title'] = '录像播放';
		$this->load->view('record_view',$data);
	}
	public function alarms_query()
	{
		$data['title'] = '告警查询';
		$this->load->view('alarms_query',$data);
	}
	
}

/* End of file login.php */
/* Location: ./application/controll