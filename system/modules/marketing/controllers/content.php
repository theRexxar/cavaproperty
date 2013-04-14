<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Marketing.Content.View');
		$this->load->model('marketing_model', null, true);
		$this->lang->load('marketing');
		
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
		if (isset($_POST['delete']))
		{
			$checked = $this->input->post('checked');

			if (is_array($checked) && count($checked))
			{
				$result = FALSE;
				foreach ($checked as $pid)
				{
					$result = $this->marketing_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('marketing_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('marketing_delete_failure') . $this->marketing_model->error, 'error');
				}
			}
		}

		$offset = $this->uri->segment(5);

		$records = $this->marketing_model->limit($this->limit, $offset)->find_all();

                
        // Pagination
		$this->load->library('pagination');

		$total_article = $this->marketing_model->count_all();

		$this->pager['base_url'] 		= site_url(SITE_AREA .'/content/marketing/index');
		$this->pager['total_rows'] 		= $total_article;
		$this->pager['per_page'] 		= $this->limit;
		$this->pager['uri_segment']		= 5;

		$this->pagination->initialize($this->pager);

		$vars = array(
						'records' 	=> $records,
					);  
                    
        //print_r($vars);exit();     

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage Marketing Agent');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Marketing object.
	*/
	public function create()
	{
		$this->auth->restrict('Marketing.Content.Create');

		if ($this->input->post('save'))
		{
			if ($insert_id = $this->save_marketing())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('marketing_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'marketing');

				Template::set_message(lang('marketing_create_success'), 'success');
				Template::redirect(SITE_AREA .'/content/marketing');
			}
			else
			{
				Template::set_message(lang('marketing_create_failure') . $this->marketing_model->error, 'error');
			}
		}
		Assets::add_module_js('marketing', 'marketing.js');
        
        Assets::add_css(array	(
														Template::theme_url('css/jquery.ui.datepicker.css'),
														Template::theme_url('css/jquery-iframedialog.css'),
														Template::theme_url('css/jquery/jquery.plugin.chosen.css'),
														Template::theme_url('css/jquery/jquery.tagsinput.css'),
													),
										'screen');
                                        									
		Assets::add_module_css('marketing', 'marketing.css');
        
        Assets::add_js(	array	(
														Template::theme_url('js/jquery-ui-1.8.13.min.js'),
														Template::theme_url('js/jquery-iframedialog.js'),
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

		Template::set('toolbar_title', lang('marketing_create') . ' Marketing Agent');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Marketing data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('marketing_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/marketing');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Marketing.Content.Edit');

			if ($this->save_marketing('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('marketing_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'marketing');

				Template::set_message(lang('marketing_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('marketing_edit_failure') . $this->marketing_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Marketing.Content.Delete');

			if ($this->marketing_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('marketing_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'marketing');

				Template::set_message(lang('marketing_delete_success'), 'success');

				redirect(SITE_AREA .'/content/marketing');
			} else
			{
				Template::set_message(lang('marketing_delete_failure') . $this->marketing_model->error, 'error');
			}
		}
		Template::set('marketing', $this->marketing_model->find($id));

		Assets::add_module_js('marketing', 'marketing.js');
        
        Assets::add_css(array	(
														Template::theme_url('css/jquery.ui.datepicker.css'),
														Template::theme_url('css/jquery-iframedialog.css'),
														Template::theme_url('css/jquery/jquery.plugin.chosen.css'),
														Template::theme_url('css/jquery/jquery.tagsinput.css'),
													),
										'screen');
                                        									
		Assets::add_module_css('marketing', 'marketing.css');
        
        Assets::add_js(	array	(
														Template::theme_url('js/jquery-ui-1.8.13.min.js'),
														Template::theme_url('js/jquery-iframedialog.js'),
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

		Template::set('toolbar_title', lang('marketing_edit') . ' Marketing Agent');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: delete()

		Allows deleting of Marketing data.
	*/
	public function delete()
	{
		$this->auth->restrict('Marketing.Content.Delete');

		$id = $this->uri->segment(5);

		if (!empty($id))
		{

			if ($this->marketing_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('marketing_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'marketing');

				Template::set_message(lang('marketing_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('marketing_delete_failure') . $this->marketing_model->error, 'error');
			}
		}

		redirect(SITE_AREA .'/content/marketing');
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
		return $this->marketing_model->check_exists('title', $title, $id);
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
		return $this->marketing_model->check_exists('slug', $slug, $id);
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_marketing()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_marketing($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('name','Name','required|trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('phone','Phone','required|trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('email','Email','required|trim|xss_clean|max_length[255]');
        
        $this->form_validation->set_error_delimiters('<p>', '</p>');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['name']        	= $this->input->post('name');
		$data['phone']        	= $this->input->post('phone');
		$data['email']        	= $this->input->post('email');

		if ($type == 'insert')
		{
			$id = $this->marketing_model->insert($data);

			if (is_numeric($id))
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
			$return = $this->marketing_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}