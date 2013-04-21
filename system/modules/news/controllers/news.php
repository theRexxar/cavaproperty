<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class news extends Front_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();
	}

	//--------------------------------------------------------------------



	/*
		Method: index()

		Displays a list of news data.
	*/
	public function index()
	{
		$this->load->model('news_model');
		$this->load->model('files/file_model');

        $news = $this->news_model->order_by('created_on','desc')->find_all();

        foreach($news AS $news_list)
        {
        	$news_list->image = $this->file_model->find_by('id', $news_list->image_id);

        	$news_date[] = array('year'=>$news_list->year, 'month'=>$news_list->month);
        }

        $vars = array(
						'news' 		=> $news,
						'news_date' => $news_date,
					);
        
        //print_r($news_date);
		
        Template::set('data', $vars);
		Template::set('toolbar_title', "News");
        Template::set_view('front_page/index');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: archive()

		Displays a list of news data based on year and month.
	*/
	public function archive($year=NULL,$month=NULL)
	{
		$this->load->model('news_model');
		$this->load->model('files/file_model');

        $news 			= $this->news_model->order_by('created_on','desc')->find_all();

        $news_archive 	= $this->news_model->order_by('created_on','desc')->find_news_by_date($year,$month);

        foreach($news AS $news_list)
        {
        	$news_list->image = $this->file_model->find_by('id', $news_list->image_id);

        	$news_date[] = array('year'=>$news_list->year, 'month'=>$news_list->month);
        }

        $vars = array(
						'news' 				=> $news,
						'news_archive' 		=> $news_archive,
						'news_date' 		=> $news_date,
					);
        
        //print_r($news_date);
		
        Template::set('data', $vars);
		Template::set('toolbar_title', "News Archive");
        Template::set_view('front_page/archive');
		Template::render();
	}

	//--------------------------------------------------------------------

	

	/*
		Method: detail()

		Displays detail from news data.
	*/
	public function detail($slug=NULL)
	{
		$this->load->model('news_model');
		$this->load->model('news_gallery_model');
		$this->load->model('files/file_model');

		$data['news'] = $this->news_model->find_by('slug', $slug);

		if($data['news'])
		{
			$data['gallery'] = $this->news_gallery_model->find_all_by('news_id', $data['news']->id);
			foreach($data['gallery'] AS $gallery)
			{
				$gallery->image = $this->file_model->find_by('id', $gallery->file_id);
			}
		}

		//print_r($data);exit();

		$this->load->view('front_page/_content/ajax_gallery', $data);
	}

	//--------------------------------------------------------------------



	/*
		Method: news_widget()

		Displays a news widget.
	*/
	public function news_widget()
	{
		$this->load->model('news_model');

        $data['news'] = $this->news_model->order_by('created_on','desc')->limit(4)->find_all();
        
        //print_r($news_date);
		
        $this->load->view('front_page/_content/news_widget', $data);
	}

	//--------------------------------------------------------------------




}