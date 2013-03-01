
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Start extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$this->_require_login(FALSE);
		$data['title'] = '登录';
		$data['pluginFilePath'] = base_url("plugin/VideoMonitorV1.00.20.msi");
		//$data['css'] = array('login_view.css');
		//$data['js'] = 'login_view.js';
		//$data['main_content'] = 'login';
		$this->load->view('login',$data);
	}
	public function login()
	{
		
		if($this->input->post()){
				
			$username = $this->input->post('email',true);
		
			$password = md5($this->input->post('password',true));
			$username = $this->user_model->get_full_user_by_email($email);
				
			if($user){
				if( $user->passwd == $password){
					$this->user_model->set_usersession($user,false);
					redirect('admin/index' , 'refresh');
					return true;
				}else{
					$data['msg'] = '账号与密码不符，登录失败';
					$this->load->view('admin/login', $data, false);
					return false;
				}
			}else{
				$data['msg'] = '账号不存在';
				$this->load->view('admin/login', $data, false);
				//redirect('admin/login');
				return false;
			}
		}else{
			$data['title'] = '登录';
			$data['pluginFilePath'] = base_url("plugin/VideoMonitorV1.00.20.msi");
			$this->load->view('login',$data);
		}
	
	}
	
	public function login_confirm()
	{
		$name = $_POST['user_name'];	
		echo "1";
	}
	public function home()
	{
		//$this->_require_login(FALSE);
		$data['title'] = '功能列表';
		//$data['css'] = array('login_view.css');
		//$data['js'] = 'login_view.js';
		//$data['main_content'] = 'login';
		$this->load->view('home',$data);
	}
	public function monitoring()
	{
		//$this->_require_login(FALSE);
		$data['title'] = '实时监控';
		//$data['css'] = array('login_view.css');
		//$data['js'] = 'login_view.js';
		//$data['main_content'] = 'login';
		$this->load->view('monitoring',$data);
	}
	public function sys_config()
	{
		//$this->_require_login(FALSE);
		$data['title'] = '系统配置';
		//$data['css'] = array('login_view.css');
		//$data['js'] = 'login_view.js';
		//$data['main_content'] = 'login';
		$this->load->view('sys_config',$data);
	}
	public function snap_gallery()
	{
		//$this->_require_login(FALSE);
		$data['title'] = '快照查询';
		//$data['css'] = array('login_view.css');
		//$data['js'] = 'login_view.js';
		//$data['main_content'] = 'login';
		$this->load->view('snap_gallery',$data);
	}
	public function record_view()
	{
		//$this->_require_login(FALSE);
		$data['title'] = '录像播放';
		//$data['css'] = array('login_view.css');
		//$data['js'] = 'login_view.js';
		//$data['main_content'] = 'login';
		$this->load->view('record_view',$data);
	}
	public function alarms_query()
	{
		//$this->_require_login(FALSE);
		$data['title'] = '告警查询';
		//$data['css'] = array('login_view.css');
		//$data['js'] = 'login_view.js';
		//$data['main_content'] = 'login';
		$this->load->view('alarms_query',$data);
	}
	
}

/* End of file login.php */
/* Location: ./application/controll