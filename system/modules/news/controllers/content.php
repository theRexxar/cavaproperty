<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('News.Content.View');
		$this->load->model('news_model', null, true);
		$this->load->model('news_gallery_model', 'news_gallery');
		$this->lang->load('news');
		
		Template::set_block('sub_nav', 'content/_sub_nav');
	}

	//--------------------------------------------------------------------



	/*
		Method: index()

		Displays a list of form data.
	*/
	public function index()
	{

		// Deleting anything?
		if ($action = $this->input->post('delete'))
		{
			if ($action == 'Delete')
			{
				$checked = $this->input->post('checked');

				if (is_array($checked) && count($checked))
				{
					$result = FALSE;
					foreach ($checked as $pid)
					{
						$result = $this->news_model->delete($pid);
					}

					if ($result)
					{
						Template::set_message(count($checked) .' '. lang('news_delete_success'), 'success');
					}
					else
					{
						Template::set_message(lang('news_delete_failure') . $this->news_model->error, 'error');
					}
				}
				else
				{
					Template::set_message(lang('news_delete_error') . $this->news_model->error, 'error');
				}
			}
		}
        
        $offset = $this->uri->segment(5);

		$records = $this->news_model->order_by('post_date','desc')->limit($this->limit, $offset)->find_all();

                
        // Pagination
		$this->load->library('pagination');

		$total_article = $this->news_model->count_all();

		$this->pager['base_url'] 		= site_url(SITE_AREA .'/content/news/index');
		$this->pager['total_rows'] 		= $total_article;
		$this->pager['per_page'] 		= $this->limit;
		$this->pager['uri_segment']		= 5;

		$this->pagination->initialize($this->pager);

		$vars = array(
						'records' 	=> $records,
					);  
                    
        //print_r($vars);exit();              
        
        Template::set('data', $vars);
		Template::set('toolbar_title', 'Manage News');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a News object.
	*/
	public function create()
	{
		$this->auth->restrict('News.Content.Create');

		if ($this->input->post('submit'))
		{
			if ($insert_id = $this->save_news())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('news_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'news');

				Template::set_message(lang('news_create_success'), 'success');
				Template::redirect(SITE_AREA .'/content/news');
			}
			else
			{
				Template::set_message(lang('news_create_failure') . $this->news_model->error, 'error');
			}
		}
		Assets::add_module_js('news', 'news.js');
        
        Assets::add_css(array	(
														Template::theme_url('css/bootstrap-datepicker.css'),
														Template::theme_url('css/jquery.ui.datepicker.css'),
														Template::theme_url('css/jquery-iframedialog.css'),
														Template::theme_url('css/jquery/jquery.plugin.chosen.css'),
														Template::theme_url('css/jquery/jquery.tagsinput.css'),
													),
										'screen');
                                        									
		Assets::add_module_css('news', 'news.css');
        
        Assets::add_js(	array	(
														Template::theme_url('js/jquery-ui-1.8.13.min.js'),
														Template::theme_url('js/jquery-iframedialog.js'),
														Template::theme_url('js/bootstrap-datepicker.js'),
														Template::theme_url('js/admin.js'),
														Template::theme_url('js/jquery/jquery.plugin.chosen.js'),
														Template::theme_url('js/jquery/jquery.plugin.livequery.js'),
														Template::theme_url('js/jquery/jquery.tagsinput.min.js'),
														Template::theme_url('js/editors/ckeditor/ckeditor.js'),
														Template::theme_url('js/editors/ckeditor/adapters/jquery.js'),
														Template::theme_url('js/my_wysiwyg.js'),
													),
										'external',
										true
									);
        
        Assets::add_js($this->load->view('content/form_js', null, true), 'inline'); 

		Template::set('toolbar_title', lang('news_create') . ' News');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of News data.
	*/
	public function edit()
	{
		$this->auth->restrict('News.Content.Edit');

		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('news_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/news');
		}

		if ($this->input->post('submit'))
		{
			if ($this->save_news('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('news_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'news');

				Template::set_message(lang('news_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('news_edit_failure') . $this->news_model->error, 'error');
			}
		}
        
        $news = $this->news_model->find($id);
		if (isset($news))
		{
			$news->image_gallery = $this->news_gallery->find_all_by('news_id',$news->id);
            
            //print_r($news->image_gallery);exit();                        
			Template::set('news', $news);
		}
        
		Assets::add_module_js('news', 'news.js');
        
        Assets::add_css(array	(
														Template::theme_url('css/bootstrap-datepicker.css'),
														Template::theme_url('css/jquery.ui.datepicker.css'),
														Template::theme_url('css/jquery-iframedialog.css'),
														Template::theme_url('css/jquery/jquery.plugin.chosen.css'),
														Template::theme_url('css/jquery/jquery.tagsinput.css'),
													),
										'screen');
                                        									
		Assets::add_module_css('news', 'news.css');
        
        Assets::add_js(	array	(
														Template::theme_url('js/jquery-ui-1.8.13.min.js'),
														Template::theme_url('js/jquery-iframedialog.js'),
														Template::theme_url('js/bootstrap-datepicker.js'),
														Template::theme_url('js/admin.js'),
														Template::theme_url('js/jquery/jquery.plugin.chosen.js'),
														Template::theme_url('js/jquery/jquery.plugin.livequery.js'),
														Template::theme_url('js/jquery/jquery.tagsinput.min.js'),
														Template::theme_url('js/editors/ckeditor/ckeditor.js'),
														Template::theme_url('js/editors/ckeditor/adapters/jquery.js'),
														Template::theme_url('js/my_wysiwyg.js'),
													),
										'external',
										true
									);
        
        Assets::add_js($this->load->view('content/form_js', null, true), 'inline'); 

		Template::set('toolbar_title', lang('news_edit') . ' News');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: delete()

		Allows deleting of News data.
	*/
	public function delete()
	{
		$this->auth->restrict('News.Content.Delete');

		$id = $this->uri->segment(5);

		if (!empty($id))
		{

			if ($this->news_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('news_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'news');

				Template::set_message(lang('news_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('news_delete_failure') . $this->news_model->error, 'error');
			}
		}

		redirect(SITE_AREA .'/content/news');
	}

	//--------------------------------------------------------------------

	/*
		Method: delete_image()
		
		Allows deleting of News image data.
	*/
	public function delete_image($news_id=NULL) 
	{  
        $this->output->enable_profiler(false);
        
		if (!empty($news_id))
		{	
            if($this->news_model->update_where('news.id', $news_id, array('news.image_id' => NULL)))
            {
                $return['success'] = 1;
            }
            else
            {
                $return['success'] = 0;
            }
            echo json_encode($return);
		}
        
	}
	
	//--------------------------------------------------------------------

	/*
		Method: delete_gallery()
		
		Allows deleting of News gallery data.
	*/
	public function delete_gallery($id=NULL) 
	{  
        $this->output->enable_profiler(false);
        
		if (!empty($id))
		{	
            if($this->news_gallery->delete_gallery($id))
            {
                $return['success'] = 1;
            }
            else
            {
                $return['success'] = 0;
            }
            echo json_encode($return);
		}
        
	}
	
	//--------------------------------------------------------------------

	/**
	 * Callback method that checks the title of an post
	 * @access public
	 * @param string title The Title to check
	 * @return bool
	 */
	public function _check_title($title, $id = null)
	{
		$this->form_validation->set_message('_check_title', sprintf('Title already exist', 'Title'));
		return $this->news_model->check_exists('title', $title, $id);
	}
	
	/**
	 * Callback method that checks the slug of an post
	 * @access public
	 * @param string slug The Slug to check
	 * @return bool
	 */
	public function _check_slug($slug, $id = null)
	{
		$this->form_validation->set_message('_check_slug', sprintf('Slug already exist', 'Slug'));
		return $this->news_model->check_exists('slug', $slug, $id);
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_news()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_news($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('title','Title','required|trim|xss_clean|max_length[255]|callback__check_title['.$id.']');
		$this->form_validation->set_rules('slug', 'Slug', 'required|trim|xss_clean|max_length[255]|alpha_dot_dash|callback__check_slug['.$id.']');
		$this->form_validation->set_rules('description','Description','required|trim|xss_clean');
		$this->form_validation->set_rules('post_date','Post Date','required|trim|xss_clean');
		$this->form_validation->set_rules('image_id','Image','required|trim');
        
        $this->form_validation->set_error_delimiters('<p>', '</p>');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
        
		$images 	= $this->input->post('images');
		$caption 	= $this->input->post('caption');
		
		$data = array();
		$data['title']              = $this->input->post('title');
		$data['description']        = $this->input->post('description');
		$data['post_date']        	= date('Y-m-d', strtotime($this->input->post('post_date')));
		$data['image_id']           = $this->input->post('image_id');
		$data['slug']				= $this->input->post('slug');

		date_default_timezone_set('Asia/Jakarta');

		$data['month'] 	= indonesian_date($data['post_date'], 'm');
		$data['year'] 	= indonesian_date($data['post_date'], 'Y');

		if ($type == 'insert')
		{
			$id = $this->news_model->insert($data);

			if (is_numeric($id) && $images != '')
			{
                foreach($images as $file_id)
                {                    
                    $data_gallery = array();
            		$data_gallery['news_id']  = $id;
            		$data_gallery['file_id']  = $file_id;
                    
                    $this->news_gallery->insert($data_gallery);
                }
             
				$return = $id;
			}
            elseif(is_numeric($id) && $images == '')
            {
                $return = $id;
            } 
            else
			{
				$return = FALSE;
			}
		}
		else if ($type == 'update')
		{		
            $gallery_id 		= $this->input->post('gallery_id');
			$caption_update 	= $this->input->post('caption_update');

			if($images != '')
            {				                    		
                foreach($images as $file_id)
	            {    			
                    $data_gallery = array();
        			$data_gallery['news_id']  	= $id;
        			$data_gallery['file_id']  	= $file_id;
        			$data_gallery['caption']  	= $caption;
                    
                    $this->news_gallery->insert($data_gallery);
                }	

                foreach($gallery_id as $key=>$gallery_id_list)
	            {    			
                    $data_gallery = array();
            		$data_gallery['caption']  	= $caption_update[$key];
                    
                    $this->news_gallery->update_where('id', $gallery_id_list, $data_gallery);
               	}
           	}
        	else
        	{
        		foreach($gallery_id as $key=>$gallery_id_list)
	            {    			
                    $data_gallery = array();
            		$data_gallery['caption']  	= $caption_update[$key];
                    
                    $this->news_gallery->update_where('id', $gallery_id_list, $data_gallery);
               	}
			} 
          
			$return = $this->news_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}