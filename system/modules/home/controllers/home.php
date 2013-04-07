<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Front_Controller {
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
        Template::set('toolbar_title', "Home");
        Template::set_view('front_page/index');
		Template::render();
	}
}
/* End of file home.php */
/* Location: ./modules/home/controllers/home.php */