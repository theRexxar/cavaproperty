<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Career.Content.View');
		$this->load->model('career_model', null, true);
		$this->lang->load('career');
		
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
					$result = $this->career_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('career_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('career_delete_failure') . $this->career_model->error, 'error');
				}
			}
		}

		$offset = $this->uri->segment(5);

		$records = $this->career_model->order_by('created_on','desc')->limit($this->limit, $offset)->find_all();

                
        // Pagination
		$this->load->library('pagination');

		$total_article = $this->career_model->count_all();

		$this->pager['base_url'] 		= site_url(SITE_AREA .'/content/career/index');
		$this->pager['total_rows'] 		= $total_article;
		$this->pager['per_page'] 		= $this->limit;
		$this->pager['uri_segment']		= 5;

		$this->pagination->initialize($this->pager);

		$vars = array(
						'records' 	=> $records,
					);  
                    
        //print_r($vars);exit();     

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage Career');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Career object.
	*/
	public function create()
	{
		$this->auth->restrict('Career.Content.Create');

		if ($this->input->post('save'))
		{
			if ($insert_id = $this->save_career())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('career_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'career');

				Template::set_message(lang('career_create_success'), 'success');
				Template::redirect(SITE_AREA .'/content/career');
			}
			else
			{
				Template::set_message(lang('career_create_failure') . $this->career_model->error, 'error');
			}
		}
		Assets::add_module_js('career', 'career.js');
        
        Assets::add_css(array	(
														Template::theme_url('css/jquery.ui.datepicker.css'),
														Template::theme_url('css/jquery-iframedialog.css'),
														Template::theme_url('css/jquery/jquery.plugin.chosen.css'),
														Template::theme_url('css/jquery/jquery.tagsinput.css'),
													),
										'screen');
                                        									
		Assets::add_module_css('career', 'career.css');
        
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

		Template::set('toolbar_title', lang('career_create') . ' Career');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Career data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('career_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/career');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Career.Content.Edit');

			if ($this->save_career('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('career_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'career');

				Template::set_message(lang('career_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('career_edit_failure') . $this->career_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Career.Content.Delete');

			if ($this->career_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('career_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'career');

				Template::set_message(lang('career_delete_success'), 'success');

				redirect(SITE_AREA .'/content/career');
			} else
			{
				Template::set_message(lang('career_delete_failure') . $this->career_model->error, 'error');
			}
		}
		Template::set('career', $this->career_model->find($id));

		Assets::add_module_js('career', 'career.js');
        
        Assets::add_css(array	(
														Template::theme_url('css/jquery.ui.datepicker.css'),
														Template::theme_url('css/jquery-iframedialog.css'),
														Template::theme_url('css/jquery/jquery.plugin.chosen.css'),
														Template::theme_url('css/jquery/jquery.tagsinput.css'),
													),
										'screen');
                                        									
		Assets::add_module_css('career', 'career.css');
        
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

		Template::set('toolbar_title', lang('career_edit') . ' Career');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: delete()

		Allows deleting of Career data.
	*/
	public function delete()
	{
		$this->auth->restrict('Career.Content.Delete');

		$id = $this->uri->segment(5);

		if (!empty($id))
		{

			if ($this->career_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('career_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'career');

				Template::set_message(lang('career_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('career_delete_failure') . $this->career_model->error, 'error');
			}
		}

		redirect(SITE_AREA .'/content/career');
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
		return $this->career_model->check_exists('title', $title, $id);
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
		return $this->career_model->check_exists('slug', $slug, $id);
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_career()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_career($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('title','Title','required|trim|xss_clean|max_length[255]|callback__check_title['.$id.']');
		$this->form_validation->set_rules('slug', 'Slug', 'required|trim|xss_clean|max_length[255]|alpha_dot_dash|callback__check_slug['.$id.']');
		$this->form_validation->set_rules('summary','Summary','required|trim|xss_clean');
		$this->form_validation->set_rules('description','Description','required|trim|xss_clean');
		$this->form_validation->set_rules('qualification','Qualification','required|trim|xss_clean');
        
        $this->form_validation->set_error_delimiters('<p>', '</p>');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['title']        		= $this->input->post('title');
		$data['summary']        	= $this->input->post('summary');
		$data['description']        = $this->input->post('description');
		$data['qualification']      = $this->input->post('qualification');
		$data['slug']             	= $this->input->post('slug');

		if ($type == 'insert')
		{
			$id = $this->career_model->insert($data);

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
			$return = $this->career_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}