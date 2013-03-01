<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frame extends CI_Controller {

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
		$data['title'] = '视频监控系统';
		$data['css'] = array('style.css');
		$data['js'] = 'frame_view.js';
		$data['main_content'] = 'frame_view';
		$this->load->view('includes/template_view', $data);
	}
}

/* End of file login.php */
/* Location: ./application/controll