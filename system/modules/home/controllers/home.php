<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Front_Controller {
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->model('banner/banner_model');

        $banner 	= $this->banner_model->order_by('position','asc')->where('publish','Y')->find_all();

        $vars = array(
						'banner'      => $banner,
					);
        
        //print_r($vars);exit();
		
        Template::set('data', $vars);
        Template::set('toolbar_title', "Home");
        Template::set_view('front_page/index');
		Template::render();
	}
}
/* End of file home.php */
/* Location: ./modules/home/controllers/home.php */